<?php

namespace App\Http\Controllers;

use App\Models\TemporaryImageModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DeleteTemporaryProductImageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $tempImage = TemporaryImageModel::where('folder', $request->getContent())->firstOrFail();
        if($tempImage){
            Storage::deleteDirectory('images/tmp/' . $tempImage->folder);
            $tempImage->delete();
        }

        return response()->noContent();
    }
}
