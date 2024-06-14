<?php

namespace App\Models;

use App\Models\User;
use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;


    protected $fillable = [
        "name",
        "email",
        "phone",
        "amount",
        "address",
        "status",
        "transaction_id",
        "currency",
        "product_id",
        "user_id",
        "dueDate",
        "expiration_date",
        "ipAddress",
        "invoice_id",
        "orderID",
        "api_hash",
        "api_key",
        "api_status",
        "next_discount",
        "discount_amount"
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function invoice(){
        return $this->belongsTo(Invoice::class);
    }
}
