<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cupone extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "cuppone_code",
        "discount",
        "expiry"
    ];
}
