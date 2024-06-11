<?php

namespace App\Models;

use App\Models\Admin;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable = [
        "message",
        "contact_id",
        "owner",
        "admin_id"
    ];

    public function contact(){
        return $this->belongsTo(Contact::class);
    }

    public function admin(){
        return $this->belongsTo(Admin::class);
    }
}
