<?php

namespace App\Models;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Support extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "email",
        "slug"
    ];

    public function contact(){
        return $this->hasMany(Contact::class);
    }
}
