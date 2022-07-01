@extends('backend.admin.admin_master')

@section("admin_content")
<nav class="breadcrumb sl-breadcrumb">
       <a class="breadcrumb-item" href="">Dashboard</a>
       <span class="breadcrumb-item active">All Coupons</span>
     </nav>

     <div class="sl-pagebody">

       <div class="card pd-20 pd-sm-40">
         
        <div class="d-flex align-items-center justify-content-between">
              <h6 class="card-body-title">View All Coupons</h6>
              <a href="" class="btn btn-primary mg-b-10" style="float: right" data-toggle="modal" data-target="#modal">Add Coupon</a>
        </div>

        <form method="POST" action="{{route("update.coupon", $coupon->id)}}">
              @csrf
              <div class="form-group">
                     <label for="coupon">Coupon *</label>
                     <input type="text" class="form-control" id="coupon" name="coupon" value="{{$coupon->coupon}}" placeholder="Enter Coupon" required>
              </div>
              @error('coupon')
                     <div class="alert alert-danger">{{ $message }}</div>
              @enderror
                     <div class="form-group">
                     <label for="discount">Discount (%)</label>
                     <input type="text" class="form-control" id="discount" name="discount" value="{{$coupon->discount}}" placeholder="Enter Discount" required>
              @error('discount')
                     <div class="alert alert-danger">{{ $message }}</div>
              @enderror
              </div>    
               <button type="submit" class="btn btn-primary">Add Coupon</button>
          </form>
     
       </div><!-- card -->
</div><!-- sl-pagebody -->

@endsection