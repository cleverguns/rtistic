<?php

namespace App\Http\Controllers;

use App\Models\ImageCustomTshirt;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    public function imageUploadTshirt(Request $request)
    {
        $imageName = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $imageName);

        $imageCustomTshirt = new ImageCustomTshirt();
        $imageCustomTshirt->image = $imageName;
        // $imageCustomTshirt->user_upload = Auth::user()->id;
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
}
