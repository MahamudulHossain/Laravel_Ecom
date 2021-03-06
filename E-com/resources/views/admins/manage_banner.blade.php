@extends('admins.layout')

@section('title','Manage Banner')

@section('content')
<div class="row">
  <div class="col-lg-9">
  <h2>Manage Banner</h2>
    <a href="{{url('admins/banner')}}">
      <button type="button" name="button" class="btn btn-info btn-sm mt-2">Back to Banner</button>
    </a>
  </div>
  <div class="col-lg-12 mt-2">
    <div class="card">
        <div class="card-body">
            <form action="{{route('admins.banner.manage_banner_process')}}" method="post" enctype="multipart/form-data">
              @csrf
                <div class="form-group">
                    <label for="image" class="control-label mb-1">Brand Image</label>
                    <input id="image" name="image" type="file" class="form-control" aria-required="true" aria-invalid="false">
                    @if($image !='')
                    <img width="120px" src="{{asset('storage/media/banner/'.$image)}}" alt="img">
                    @endif
                    @error('image')
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
