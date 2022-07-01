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
     

         <div class="table-wrapper">
           <table id="datatable1" class="table display responsive nowrap">
             <thead>
               <tr>
                 <th class="wd-15p">ID</th>
                 <th class="wd-15p">Coupon</th>
                 <th class="wd-20p">Discount (%)</th>
                 <th class="wd-25p">Action</th>
               </tr>
             </thead>
             <tbody>
               @foreach($coupons as $key=>$coupon)
                   <tr>
                     <td>{{$key + 1}}</td>
                     <td>{{$coupon->coupon}}</td>
                     <td>{{$coupon->discount}}</td>
                      <td>                    
                        <a href="{{ route("edit.coupon", $coupon->id) }}" class="btn btn-primary"><i class="fe fe-activity"></i> Edit</a>
                        <a href="{{ route("delete.coupon", $coupon->id) }}" class="btn btn-danger" id="deleteData"><i class="fe fe-trash"></i> Delete</a>       
                     </td>
                   </tr>  
               @endforeach
             </tbody>
           </table>
         </div><!-- table-wrapper -->
       </div><!-- card -->
</div><!-- sl-pagebody -->

<div id="modal" class="modal fade">
       <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content bd-0 tx-14">
           <div class="modal-header pd-x-20">
             <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Coupon</h6>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>
              <form method="POST" action="{{route("store.coupon")}}">
                  @csrf
                     <div class="modal-body pd-20">
                            <div class="form-group">
                              <label for="coupon">Coupon *</label>
                              <input type="text" class="form-control" id="coupon" name="coupon" placeholder="Enter Coupon" required>
                            </div>
                            @error('coupon')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                              <label for="discount">Discount (%)</label>
                              <input type="text" class="form-control" id="discount" name="discount" placeholder="Enter Discount" required>
                              @error('discount')
                                 <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                            </div>    
                     </div>
                     <div class="modal-footer justify-content-between">
                            <button type="submit" class="btn btn-primary">Add Coupon</button>
                            <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                     </div>
              </form>
         </div>
       </div><!-- modal-dialog -->
</div><!-- modal -->
@endsection