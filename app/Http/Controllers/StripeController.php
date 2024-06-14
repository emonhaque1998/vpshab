<?php

namespace App\Http\Controllers;

use App\Events\Payment\FundPayment;
use App\Events\Payment\InvoicePayment;
use App\Events\Payment\ProductPayment;
use App\Jobs\SendInvoicePdfEmailJob;
use App\Models\Fund;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PSpell\Config;

class StripeController extends Controller
{
    public function sassion(Request $request){
        \Stripe\Stripe::setApiKey(Config("stripe.sk"));

        $information = array();
        $information['productName'] = $request->get("productName");
        $information["orderId"] = $request->get("orderId");
        $oderInformation = Order::find($request->get("orderId"));
        if($oderInformation){
            if($oderInformation->renew){
                if($oderInformation->next_discount){
                    $information['totalPrice'] = intval(Product::find($request->productId)->monthly_price) - intval($oderInformation->discount_amount);
                }else{
                    $information['totalPrice'] = intval(Product::find($request->productId)->monthly_price);    
                }
            }else{
                $information['totalPrice'] = $request->get("freshIp") ? intval(Product::find($request->productId)->monthly_price) + intval($request->get("freshIp")) : intval(Product::find($request->productId)->monthly_price);
            }
        }else{
            $information['totalPrice'] = $request->get("freshIp") ? intval(Product::find($request->productId)->monthly_price) + intval($request->get("freshIp")) : intval(Product::find($request->productId)->monthly_price);
        }
        $information['customer_name'] = Auth::user()->name;
        $information['companyName'] = Auth::user()->companyName;
        $information['invoice'] = "IN-" . uniqid();
        $information['freshIp'] = intval($request->get("freshIp"));
        $information['email'] = Auth::user()->email;
        $information['phone'] = Auth::user()->mobile;
        $information['address'] = Auth::user()->addressFirst . "," . Auth::user()->addressSecond . "," . Auth::user()->stateList . "," . Auth::user()->country;
        $information["transaction_id"] = uniqid();
        $information['currency'] = "$";
        $information['product_id'] = $request->get("productId");
        $information['product'] = Product::find($request->get("productId"));
        $information["user_id"] = Auth::user()->id;
        $information["quantity"] = $request->numberOfQuantity;
        $information['totalAmount'] = $information['totalPrice'] * $information['quantity'];
        $information['invoiceId'] = $request->get("invoiceId");
        $information['notes'] = $request->get("notes");

        $totalPrice = $information['totalPrice'];
        $two0 = "00";

        $information['payAmount'] = "$totalPrice$two0";

        $session = \Stripe\Checkout\Session::create([
            "line_items" => [
                [
                    'price_data' => [
                        "currency" => "USD",
                        'product_data' => [
                            "name" => $information['productName'],
                        ],
                        "unit_amount" => $information['payAmount'],
                    ],
                    'quantity' => $information['quantity']
                ]
            ],
            'mode' => "payment",
            "success_url" => route("success"),
            "cancel_url" => route("cancle")
        ]);

        if(!$request->get("otherSide")){
            if($session){
                ProductPayment::dispatch($information);
            }
        }else{
            session()->flash('paymentData', $information);
        }


        return redirect()->away($session->url);

    }

    public function success(Request $request){
        $data = session("paymentData");
        $invoice = Invoice::find($data['invoiceId']);
        if($invoice->status === "Unpaid"){
            Invoice::find($data['invoiceId'])->update([
                "status" => "Paid"
            ]);
        }

        foreach ($invoice->order as $orderId) {
            $order = Order::find($orderId->id);
            if($order->status === "Pending"){
                Order::find($orderId->id)->update([
                    "status" => "Processing",
                    "transaction_id" => $data['transaction_id'],    
                ]);
            }else if($order->status === "Successfull"){
                Order::find($orderId->id)->update([
                    "status" => "Processing",
                    "transaction_id" => $data['transaction_id'],
                    "renew" => false,
                    "dueDate" => now()->addDays(30),
                    "created_at" => now()
                ]);
            }
        }

        $product = Product::find($data["product_id"]);
        Product::find($data["product_id"])->update([
            "stock" => $product->stock - $data["quantity"]
        ]);

        $invoice = Invoice::find($data['invoiceId']);

        SendInvoicePdfEmailJob::dispatch($data);

        return view("invoice", ["invoice" => $invoice]);
    }


    public function cancle(){
        return redirect("/");
    }

    public function addFunds(Request $request){
        \Stripe\Stripe::setApiKey(Config("stripe.sk"));

        $information = array();

        $information['totalPrice'] = intval($request->get("amount"));
        $information['customer_name'] = Auth::user()->name;
        $information['companyName'] = Auth::user()->companyName;
        $information['invoice'] = "IN-" . uniqid();
        $information['email'] = Auth::user()->email;
        $information['address'] = Auth::user()->addressFirst . "," . Auth::user()->addressSecond . "," . Auth::user()->stateList . "," . Auth::user()->country;
        $information["transaction_id"] = uniqid();
        $information['currency'] = "$";
        $information["user_id"] = Auth::user()->id;
        $information["quantity"] = 1;


        $totalPrice = $information['totalPrice'];
        $two0 = "00";

        $information['payAmount'] = "$totalPrice$two0";

        $session = \Stripe\Checkout\Session::create([
            "line_items" => [
                [
                    'price_data' => [
                        "currency" => "USD",
                        'product_data' => [
                            "name" => $information['customer_name'],
                        ],
                        "unit_amount" => $information['payAmount'],
                    ],
                    'quantity' => $information['quantity']
                ]
            ],
            'mode' => "payment",
            "success_url" => route("fund.success"),
            "cancel_url" => route("cancle")
        ]);

        if($session){
            FundPayment::dispatch($information);
        }

        return redirect()->away($session->url);
    }

    public function fundSuccess(){
        $data = session("fundData");
        $fund = Fund::find($data['fundId']);
            if(!$fund->status){
                Fund::find($data['fundId'])->update([
                    "status" => true,
                ]);
            }
    }
}
