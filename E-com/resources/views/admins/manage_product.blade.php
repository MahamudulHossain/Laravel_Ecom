@extends('admins.layout')

@section('title','Manage Size')

@section('content')
<div class="row">
  <div class="col-lg-12">
  <h2>Manage Product</h2>
  @if(session()->has('tag_error'))
      <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
        {{session('tag_error')}}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
  @endif
    <a href="{{url('admins/product')}}">
      <button type="button" name="button" class="btn btn-info btn-sm mt-2">Back to Product</button>
    </a>
  </div>
  <div class="col-lg-12 mt-2">
    <form action="{{route('admins.product.manage_product_process')}}" method="post" enctype="multipart/form-data">
    <div class="card">
        <div class="card-body">
              @csrf
                <div class="form-group">
                    <label for="name" class="control-label mb-1">Name</label>
                    <input id="name" value="{{$name}}" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                      <label for="category" class="control-label mb-1">category</label>
                      <select name="category_id" class="form-control" aria-required="true" aria-invalid="false" required>
                        <option value="">Select Category</option>
                        @foreach($category as $list)
                          @if($category_id == $list->id)
                           <option value="{{$list->id}}" selected>{{$list->category_name}}</option>
                          @else if
                            <option value="{{$list->id}}">{{$list->category_name}}</option>
                          @endif
                        @endforeach
                      </select>
                  </div>
                  <div class="form-group col-md-6">
                      <label for="technical_specification" class="control-label mb-1">Technical Specification</label>
                      <input id="technical_specification" value="{{$technical_specification}}" name="technical_specification" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                  </div>
              </div>
                <div class="form-group">
                    <label for="image" class="control-label mb-1">Product Image</label>
                    <input id="image" name="image" type="file" class="form-control" aria-required="true" aria-invalid="false">
                    @error('image')
                    <div class="alert alert-danger" role="alert">
											{{ $message }}
										</div>
                    @enderror
                </div>
                <div class="row">
                 <div class="form-group col-md-4">
                    <label for="slug" class="control-label mb-1">Slug</label>
                    <input id="slug" value="{{$slug}}" name="slug" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    @error('slug')
                    <div class="alert alert-danger" role="alert">
											{{ $message }}
										</div>
                    @enderror
                 </div>
                 <div class="form-group col-md-4">
                    <label for="brand" class="control-label mb-1">Brand</label>
                    <input id="brand" value="{{$brand}}" name="brand" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                 </div>
                 <div class="form-group col-md-4">
                    <label for="model" class="control-label mb-1">Model</label>
                    <input id="model" value="{{$model}}" name="model" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                 </div>
              </div>
                <div class="form-group">
                    <label for="short_desc" class="control-label mb-1">Short Description</label>
                    <textarea id="short_desc" name="short_desc" type="text" class="form-control" aria-required="true" aria-invalid="false" required>{{$short_desc}}</textarea>
                </div>
                <div class="form-group">
                    <label for="desc" class="control-label mb-1">Description</label>
                    <textarea id="desc" name="desc" type="text" class="form-control" aria-required="true" aria-invalid="false" required>{{$desc}}</textarea>
                </div>
                <div class="row">
                  <div class="form-group col-md-4">
                      <label for="keywords" class="control-label mb-1">Keywords</label>
                      <input id="keywords" value="{{$keywords}}" name="keywords" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                  </div>
                  <div class="form-group col-md-4">
                      <label for="uses" class="control-label mb-1">Uses</label>
                      <input id="uses" value="{{$uses}}" name="uses" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                  </div>
                  <div class="form-group col-md-4">
                      <label for="warrenty" class="control-label mb-1">Warrenty</label>
                      <input id="warrenty" value="{{$warrenty}}" name="warrenty" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                  </div>
                </div>
                    <input type="hidden" name="id" value="{{$id}}">
                </div>
        </div>
        <div class="mb-3"><h4>Product Attributes</h4></div>
        <div class="col-lg-12 mt-2" id="attrmore">
          <?php $loop_count=1;?>
          @foreach($proAttrArr as $key=>$val)
          <?php
            $productAttrArr = (array)$val; //Converting object into array
            $previous_loop_count = $loop_count;
            // echo '<pre>';
            // print_r($productAttrArr);
            // die();
           ?>
           <input id="paid" name="paid[]" value="{{$productAttrArr['id']}}" type="hidden">
            <div class="card" id="attr_more_{{$loop_count++}}">
                <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-3">
                        <label for="tag" class="control-label mb-1">Tag</label>
                        <input id="tag" name="tag[]" value="{{$productAttrArr['tag']}}" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="mrp" class="control-label mb-1">MRP</label>
                        <input id="mrp" name="mrp[]"  value="{{$productAttrArr['mrp']}}" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="price" class="control-label mb-1">Price</label>
                        <input id="price" name="price[]"  value="{{$productAttrArr['price']}}"  type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="qty" class="control-label mb-1">Quantity</label>
                        <input id="qty" name="qty[]"  value="{{$productAttrArr['qty']}}"   type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                        <label for="attr_image" class="control-label mb-1">Attribute Image</label>
                        <input id="attr_image" name="attr_image[]" type="file" class="form-control" aria-required="true" aria-invalid="false">
                        @error('attr_image')
                        <div class="alert alert-danger" role="alert">
    											{{ $message }}
    										</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-2">
                        <label for="size" class="control-label mb-1">Size</label>
                        <select name="size_id[]"  value="{{$productAttrArr['size_id']}}"   class="form-control" aria-required="true" aria-invalid="false">
                          <option value="">Size</option>
                          @foreach($size as $list)
                            @if($productAttrArr['size_id'] == $list->id)
                            <option value="{{$list->id}}" selected>{{$list->size}}</option>
                            @else
                            <option value="{{$list->id}}">{{$list->size}}</option>
                            @endif
                          @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="color" class="control-label mb-1">Color</label>
                        <select name="color_id[]"  value="{{$productAttrArr['color_id']}}"   class="form-control" aria-required="true" aria-invalid="false">
                          <option value="">Color</option>
                          @foreach($color as $list)
                          @if($productAttrArr['color_id'] == $list->id)
                          <option value="{{$list->id}}" selected>{{$list->color}}</option>
                          @else
                          <option value="{{$list->id}}">{{$list->color}}</option>
                          @endif
                          @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                      <label for="more" class="control-label mb-1"></label>
                      @if($key == 0)
                    <input value="Add More" type="button" class="btn btn-lg btn-success btn-block" onclick="addmore()">
                    @else
                    <a href="{{url('admins/product/manage_product_delete/')}}/{{$productAttrArr['id']}}/{{$id}}"><input value="Remove" type="button" class="btn btn-lg btn-danger btn-block")"></a>
                    @endif
                  </div>
                  </div>
                </div>
            </div>
          @endforeach
      </div>
        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">Save</button>
          </form>
    </div>
</div>

<script>
  var addMore=Math.ceil(Math.random()*100);
  function addmore(){
    addMore++;
    var html = '<input id="paid" name="paid[]" type="hidden"><div class="card" id="attr_more_'+addMore+'"><div class="card-body"><div class="row"><div class="form-group col-md-3"><label for="tag" class="control-label mb-1">Tag</label><input id="tag" name="tag[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required></div><div class="form-group col-md-3"><label for="mrp" class="control-label mb-1">MRP</label><input id="mrp" name="mrp[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required></div><div class="form-group col-md-3"><label for="price" class="control-label mb-1">Price</label><input id="price" name="price[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required></div><div class="form-group col-md-3"><label for="qty" class="control-label mb-1">Quantity</label><input id="qty" name="qty[]" type="text" class="form-control" aria-required="true" aria-invalid="false"></div></div><div class="row"><div class="form-group col-md-6"><label for="attr_image" class="control-label mb-1">Attribute Image</label><input id="attr_image" name="attr_image[]" type="file" class="form-control" aria-required="true" aria-invalid="false">@error('attr_image')<div class="alert alert-danger" role="alert">{{ $message }}</div>@enderror</div><div class="form-group col-md-2"><label for="size" class="control-label mb-1">Size</label><select name="size_id[]" class="form-control" aria-required="true" aria-invalid="false"><option value="">Size</option>@foreach($size as $list)<option value="{{$list->id}}">{{$list->size}}</option>@endforeach</select></div><div class="form-group col-md-2"><label for="color" class="control-label mb-1">Color</label><select name="color_id[]" class="form-control" aria-required="true" aria-invalid="false"><option value="">Color</option>@foreach($color as $list)<option value="{{$list->id}}">{{$list->color}}</option>@endforeach</select></div><div class="col-md-2"><label for="remove" class="control-label mb-1"></label><input value="Remove" type="button" class="btn btn-lg btn-danger btn-block" onclick=remove(attr_more_'+addMore+')></div></div></div></div>';
    jQuery("#attrmore").append(html);
  }

  function remove(id){
    jQuery(id).remove();
  }
</script>
@endsection
