@extends('backend.admin.admin_master')

@section("admin_content")
<nav class="breadcrumb sl-breadcrumb">
       <a class="breadcrumb-item" href="">Dashboard</a>
       <span class="breadcrumb-item active">All SubCategories</span>
     </nav>

     <div class="sl-pagebody">

       <div class="card pd-20 pd-sm-40">
         
        <div class="row d-flex align-items-center justify-content-between">
              <h6 class="card-body-title">View All SubCategories</h6>
              <a href="" class="btn btn-primary mg-b-10" style="float: right" data-toggle="modal" data-target="#modal">Add Sub Category</a>
        </div>
     

         <div class="table-wrapper">
           <table id="datatable1" class="table display responsive nowrap">
             <thead>
               <tr>
                 <th class="wd-15p">ID</th>
                 <th class="wd-15p">SubCategory Name</th>
                 <th class="wd-15p">Category</th>
                 <th class="wd-20p">Image</th>
                 <th class="wd-25p">Action</th>
               </tr>
             </thead>
             <tbody>
               @foreach($subCategories as $key=>$subcategory)
                   <tr>
                     <td>{{$key + 1}}</td>
                     <td>{{$subcategory->subcategory_name}}</td>
                     <td>{{$subcategory->category_name}}</td>
                     <td><img src="{{ !(empty($subcategory->subcategory_image)) ? url("backend/img/subcategory/".$subcategory->subcategory_image) : url('backend/img/no_image.jpg')}}" alt="{{$subcategory->subcategory_name}}" style="width:34px;height:62px;object-fit:contain;"></td>
                     <td>                    
                        <a href="{{ route("edit.subcategory", $subcategory->id) }}" class="btn btn-primary"><i class="fe fe-activity"></i> Edit</a>
                        <a href="{{ route("delete.subcategory", $subcategory->id) }}" class="btn btn-danger" id="deleteData"><i class="fe fe-trash"></i> Delete</a>       
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
             <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Category</h6>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>
              <form method="POST" action="{{route("store.subcategory")}}" enctype="multipart/form-data" data-parsley-validate>
                  @csrf
                     <div class="modal-body pd-20">
                            <div class="form-group">
                              <label for="subcategory_name">SubCategory Name *</label>
                              <input type="text" class="form-control" id="subcategory_name" name="subcategory_name" placeholder="Enter SubCategory Name" required>
                              @error('subcategory_name')
                                   <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                            </div>
                            <div class="form-group">
                                   <label for="category_id">Category *</label>
                                   <select class="form-control select2" name="category_id">
                                          <option selected>Select Category...</option>
                                          @foreach ($categories as $category)
                                               <option value="{{$category->id}}">{{$category->category_name}}</option>
                                          @endforeach
                                          
                                   </select>
                            </div>
                            <div class="form-group">
                              <label for="category_image">SubCategory Image</label>
                              <input type="file" class="form-control" id="subcategory_image" name="subcategory_image">
                            </div>    
                     </div>
                     <div class="modal-footer justify-content-between">
                            <button type="submit" class="btn btn-primary">Add SubCategory</button>
                            <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                     </div>
              </form>
         </div>
       </div><!-- modal-dialog -->
</div><!-- modal -->
@endsection