<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GalleryModel;
use DataTables;

class GalleryController extends Controller
{

    public function api() {

        $gallery = GalleryModel::all();

        return DataTables::of($gallery)
            ->addColumn('action', function($gallery){
                return '<button class="btn btn-danger btn-sm delete" data-id="'.$gallery->id.'">Delete</button>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function store(Request $request) {
        $request->validate([
            'image_name' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imageName = time().'.'.$request->image_name->getClientOriginalExtension();
        $request->image_name->move(public_path('images'), $imageName);

        $gallery = new GalleryModel;
        $gallery->image_name = $imageName;
        $gallery->save();

        return response()->json([
            'success' => true,
            'message' => 'Image Uploaded Successfully'
        ]);
    }

    public function destroy(Request $request) {
        $gallery = GalleryModel::find($request->id);
        $gallery->delete();

        return response()->json([
            'success' => true,
            'message' => 'Image Deleted Successfully'
        ]);
    }
}
