@extends('admins.layout')

@section('title','Manage Size')

@section('content')
<div class="row">
  <div class="col-lg-9">
  <h2>Manage Size</h2>
    <a href="{{url('admins/size')}}">
      <button type="button" name="button" class="btn btn-info btn-sm mt-2">Back to Size</button>
    </a>
  </div>
  <div class="col-lg-12 mt-2">
    <div class="card">
        <div class="card-body">
            <form action="{{route('admins.size.manage_size_process')}}" method="post">
              @csrf
                <div class="form-group">
                    <label for="Size" class="control-label mb-1">Size</label>
                    <input id="size" value="{{$size}}" name="size" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    @error('size')
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
