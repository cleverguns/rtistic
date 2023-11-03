<?php

namespace App\Http\Controllers;

use App\Models\CustomTshirtImage; // Import the CustomTshirtImage model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MasterController extends Controller
{
    public function imageUploadTshirt(Request $request)
    {
        // Validation and file handling...

        $imageName = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $imageName);

        $imageCustomTshirt = new CustomTshirtImage(); // Utilize the CustomTshirtImage model
        $imageCustomTshirt->image = $imageName;

        if (Auth::check()) {
            $imageCustomTshirt->user_id = Auth::user()->id;
        }

        if ($imageCustomTshirt->save()) {
            return response()->json([
                'status' => 201,
                'message' => "Success Image Upload"
            ], 201);
        } else {
            return response()->json([
                'status' => 401,
                'message' => "Something went wrong!"
            ], 401);
        }
    }
}
