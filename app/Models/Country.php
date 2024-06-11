<?php

namespace App\Models;

use App\Models\Product;
use App\Models\IspLocation;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Model
{
    use HasFactory;

    // this is the recommended way for declaring event handlers
    public static function boot() {
        parent::boot();
        static::deleting(function($country) { // before delete() method call this
             $country->ispLocation()->each(function($ispLocationItem) {
                $ispLocationItem->delete(); // <-- raise another deleting event on Post to delete comments
             });

             $country->getProduct()->each(function($productItem){
                $productItem->delete();
             });

             Cache::clear();
             // do the rest of the cleanup...
        });
    }

    protected $fillable = [
        "name",
        "vertical",
        "horizontal"
    ];

    public function getProduct(){
        return $this->hasMany(Product::class);
    }

    public function ispLocation(){
        return $this->hasMany(IspLocation::class);
    }
}
