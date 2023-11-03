<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsThumbnailModel extends Model
{
    use HasFactory;

    protected $table = 'products_thumbnail';
    protected $fillable = [
        'product_id',
        'thumbnail_path',
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
