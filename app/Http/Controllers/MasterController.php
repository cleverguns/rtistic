<?php

namespace App\Http\Controllers;

use App\Models\ImageCustomTshirt;
use App\Models\Product; // Add the relevant product model
use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function imageUploadTshirt(Request $request)
    {
        $imageName = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $imageName);

        $imageCustomTshirt = new ImageCustomTshirt();
        $imageCustomTshirt->image = $imageName;

        if ($imageCustomTshirt->save()) {
            return json_encode([
                'status' => 201,
                'message' => "Success Image Upload"
            ]);
        } else {
            return json_encode([
                'status' => 401,
                'message' => "Something went wrong!"
            ]);
        }
    }

    public function addProduct(Request $request)
    {
        // Your product creation logic here
        $product = new Product();
        // Set product attributes based on the form data
        $product->product_name = $request->product_name;
        $product->product_description = $request->product_description;
        // Add other product attributes

        if ($product->save()) {
            return redirect('/admin/products')->with('success', 'Product added successfully');
        } else {
            return redirect('/admin/products/create')->with('error', 'Failed to add product');
        }
    }
}
