<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductsImageModel;
use App\Models\ProductsThumbnailModel;
use App\Models\TemporaryImageModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;


class ProductController extends Controller
{

    public function productApi(Request $request) {
        $products = Product::with('product_images', 'brand', 'product_thumbnail')->get();

        return DataTables::of($products)
            ->addColumn('product_name', function ($product){
                    return $product->product_name;
            })
            ->addColumn('product_sku', function ($product){
                return $product->product_sku;
            })
            ->addColumn('product_thumbnail', function ($product){
                if($product->product_thumbnail == null)
                    return 'No thumbnail';
                else
                    return '<img src="' . asset('storage/'.$product->product_thumbnail->thumbnail_path) . '" alt="Product thumbnail" width="100px">';
            })
            ->addColumn('product_price', function ($product){
                return '₱'.number_format($product->product_price, 2);
            })
            ->addColumn('product_brand', function ($product){
                if($product->brand == null)
                    return 'No brand';
                else
                    return $product->brand->brand_name;
            })
            ->addColumn('action', function ($product){
                    return '<i class="fas fa-edit"></i>';
            })
            ->rawColumns(['action', 'product_thumbnail'])
            ->make(true);
    }


    public function store(Request $request)
    {

        $product_color = $request->product_color;
        $color = json_encode($product_color);

        $product_tags = $request->product_tags;
        $tags = $product_tags[0];


        $request->merge([
            'product_color' => $color,
            'product_tags' => $tags,
        ]);

// Validate the request data
        $validator = Validator::make($request->all(), [
            'product_name' => 'required',
            'product_sku' => 'required',
            'product_description' => 'required',
            'product_price' => 'required',
            'product_brand' => 'required',
            'product_color' => 'required',
            'product_category' => 'required',
            'product_stocks' => 'required',
            'product_tags' => 'required',
        ]);

// Dump and die to inspect the request data (for debugging)
//        dd($request->all());


        $temp_images = TemporaryImageModel::all();
        if($validator->fails()){

            foreach ($temp_images as $temp_image){
                Storage::deleteDirectory('images/tmp/' . $temp_image->folder);
                $temp_image->delete();
            }

            return redirect('/admin/products/create')->withErrors($validator)->withInput();
        }

        // Create a new product with mass assignment
        $product = Product::create($validator->validated());

        // Store the product thumbnail
        $thumbnail = $request->file('product_thumbnail');
        $thumbnail_name = $thumbnail->getClientOriginalName();

        $thumbnail->storeAs('images/products', $thumbnail_name, 'public');

        ProductsThumbnailModel::create([
            'product_id' => $product->id,
            'thumbnail_path' => 'images/products/' . $thumbnail_name,
        ]);

        foreach ($temp_images as $temp_image){
            Storage::copy('images/tmp/' . $temp_image->folder . '/' . $temp_image->filename, 'images/products/' . $temp_image->filename);
            ProductsImageModel::create([
                'product_id' => $product->id,
                'image_filename' => $temp_image->filename,
                'path' => 'images/products/' . $temp_image->filename,
            ]);

            Storage::deleteDirectory('images/tmp/' . $temp_image->folder);
            $temp_image->delete();
        }

        return redirect('/admin/manage/products')->with('success', 'Product added successfully');


    }

    public function create()
    {

        $brands = Brand::all();
        $colors = Color::all();
        $product_sku_generated = 'SKU-' . rand(100000, 999999);

        return view('admin.products.create', compact('brands', 'product_sku_generated', 'colors'));
    }

    public function colors()
    {

        return view('admin.products.colors.index');
    }

    public function storeColor(Request $request)
    {

        $color = new Color;
        $color->color_name = $request->color_name;
        $color->color_code = $request->color_code;
        $color->save();

        return redirect()->back()->with('success', 'Color added successfully');
    }

    public function colorApi()
    {

        $colors = Color::all();

        return DataTables::of($colors)
            ->addColumn('color_name', function ($colors) {
                return $colors->color_name;
            })
            ->addColumn('color_code', function ($colors) {
                return $colors->color_code;
            })
            ->addColumn('action', function ($colors) {
                $button = '<a href="javascript:void(0);" id="delete-color" data-toggle="tooltip" data-original-title="Delete" data-id="' . $colors->id . '" class="delete btn btn-danger btn-sm">Delete</a>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
//additional

public function addProductFromCustomTemplate(Request $request)
{
    // Logic to handle the product addition
    // Use $request->input('fieldname') to access form fields

    // Example: create a new product
    $product = Product::create($request->all());

    // Return a response, redirect, or handle as needed
}

public function uploadImageForTshirt(Request $request)
{
    // Logic to handle image uploads for T-shirts
    // Use $request->file('image') to access the uploaded image file

    // Example: save the uploaded image
    $image = $request->file('image');
    // Your image saving logic here...

    // Return a response, redirect, or handle as needed
}



}
