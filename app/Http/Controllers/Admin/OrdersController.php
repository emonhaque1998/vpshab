<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $name = $request->get("name");
        $invoice = $request->get("invoice");
        $orderId = $request->get("orderId");
        $status = $request->get("status");

        $productsQuery = Order::query();

        if ($request->has('orderId') && $request->get("orderId")) {
            $productsQuery->where('orderID', $request->orderId);
        }

        if($request->has("name") && $request->get("name")){
            $productsQuery->where('name', 'like', "%" . $request->name . "%");
        }

        if($request->has("ipAddress") && $request->get("ipAddress")){
            $productsQuery->where("ipAddress", $request->ipAddress);
        }

        if($request->has("status") && $request->get("status") && $request->get("status") != "All"){
            $productsQuery->where("status", $request->status);
        }

        if($request->has("created_at") && $request->get("created_at")){
            $productsQuery->whereDate("created_at", $request->created_at);
        }

        $orders = $productsQuery->latest()->paginate(10);

        return view("admin.orders.all-orders", ["orders" => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->disAount){
            $order = Order::find($request->orderId)->update([
                "next_discount" => true,
                "discount_amount" => $request->disAount
            ]);
        }else{
            $order = Order::find($request->orderId)->update([
                "next_discount" => false,
                "discount_amount" => $request->disAount
            ]);
        }
        

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::find($id);
        return view("admin.orders.order-details", ["order" => $order]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {
        $result = Invoice::find($id);
        $order = Order::find($request->orderId);
        $due = Carbon::parse($result->dueDate);
        $orDue = Carbon::parse($order->dueDate);
        $due = $due->addDays($request->get("dueDate"));
        $orDue = $orDue->addDays($request->get("dueDate"));
        $result->dueDate = $due;
        $order->dueDate = $orDue;
        $order->save();
        $result->save();
        return back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $result = Order::find($id)->update([
            "status" => $request->get("orderStatusUpdate")
        ]);
        if($result){
            Invoice::find($request->invoiceId)->update([
                "dueDate" => now()->addDays(30)
            ]);
            return redirect()->route("all-orders.index");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
