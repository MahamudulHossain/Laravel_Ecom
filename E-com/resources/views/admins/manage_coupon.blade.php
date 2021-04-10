@extends('admins.layout')

@section('title','Manage Coupon')

@section('content')
<div class="row">
  <div class="col-lg-9">
  <h2>Manage Coupon</h2>
    <a href="{{url('admins/coupon')}}">
      <button type="button" name="button" class="btn btn-info btn-sm mt-2">Back to Coupon</button>
    </a>
  </div>
  <div class="col-lg-12 mt-2">
    <div class="card">
        <div class="card-body">
            <form action="{{route('admins.coupon.manage_coupon_process')}}" method="post">
              @csrf
                <div class="form-group">
                    <label for="Title" class="control-label mb-1">Title</label>
                    <input id="title" value="{{$title}}" name="title" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    @error('title')
                    <div class="alert alert-danger" role="alert">
											{{ $message }}
										</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="coupon_slug" class="control-label mb-1">Coupon Slug</label>
                    <input id="coupon_slug" value="{{$coupon_slug}}" name="coupon_slug" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    @error('coupon_slug')
                    <div class="alert alert-danger" role="alert">
                      {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="value" class="control-label mb-1">Value</label>
                    <input id="value" value="{{$value}}" name="value" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    @error('value')
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
