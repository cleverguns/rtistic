<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class BrandController extends Controller
{

    public function api() {
        $brands = Brand::all();
        return DataTables::of($brands)
            ->addColumn('logo', function($brand) {
                return '<img src="'.asset('storage/'.$brand->brand_name . '/'.$brand->brand_logo).'" alt="'.$brand->brand_name.'" width="100px">';
            })
            ->addColumn('brand_name', function($brand) {
                return $brand->brand_name;
            })
            ->addColumn('brand_description', function($brand) {
                return $brand->brand_description;
            })
            ->addColumn('young_sizes', function($brand) {
                $young_sizes = json_decode($brand->brand_young_sizes);
                $sizes = collect($young_sizes)->pluck('value')->toArray();

                $badges = []; // Initialize an array to store badges

                foreach ($sizes as $size) {
                    $badges[] = '<span class="badge bg-primary">' . $size . '</span>';
                }

                // Convert the badges array to a string
                $badgeString = implode(' ', $badges);

                return $badgeString;
            })
            ->addColumn('adult_sizes', function($brand) {
                $adult_sizes = json_decode($brand->brand_adult_sizes);
                $sizes = collect($adult_sizes)->pluck('value')->toArray();

                $badges = []; // Initialize an array to store badges

                foreach ($sizes as $size) {
                    $badges[] = '<span class="badge bg-dark">' . $size . '</span>';
                }

                // Convert the badges array to a string
                $badgeString = implode(' ', $badges);

                return $badgeString;
            })
            ->addColumn('action', function($brand) {
                return '
                    <a href="/admin/manage/brands/'.$brand->id.'/edit" class="btn btn-sm btn-primary">Edit</a>
                    <button data-brand_id="'.$brand->brand_id.'" class="btn btn-sm btn-danger delete-brand">Delete</button>
                ';
            })
            ->rawColumns(['logo', 'brand_name', 'brand_description', 'young_sizes', 'adult_sizes', 'action'])
            ->make(true);
    }

    public function create() {
        return view('admin.products.suppliers.create');
    }

    public function store(Request $request) {

        // Validate the request data
        $request->validate([
            'brand_name' => 'required',
            'brand_description' => 'required',
            'young_sizes' => 'required',
            'adult_brand_sizes' => 'required',
            'brand_logo' => 'required',
            'image_one' => 'required|image|mimes:jpeg,png,jpg',
            'image_two' => 'required|image|mimes:jpeg,png,jpg',
            'image_three' => 'required|image|mimes:jpeg,png,jpg',
            'image_four' => 'required|image|mimes:jpeg,png,jpg',
            // Add validation rules for other fields here
        ]);

        $brand = new Brand;
        $brand->brand_name = $request->brand_name;
        $brand->brand_description = $request->brand_description;
        $brand->brand_young_sizes = $request->young_sizes;
        $brand->brand_adult_sizes = $request->adult_brand_sizes;
        $brand->brand_logo = $request->brand_logo->getClientOriginalName();
        $brand->brand_img_one = $request->image_one->getClientOriginalName();
        $brand->brand_img_two = $request->image_two->getClientOriginalName();
        $brand->brand_img_three = $request->image_three->getClientOriginalName();
        $brand->brand_img_four = $request->image_four->getClientOriginalName();

        $brand_folder = $brand->brand_name;

        if($request->hasFile('brand_logo')) {
            $filename = $request->brand_logo->getClientOriginalName();
            $request->brand_logo->storeAs($brand_folder, $filename, 'public');
        }

        if ($request->hasFile('image_one')) {
            $filename = $request->image_one->getClientOriginalName();
            $request->image_one->storeAs($brand_folder, $filename, 'public');
        }

        if ($request->hasFile('image_two')) {
            $filename = $request->image_two->getClientOriginalName();
            $request->image_two->storeAs($brand_folder, $filename, 'public');
        }

        if ($request->hasFile('image_three')) {
            $filename = $request->image_three->getClientOriginalName();
            $request->image_three->storeAs($brand_folder, $filename, 'public');
        }

        if ($request->hasFile('image_four')) {
            $filename = $request->image_four->getClientOriginalName();
            $request->image_four->storeAs($brand_folder, $filename, 'public');
        }

        // Handle duplicate brand name
        $brand_name = Brand::where('brand_name', $request->brand_name)->first();
        if ($brand_name) {
            return redirect()->route('brands.create')->with('error', 'Brand name already exists');
        } else {
            if ($brand->save()) {
                return redirect()->route('brands.create')->with('success', 'Brand created successfully');
            } else {
                return redirect()->route('brands.create')->with('error', 'Brand not created');
            }
        }
    }

    public function edit($id) {
        $brand = Brand::find($id);
        return view('admin.products.suppliers.edit', compact('brand'));
    }

    public function update(Request $request)
    {
        $brand = Brand::find($request->brand_id);
        $brand->brand_name = $request->brand_name;
        $brand->brand_description = $request->brand_description;
        $brand->brand_young_sizes = $request->young_sizes;
        $brand->brand_adult_sizes = $request->adult_brand_sizes;
        $brand->brand_logo = $request->brand_logo->getClientOriginalName();
        $brand->brand_img_one = $request->image_one->getClientOriginalName();
        $brand->brand_img_two = $request->image_two->getClientOriginalName();
        $brand->brand_img_three = $request->image_three->getClientOriginalName();
        $brand->brand_img_four = $request->image_four->getClientOriginalName();

        $brand_folder = $brand->brand_name;

        if ($request->hasFile('brand_logo')) {
            $filename = $request->brand_logo->getClientOriginalName();
            $request->brand_logo->storeAs($brand_folder, $filename, 'public');
        }

        if ($request->hasFile('image_one')) {
            $filename = $request->image_one->getClientOriginalName();
            $request->image_one->storeAs($brand_folder, $filename, 'public');
        }

        if ($request->hasFile('image_two')) {
            $filename = $request->image_two->getClientOriginalName();
            $request->image_two->storeAs($brand_folder, $filename, 'public');
        }

        if ($request->hasFile('image_three')) {
            $filename = $request->image_three->getClientOriginalName();
            $request->image_three->storeAs($brand_folder, $filename, 'public');
        }

        if ($request->hasFile('image_four')) {
            $filename = $request->image_four->getClientOriginalName();
            $request->image_four->storeAs($brand_folder, $filename, 'public');
        }

        // Handle duplicate brand name
        $brand_name = Brand::where('brand_name', $request->brand_name)->first();
        if ($brand_name) {
            return redirect()->route('brands.create')->with('error', 'Brand name already exists');
        } else {
            if ($brand->save()) {
                return redirect()->route('brands.create')->with('success', 'Brand created successfully');
            } else {
                return redirect()->route('brands.create')->with('error', 'Brand not created');
            }
        }
    }

    public function delete(Request $request) {
        $brand = Brand::find($request->brand_id);
        $brand_folder = $brand->brand_name;
        Storage::deleteDirectory($brand_folder);
        if ($brand->delete()) {
            return response()->json([
                'success' => true,
                'message' => 'Brand deleted successfully',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Brand not deleted',
            ], 400);
        }
    }
}
