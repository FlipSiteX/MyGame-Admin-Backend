<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getCategories( Request $request) {

        $categories = Category::with("questions")->get();


        return response()->json($categories);
    }

    public function getCategory(Request $request, Category $category) {
        return $category;
    }

    public function addCategory(Request $request) {;

        $category = new Category();
        $category->title = $request->title;
        $category->game_id = $request->game_id;
        $category->save();

        return redirect()->back();
    }

    public function updateCategory(Request $request, Category $category) {
        $category->update($request->all());

        return redirect()->back();
    }

    public function deleteCategory(Request $request, Category $category) {
        $category->delete();

        return redirect()->back();
    }
}
