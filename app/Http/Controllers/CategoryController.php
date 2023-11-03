<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;

class CategoryController extends Controller
{

    public function categories() {

        $categories = Category::all();

        return DataTables::of($categories)
            ->addColumn('category_name', function($category){
                return $category->category_name;
            })
            ->addColumn('date_added', function($category){
                return Carbon::parse($category->created_at)->format('F j, Y');
            })
            ->addColumn('actions', function($category){
                return '
                    <button class="btn btn-sm btn-primary edit-category" data-category_id="'.$category->id.'" data-bs-toggle="modal" data-bs-target="#edit-category"><i class="fa fa-edit"></i></button>
                    <button class="btn btn-sm btn-danger delete-category" data-category_id="'.$category->id.'" ><i class="fa fa-trash"></i></button>
                ';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function store(Request $request) {

        $category = new Category;
        $category->category_name = $request->category_name;

        if($category->save()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Category added successfully'
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to add category'
            ], 500);
        }
    }

    public function edit(Request $request) {

            $category = Category::find($request->category_id);

            return response()->json([
                'status' => 'success',
                'category' => $category
            ], 200);
    }

    public function update(Request $request) {

        $category = Category::find($request->category_id);
        $category->category_name = $request->category_name;

        if ($category->save()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Category updated successfully'
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to update category'
            ], 500);
        }
    }

    public function destroy(Request $request) {

        $category = Category::find($request->category_id);
        $category->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Category deleted successfully'
        ], 200);

    }
}
