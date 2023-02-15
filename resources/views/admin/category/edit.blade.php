@extends('layouts.admin')
@section('content')
<div class="row">
            <div class="col-md-6 ">
<div class="card">
    <div class="card-header">
        <h3>Edit Category
            <a href="{{url('admin/category')}}" class="btn btn-primary btn-sm float-right">View Category</a>
        </h3>
    </div>
    <div class="card-body">
            <form method="post" action="{{url('admin/category/'.$category->id)}}" class="forms-sample" enctype="multipart/form-data">
                @csrf
                @method('PUT')
              <div class="form-group">
                <label for="exampleInputUsername1">Category Name</label>
                <input type="text" value="{{$category->name}}" name="name" class="form-control" id="exampleInputUsername1" >
                @error('name') <small class="text-danger">{{$message}}</small>@enderror
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Slug</label>
                <input type="text" name="slug" value="{{$category->slug}}"  class="form-control" id="exampleInputEmail1" >
                @error('slug') <small class="text-danger">{{$message}}</small>@enderror
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Description</label>
                <textarea name="description" class="form-control">{{$category->description}}</textarea>
                @error('description') <small class="text-danger">{{$message}}</small>@enderror
              </div>
              <div class="form-group">
                <label for="exampleInputConfirmPassword1">Image</label>
                <input type="file" name="image" class="form-control" >
                <img width="100" src="{{asset('uploads/category/'.$category->image)}}">
                @error('image') <small class="text-danger">{{$message}}</small>@enderror
              </div>
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Status</label>
                <div class="col-sm-4">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="status" id="membershipRadios1" value="1" @if($category->status == '1') checked=""  @endif>
                      Active
                    <i class="input-helper"></i></label>
                  </div>
                </div>
                <div class="col-sm-5">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="status" id="membershipRadios2" value="0" @if($category->status == '0') checked=""  @endif>
                      Inactive
                    <i class="input-helper"></i></label>
                  </div>
                </div>
              </div>

              <h4>SEO Tags</h4>
              <div class="form-group">
                <label for="exampleInputUsername1">Meta Title</label>
                <input type="text" value="{{$category->meta_title}}" name="meta_title" class="form-control" id="exampleInputUsername1" >
                 @error('meta_title') <small class="text-danger">{{$message}}</small>@enderror
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Meta keyword</label>
                <textarea name="meta_keyword" class="form-control">{{$category->meta_keyword}}</textarea>
                 @error('meta_keyword') <small class="text-danger">{{$message}}</small>@enderror
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Meta Description</label>
                <textarea name="meta_description" class="form-control">{{$category->meta_description}}</textarea>
                 @error('meta_description') <small class="text-danger">{{$message}}</small>@enderror
              </div>

              <button type="submit" class="btn btn-primary mr-2">Update</button>
              <button class="btn btn-light">Cancel</button>
            </form>
    </div>
</div>
            </div>
          </div>

          @endsection
