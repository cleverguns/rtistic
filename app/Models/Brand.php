<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_name',
        'brand_description',
        'brand_young_sizes',
        'brand_adult_sizes',
        'brand_sizes',
        'brand_logo',
        'brand_img_one',
        'brand_img_two',
        'brand_img_three',
        'brand_img_four',
    ];
}

