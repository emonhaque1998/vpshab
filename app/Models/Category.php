<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    // this is the recommended way for declaring event handlers
    public static function boot() {
        parent::boot();
        static::deleting(function($category) { // before delete() method call this
             $category->product()->each(function($productItem) {
                $productItem->delete(); // <-- raise another deleting event on Post to delete comments
             });
             Cache::clear();
             // do the rest of the cleanup...
        });
    }
    
    protected $fillable = [
        "category_name",
        "category_slug",
    ];


    public function product(){
        return $this->hasMany(Product::class);
    }
}
