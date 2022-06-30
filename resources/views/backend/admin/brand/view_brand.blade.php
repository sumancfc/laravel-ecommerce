@extends('backend.admin.admin_master')

@section("admin_content")
<nav class="breadcrumb sl-breadcrumb">
       <a class="breadcrumb-item" href="">Dashboard</a>
       <span class="breadcrumb-item active">All Brands</span>
</nav>

<div class="sl-pagebody">

       <div class="card pd-20 pd-sm-40">
         
        <div class="row d-flex align-items-center justify-content-between">
              <h6 class="card-body-title">View All Brands</h6>
              <a href="" class="btn btn-primary mg-b-10" style="float: right" data-toggle="modal" data-target="#modal">Add Brand</a>
        </div>
     

         <div class="table-wrapper">
           <table id="datatable1" class="table display responsive nowrap">
             <thead>
               <tr>
                 <th class="wd-15p">ID</th>
                 <th class="wd-15p">Brand Name</th>
                 <th class="wd-20p">Brand Image</th>
                 <th class="wd-25p">Action</th>
               </tr>
             </thead>
             <tbody>
               @foreach($brands as $key=>$brand)
                   <tr>
                     <td>{{$key + 1}}</td>
                     <td>{{$brand->brand_name}}</td>
                     <td><img src="{{ !(empty($brand->brand_image)) ? url("backend/img/brand/".$brand->brand_image) : url('backend/img/no_image.jpg')}}" alt="{{$brand->brand_name}}" style="width:34px;height:62px;object-fit:contain;"></td>
                     <td>                    
                        <a href="{{ route("edit.brand", $brand->id) }}" class="btn btn-primary"><i class="fe fe-activity"></i> Edit</a>
                        <a href="{{ route("delete.brand", $brand->id) }}" class="btn btn-danger" id="deleteData"><i class="fe fe-trash"></i> Delete</a>       
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
             <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Brand</h6>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>
              <form method="POST" action="{{route("store.brand")}}" enctype="multipart/form-data" data-parsley-validate>
                  @csrf
                     <div class="modal-body pd-20">
                            <div class="form-group">
                              <label for="brand_name">Brand Name *</label>
                              <input type="text" class="form-control" id="brand_name" name="brand_name" placeholder="Enter Brand Name" required>
                            </div>
                            @error('brand_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                              <label for="brand_image">Brand Image</label>
                              <input type="file" class="form-control" id="brand_image" name="brand_image">
                            </div>    
                     </div>
                     <div class="modal-footer justify-content-between">
                            <button type="submit" class="btn btn-primary">Add Brand</button>
                            <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                     </div>
              </form>
         </div>
       </div><!-- modal-dialog -->
</div><!-- modal -->
@endsection