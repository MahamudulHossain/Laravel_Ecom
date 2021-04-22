@extends('admins.layout')

@section('title','Manage Category')

@section('content')
<div class="row">
  <div class="col-lg-9">
  <h2>Manage Category</h2>
    <a href="{{url('admins/category')}}">
      <button type="button" name="button" class="btn btn-info btn-sm mt-2">Back to Category</button>
    </a>
  </div>
  <div class="col-lg-12 mt-2">
    <div class="card">
        <div class="card-body">
            <form action="{{route('admins.category.manage_category_process')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="form-group col-md-4">
                    <label for="category_name" class="control-label mb-1">Category Name</label>
                    <input id="category_name" value="{{$category_name}}" name="category_name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="parent_category_id" class="control-label mb-1">Parent Category</label>
                    <select name="parent_category_id" class="form-control" aria-required="true" aria-invalid="false">
                      <option value="">Select Category</option>
                      @foreach($category as $list)
                        @if($parent_category_id == $list->id)
                         <option value="{{$list->id}}" selected>{{$list->category_name}}</option>
                        @else if
                          <option value="{{$list->id}}">{{$list->category_name}}</option>
                        @endif
                      @endforeach
                    </select>
                </div>
                <div class="form-group  col-md-4">
                    <label for="category_slug" class="control-label mb-1">Category Slug</label>
                    <input id="category_slug" value="{{$category_slug}}" name="category_slug" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    @error('category_slug')
                    <div class="alert alert-danger" role="alert">
                      {{ $message }}
                    </div>
                    @enderror
                </div>
              </div>
              <div class="form-group">
                  <label for="category_image" class="control-label mb-1">Category Image</label>
                  <input id="category_image" name="category_image" type="file" class="form-control" aria-required="true" aria-invalid="false">
                  @if($category_image !='')
                  <img width="120px" src="{{asset('storage/media/category/'.$category_image)}}" alt="img">
                  @endif
                  @error('category_image')
                  <div class="alert alert-danger" role="alert">
                    {{ $message }}
                  </div>
                  @enderror
              </div>
                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">Save</button>
                    <input type="hidden" name="id" value="{{$id}}">
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
