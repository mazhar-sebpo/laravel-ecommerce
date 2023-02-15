@extends('layouts.admin')
@section('content')
<style>
    .form-group label {
        font-weight: bold;
    }
</style>
<div class="row">
            <div class="col-md-6 ">
<div class="card">
    <div class="card-header">
        <h3>Show Category
            <a href="{{url('admin/category')}}" class="btn btn-primary btn-sm float-right">View Category</a>
        </h3>
    </div>
    <div class="card-body">

              <div class="form-group">
                <label for="exampleInputUsername1">Category Name</label>
              <p> {{$category->name}}</p>

              </div>

              <div class="form-group">
                <label for="exampleInputPassword1">Description</label>
                <p> {{$category->description}}</p>

              </div>
              <div class="form-group">
                <label for="exampleInputConfirmPassword1">Image</label><br>
                <img width="100" src="{{asset('uploads/category/'.$category->image)}}">


              </div>
              <div class="form-group">
                <label class="col-sm-3 col-form-label">Status</label>
                <p> {{$category->status == '1' ? 'Active':'Inactive'}}</p>
              </div>

              <h4>SEO Tags</h4>
              <div class="form-group">
                <label for="exampleInputUsername1">Meta Title</label>
                <p> {{$category->meta_title}}</p>

              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Meta keyword</label>

                <p> {{$category->meta_keyword}}</p>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Meta Description</label>
                <p> {{$category->meta_description}}</p>


              </div>


    </div>
</div>
            </div>
          </div>

          @endsection
