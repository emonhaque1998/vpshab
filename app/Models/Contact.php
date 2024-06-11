<?php

namespace App\Models;

use App\Models\User;
use App\Models\Support;
use App\Models\Conversation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "email",
        "subject",
        "message",
        "user_id",
        "status",
        "slug",
        "support_id"
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function conversation(){
        return $this->hasMany(Conversation::class);
    }

    public function support(){
        return $this->belongsTo(Support::class);
    }
}
