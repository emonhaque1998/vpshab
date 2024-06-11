<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Fund;
use App\Models\Order;
use App\Models\Contact;
use App\Models\Invoice;
use App\Models\Conversation;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Cache;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    // this is the recommended way for declaring event handlers
    public static function boot() {
        parent::boot();
        static::deleting(function($user) { // before delete() method call this
             $user->order()->each(function($orderItem) {
                $orderItem->delete(); // <-- raise another deleting event on Post to delete comments
             });

             $user->invoice()->each(function($invoieItem){
                $invoieItem->delete();
             });

             $user->fund()->each(function($fundItem){
                $fundItem->delete();
             });

             Cache::clear();
             // do the rest of the cleanup...
        });
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'name',
        'email',
        'password',
        "addressFirst",
        "addressSecond",
        "companyName",
        "mobile",
        "country",
        "stateList",
        "checkoutValidation"
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function order(){
        return $this->hasMany(Order::class);
    }

    public function contact(){
        return $this->hasMany(Contact::class);
    }

    public function fund(){
        return $this->hasMany(Fund::class);
    }

    public function invoice() {
        return $this->hasMany(Invoice::class);
    }

}
