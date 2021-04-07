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
            <form action="{{route('admins.category.manage_category_process')}}" method="post">
              @csrf
                <div class="form-group">
                    <label for="category_name" class="control-label mb-1">Category Name</label>
                    <input id="category_name" value="{{$category_name}}" name="category_name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    @error('category_name')
                    <div class="alert alert-danger" role="alert">
											{{ $message }}
										</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category_slug" class="control-label mb-1">Category Slug</label>
                    <input id="category_slug" value="{{$category_slug}}" name="category_slug" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    @error('category_slug')
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
