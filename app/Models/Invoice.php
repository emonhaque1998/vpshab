<?php

namespace App\Models;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
    use HasFactory;


    protected $fillable = [
        "orderId",
        "status",
        "user_id",
        "quantity",
        "freshIp",
        "expiration_date",
        "dueDate",
        "product_id",
        "totalAmount",
        "note",
        "createInvoiceReniew"
    ];

    public function order(){
        return $this->hasMany(Order::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
