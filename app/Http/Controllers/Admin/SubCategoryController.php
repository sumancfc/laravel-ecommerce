<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{
    public function AllSubCategories(){
        $data['categories'] = Category::all();
        $data['subCategories'] = SubCategory::join('categories', 'sub_categories.category_id', 'categories.id')
                                      ->select('sub_categories.*', 'categories.category_name')
                                      ->get();

        return view('backend.admin.subcategory.view_subcategory', $data);
    }

    public function StoreSubCategory(Request $request){
        $request->validate([
            'subcategory_name' => 'required|unique:sub_categories',
            'category_id' => 'required',
        ]);

        $subcategory = new SubCategory();
        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->category_id = $request->category_id;

        if($request->file("subcategory_image")){
            $file = $request->file("subcategory_image");
            @unlink(public_path("backend/img/subcategory/".$subcategory->subcategory_image));
            $filename = date("YmdHi").$file->getClientOriginalName();
            $file->move(public_path("backend/img/subcategory"), $filename);
            $subcategory["subcategory_image"] = $filename;
        }

        $subcategory->save();

        return Redirect()->route('view.subcategory')->with('success','SubCategory Added Successfully');
    }

    public function EditSubCategory($id){
        $data['subcategory'] = SubCategory::find($id);
        $data['categories'] = Category::all();
        return view('backend.admin.subcategory.edit_subcategory', $data);
    }

    public function UpdateSubCategory(Request $request, $id){
        $request->validate([
            'subcategory_name' => 'required|unique:sub_categories',
            'category_id' => 'required',
        ]);

        $subcategory = SubCategory::find($id);
        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->category_id = $request->category_id;

        if($request->file("subcategory_image")){
            $file = $request->file("subcategory_image");
            @unlink(public_path("backend/img/subcategory/".$subcategory->subcategory_image));
            $filename = date("YmdHi").$file->getClientOriginalName();
            $file->move(public_path("backend/img/subcategory"), $filename);
            $subcategory["subcategory_image"] = $filename;
        }

        $subcategory->save();

        return Redirect()->route('view.subcategory')->with('success','SubCategory Updated Successfully');
    }

    public function DeleteSubCategory($id){
        $subcategory = SubCategory::find($id);
        $subcategory->delete();
        return Redirect()->route('view.subcategory')->with('success', 'SubCategory Deleted Successfully');
    }
}
