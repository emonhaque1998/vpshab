<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Country;
use App\Models\Invoice;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Cache;

class Product extends Model
{
    use HasFactory;

    // this is the recommended way for declaring event handlers
    public static function boot() {
        parent::boot();
        static::deleting(function($product) { // before delete() method call this
             $product->order()->each(function($orderItem) {
                $orderItem->delete(); // <-- raise another deleting event on Post to delete comments
             });

             $product->invoice()->each(function($invoieItem){
                $invoieItem->delete();
             });

             Cache::clear();
             // do the rest of the cleanup...
        });
    }

    protected $fillable = [
        "title",
        "slug",
        "monthly_price",
        "annual_price",
        "discount",
        "ram",
        "disk",
        "operating_system",
        "bandwidth",
        "virtualization",
        "currency",
        "category_id",
        "country_id",
        "status",
        "freshIp",
        "freshIP_amount",
        "stock"
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function order(){
        return $this->hasMany(Order::class);
    }

    public function invoice() {
        return $this->hasMany(Invoice::class);
    }
}
