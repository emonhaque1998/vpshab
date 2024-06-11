<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class websiteinformation extends Model
{
    use HasFactory;

    protected $fillable = [
        "top_title",
        "phone_number",
        "facebook",
        "youtube",
        "twiter",
        "instagram",
        "wb_site_short_about",
    ];
}
