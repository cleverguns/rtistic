<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemporaryImageModel extends Model
{
    use HasFactory;

    protected $table = 'temporary_image_models';


protected $fillable = [
        'folder',
        'filename',
    ];


}
