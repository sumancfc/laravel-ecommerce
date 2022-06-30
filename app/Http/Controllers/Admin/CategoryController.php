<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function AllCategories(){
        $categories = Category::get();
        return view("backend.admin.category.view_category", compact("categories"));
    }

    public function StoreCategory(Request $request){
        $request->validate([
            'category_name' => 'required|unique:categories'
        ]);

        $category = new Category();
        $category->category_name = $request->category_name;

        if($request->file("category_image")){
            $file = $request->file("category_image");
            @unlink(public_path("backend/img/category/".$category->category_image));
            $filename = date("YmdHi").$file->getClientOriginalName();
            $file->move(public_path("backend/img/category"), $filename);
            $category["category_image"] = $filename;
        }

        $category->save();

        return Redirect()->route('view.category')->with('success','Category Added Successfully');
    }

    public function EditCategory($id){
        $category = Category::find($id);
        return view("backend.admin.category.edit_category", compact("category"));
    }

    public function UpdateCategory(Request $request, $id){

        $category = Category::find($id);
        $request->validate([
            'category_name' => 'required|unique:categories|max:100'
        ]);
        $category->category_name = $request->category_name;

        if($request->file("category_image")){
            $file = $request->file("category_image");
            @unlink(public_path("backend/img/category/".$category->category_image));
            $filename = date("YmdHi").$file->getClientOriginalName();
            $file->move(public_path("backend/img/category"), $filename);
            $category["category_image"] = $filename;
        }

        $category->save();

        return Redirect()->route('view.category')->with('success', 'Category Updated Successfully');
    }

    public function DeleteCategory($id){
        $category = Category::find($id);
        $category->delete();
        return Redirect()->route('view.category')->with('success', 'Category Deleted Successfully');
    }
}
