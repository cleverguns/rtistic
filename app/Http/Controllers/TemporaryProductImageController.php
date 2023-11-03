<?php

namespace App\Http\Controllers;

use App\Models\TemporaryImageModel;
use Illuminate\Http\Request;

class TemporaryProductImageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if($request->hasFile('product_images')){
            $image = $request->file('product_images');
            $fileName = $image->getClientOriginalName();
            $folder = uniqid('image-', true);
            $image->storeAs('images/tmp/' . $folder, $fileName);

            TemporaryImageModel::create([
                'folder' => $folder,
                'filename' => $fileName,
            ]);

            return $folder;
        }
        return '';
    }
}
