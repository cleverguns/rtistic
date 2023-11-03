<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Color;
use App\Models\ImageCustomTshirt;
use Illuminate\Http\Request;

class CustomProductController extends Controller
{
    public function list()
    {

        return view('admin.custom_template.list');
    }

    public function create()
    {

        $brands = Brand::all();
        $colors = Color::all();
        $image_custom = ImageCustomTshirt::all();
        $product_sku_generated = 'SKU-' . rand(100000, 999999);

        return view('admin.custom_template.create', compact('brands', 'product_sku_generated', 'colors', 'image_custom'));
    }

    public function store()
    {
    }

    public function edit()
    {

        return view('admin.custom_template.edit');
    }

    public function update()
    {
    }

    public function delete()
    {
    }
}
