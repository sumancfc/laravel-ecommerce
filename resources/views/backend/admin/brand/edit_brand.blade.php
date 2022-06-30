@extends('backend.admin.admin_master')

@section("admin_content")
<nav class="breadcrumb sl-breadcrumb">
       <a class="breadcrumb-item" href="">Dashboard</a>
       <span class="breadcrumb-item active">Edit Brand</span>
</nav>

<div class="sl-pagebody">

       <div class="card pd-20 pd-sm-40">
       <h6 class="card-body-title">Edit Brand</h6>
       <form method="POST" action="{{route("update.brand",$brand->id)}}" enctype="multipart/form-data">
              @csrf
                        <div class="form-group">
                          <label for="brand_name">Brand Name *</label>
                          <input type="text" class="form-control" id="brand_name" name="brand_name" value="{{$brand->brand_name}}" placeholder="Enter Brand Name" required>
                        </div>
                        @error('brand_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                          <label for="brand_image">Brand Image</label>
                          <input type="file" class="form-control" id="brand_image" name="brand_image" value="{{$brand->brand_image}}">
                        </div>    
                        <button type="submit" class="btn btn-primary">Update Brand</button>
       </form>
       </div><!-- card -->
</div><!-- sl-pagebody -->
@endsection