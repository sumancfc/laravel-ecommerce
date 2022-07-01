@extends('backend.admin.admin_master')

@section("admin_content")
<nav class="breadcrumb sl-breadcrumb">
       <a class="breadcrumb-item" href="">Dashboard</a>
       <span class="breadcrumb-item active">Edit SubCategory</span>
</nav>

<div class="sl-pagebody">

       <div class="card pd-20 pd-sm-40">
       <h6 class="card-body-title">Edit SubCategory</h6>
       <form method="POST" action="{{route("update.subcategory",$subcategory->id)}}" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                     <label for="subcategory_name">SubCategory Name *</label>
                     <input type="text" class="form-control" id="subcategory_name" name="subcategory_name" value="{{$subcategory->subcategory_name}}" placeholder="Enter SubCategory Name" required>
                     @error('subcategory_name')
                          <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
              </div>
              <div class="form-group">
                     <label for="category_id">Category *</label>
                     <select class="form-control select2" name="category_id">
                            <option selected>Select Category...</option>
                            @foreach ($categories as $category)
                                   <option value="{{$category->id}}" {{$category->id == $subcategory->category_id ? 'selected' : '' }}>{{$category->category_name}}</option>
                            @endforeach  
                     </select>
              </div>
              <div class="form-group">
                     <label for="category_image">SubCategory Image</label>
                     <input type="file" class="form-control" id="subcategory_image" name="subcategory_image">
              </div>      
              <button type="submit" class="btn btn-primary">Update SubCategory</button>
       </form>
       </div><!-- card -->
</div><!-- sl-pagebody -->

@endsection