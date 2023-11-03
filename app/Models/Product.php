<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'product_name',
        'product_sku',
        'product_description',
        'product_price',
        'product_brand',
        'product_color',
        'product_category',
        'product_stocks',
        'product_tags',
    ];


    public function brand(){
        return $this->belongsTo(Brand::class, 'product_brand', 'brand_id');
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function color(){
        return $this->belongsTo(Color::class);
    }

    public function product_images(){
        return $this->hasMany(ProductsImageModel::class);
    }

    public function product_thumbnail(){
        return $this->hasOne(ProductsThumbnailModel::class, 'product_id', 'id');
    }

}
