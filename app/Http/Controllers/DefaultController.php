<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\GalleryModel;

class DefaultController extends Controller
{
    public function index() {
        return view('index');
    }

    public function gallery() {
        $gallery = GalleryModel::paginate(8);
        return view('gallery', compact('gallery'));
    }

    public function products() {

        $products = Product::with('product_images', 'brand', 'product_thumbnail')->paginate(3);
        return view('products', compact('products'));
    }

    public function productsView($product_id) {

        $product = Product::with('product_images', 'brand', 'product_thumbnail')->where('id', $product_id)->first();

        return view('products-view', compact('product'));
    }

    public function workshop() {
        return view('workshop');
    }

    public function templates() {
        return view('templates');
    }

    public function ourStory() {
        return view('our-story');
    }

    public function customerReviews() {
        return view('customer-reviews');
    }

    public function storeLocation() {
        return view('store-location');
    }
    public function brandSupplier(){
        return view('brand-supplier');
    }
    public function templateView($tab){
        return view('template-view',compact('tab'));
    }

}

