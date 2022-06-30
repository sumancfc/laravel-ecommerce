<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    public function AllBrands(){
        $brands = Brand::get();
        return view("backend.admin.brand.view_brand", compact("brands"));
    }

    public function StoreBrand(Request $request){
        $request->validate([
            'brand_name' => 'required|unique:brands'
        ]);

        $brand = new Brand();
        $brand->brand_name = $request->brand_name;

        if($request->file("brand_image")){
            $file = $request->file("brand_image");
            @unlink(public_path("backend/img/brand/".$brand->brand_image));
            $filename = date("YmdHi").$file->getClientOriginalName();
            $file->move(public_path("backend/img/brand"), $filename);
            $brand["brand_image"] = $filename;
        }

        $brand->save();

        return Redirect()->route('view.brand')->with('success','Brand Added Successfully');
    }

    public function EditBrand($id){
        $brand = Brand::find($id);
        return view("backend.admin.brand.edit_brand", compact("brand"));
    }

    public function UpdateBrand(Request $request, $id){
        $brand = Brand::find($id);
        $request->validate([
            'brand_name' => 'required|unique:brands|max:100'
        ]);
        $brand->brand_name = $request->brand_name;

        if($request->file("brand_image")){
            $file = $request->file("brand_image");
            @unlink(public_path("backend/img/brand/".$brand->brand_image));
            $filename = date("YmdHi").$file->getClientOriginalName();
            $file->move(public_path("backend/img/brand"), $filename);
            $brand["brand_image"] = $filename;
        }

        $brand->save();

        return Redirect()->route('view.brand')->with('success', 'Brand Updated Successfully');
    }

    public function DeleteBrand($id){
        $brand = Brand::find($id);
        $brand->delete();
        return Redirect()->route('view.brand')->with('success', 'Brand Deleted Successfully');
    }
}
