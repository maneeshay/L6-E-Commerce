<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cd extends Model
{
    use HasFactory;
    protected $fillable = [
        'cd_name',
        'cd_image',
        'cd_price',
       
    ];
}
