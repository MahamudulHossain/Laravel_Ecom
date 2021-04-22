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
              <div class="row">
                <div class="form-group col-md-6">
                    <label for="Title" class="control-label mb-1">Title</label>
                    <input id="title" value="{{$title}}" name="title" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    @error('title')
                    <div class="alert alert-danger" role="alert">
											{{ $message }}
										</div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="coupon_slug" class="control-label mb-1">Coupon Slug</label>
                    <input id="coupon_slug" value="{{$coupon_slug}}" name="coupon_slug" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    @error('coupon_slug')
                    <div class="alert alert-danger" role="alert">
                      {{ $message }}
                    </div>
                    @enderror
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-6">
                    <label for="value" class="control-label mb-1">Value</label>
                    <input id="value" value="{{$value}}" name="value" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="type" class="control-label mb-1">Type</label>
                    <select name="type" class="form-control" aria-required="true" aria-invalid="false" required>
                      @if($type == 'Value')
                       <option value="Value" selected>Value</option>
                       <option value="Per">Per</option>
                      @elseif($type == 'Per')
                      <option value="Value">Value</option>
                      <option value="Per" selected>Per</option>
                      @else
                      <option value="Value">Value</option>
                      <option value="Per">Per</option>
                      @endif
                    </select>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-6">
                    <label for="min_order_amt" class="control-label mb-1">Cart Minimum Amount</label>
                    <input id="min_order_amt" value="{{$min_order_amt}}" name="min_order_amt" type="text" class="form-control" aria-required="true" aria-invalid="false">
                </div>
                <div class="form-group col-md-6">
                    <label for="is_onetime" class="control-label mb-1">Is Onetime</label>
                    <select name="is_onetime" class="form-control" aria-required="true" aria-invalid="false" required>
                      @if($is_onetime == '1')
                       <option value="1" selected>Yes</option>
                       <option value="0">No</option>
                      @else
                      <option value="1">Yes</option>
                      <option value="0" selected>No</option>
                      @endif
                    </select>
                </div>
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
