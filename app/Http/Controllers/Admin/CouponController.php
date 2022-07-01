<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;

class CouponController extends Controller
{
    public function AllCoupons(){
        $coupons = Coupon::all();
        return view("backend.admin.coupon.view_coupon", compact("coupons"));
    }

    public function StoreCoupon(Request $request){
        $request->validate([
            'coupon' => 'required|unique:coupons|max:255',
            'discount' => 'required',
        ]);

        $coupon = new Coupon();
        $coupon->coupon = $request->coupon;
        $coupon->discount = $request->discount;
        $coupon->save();

        return Redirect()->route('view.coupon')->with('success','Coupon Added Successfully');
    }

    public function EditCoupon($id){
        $coupon = Coupon::find($id);
        return view("backend.admin.coupon.edit_coupon", compact("coupon"));
    }

    public function UpdateCoupon(Request $request, $id){
        $request->validate([
            'coupon' => 'required',
            'discount' => 'required',
        ]);
        
        $pcoupon = Coupon::find($id);
        $pcoupon->coupon = $request->coupon;
        $pcoupon->discount = $request->discount;
        $pcoupon->save();

        return Redirect()->route('view.coupon')->with('success','Coupon Updated Successfully');
    }

    public function DeleteCoupon($id){
        $coupon = coupon::find($id);
        $coupon->delete();
        return Redirect()->route('view.coupon')->with('success', 'Coupon Deleted Successfully');
    }
}
