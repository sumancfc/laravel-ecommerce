@extends('backend.admin.admin_master')

@section("admin_content")
<nav class="breadcrumb sl-breadcrumb">
       <a class="breadcrumb-item" href="">Dashboard</a>
       <span class="breadcrumb-item active">Edit Category</span>
</nav>

<div class="sl-pagebody">

       <div class="card pd-20 pd-sm-40">
       <h6 class="card-body-title">Edit Category</h6>
       <form method="POST" action="{{route("update.category",$category->id)}}" enctype="multipart/form-data">
              @csrf
                        <div class="form-group">
                          <label for="category_name">Category Name *</label>
                          <input type="text" class="form-control" id="category_name" name="category_name" value="{{$category->category_name}}" placeholder="Enter Category Name" required>
                        </div>
                        @error('category_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                          <label for="category_image">Category Image</label>
                          <input type="file" class="form-control" id="category_image" name="category_image" value="{{$category->category_image}}">
                        </div>    
                        <button type="submit" class="btn btn-primary">Update Category</button>
       </form>
       </div><!-- card -->
</div><!-- sl-pagebody -->

@endsection