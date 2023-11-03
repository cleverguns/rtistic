<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageCustomTshirt extends Model
{
    use HasFactory;
    protected $table = 'image_custom_tshirt';

    protected $fillable = [
        'image',
        'user_upload',
    ];
}
