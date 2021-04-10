@extends('admins.layout')

@section('title','Manage Color')

@section('content')
<div class="row">
  <div class="col-lg-9">
  <h2>Manage Color</h2>
    <a href="{{url('admins/color')}}">
      <button type="button" name="button" class="btn btn-info btn-sm mt-2">Back to Color</button>
    </a>
  </div>
  <div class="col-lg-12 mt-2">
    <div class="card">
        <div class="card-body">
            <form action="{{route('admins.color.manage_color_process')}}" method="post">
              @csrf
                <div class="form-group">
                    <label for="Color" class="control-label mb-1">Color</label>
                    <input id="color" value="{{$color}}" name="color" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    @error('color')
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
