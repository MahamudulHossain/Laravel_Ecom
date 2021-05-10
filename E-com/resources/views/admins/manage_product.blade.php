@extends('admins.layout')

@section('title','Manage Product')

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
                  <div class="form-group col-md-4">
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
                      <label for="image" class="control-label mb-1">Product Image</label>
                      <input id="image" name="image" type="file" class="form-control" aria-required="true" aria-invalid="false">
                      @error('image')
                      <div class="alert alert-danger" role="alert">
  											{{ $message }}
  										</div>
                      @enderror
                  </div>
              </div>
                <div class="row">
                 <div class="form-group col-md-4">
                    <label for="brand" class="control-label mb-1">Brand</label>
                    <select name="brand_id" class="form-control" aria-required="true" aria-invalid="false" required>
                      <option value="">Select Brand</option>
                      @foreach($brand as $list)
                      @if($brand_id == $list->id)
                       <option value="{{$list->id}}" selected>{{$list->name}}</option>
                      @else if
                        <option value="{{$list->id}}">{{$list->name}}</option>
                      @endif
                      @endforeach
                    </select>
                 </div>
                 <div class="form-group col-md-4">
                    <label for="model" class="control-label mb-1">Model</label>
                    <input id="model" value="{{$model}}" name="model" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                 </div>
                 <div class="form-group col-md-4">
                     <label for="keywords" class="control-label mb-1">Keywords</label>
                     <input id="keywords" value="{{$keywords}}" name="keywords" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
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
                <div class="form-group">
                    <label for="technical_specification" class="control-label mb-1">Technical Specification</label>
                    <textarea id="technical_specification" name="technical_specification" type="text" class="form-control" aria-required="true" aria-invalid="false" required>{{$technical_specification}}</textarea>
                </div>
                <div class="row">
                  <div class="form-group col-md-4">
                      <label for="uses" class="control-label mb-1">Uses</label>
                      <input id="uses" value="{{$uses}}" name="uses" type="text" class="form-control" aria-required="true" aria-invalid="false">
                  </div>
                  <div class="form-group col-md-4">
                      <label for="warrenty" class="control-label mb-1">Warrenty</label>
                      <input id="warrenty" value="{{$warrenty}}" name="warrenty" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                  </div>
                  <div class="form-group col-md-4">
                      <label for="lead_time" class="control-label mb-1">Lead Time</label>
                      <input id="lead_time" value="{{$lead_time}}" name="lead_time" type="text" class="form-control" aria-required="true" aria-invalid="false">
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-3">
                      <label for="is_promo" class="control-label mb-1">Is Promo</label>
                      <select name="is_promo" class="form-control" aria-required="true" aria-invalid="false" required>
                        @if($is_promo == '1')
                         <option value="1" selected>Yes</option>
                         <option value="0">No</option>
                        @else
                        <option value="1">Yes</option>
                          <option value="0" selected>No</option>
                        @endif
                      </select>
                  </div>
                  <div class="form-group col-md-3">
                      <label for="is_featured" class="control-label mb-1">Is Featured</label>
                      <select name="is_featured" class="form-control" aria-required="true" aria-invalid="false" required>
                        @if($is_featured == '1')
                         <option value="1" selected>Yes</option>
                         <option value="0">No</option>
                        @else
                        <option value="1">Yes</option>
                          <option value="0" selected>No</option>
                        @endif
                      </select>
                  </div>
                  <div class="form-group col-md-3">
                      <label for="is_discounted" class="control-label mb-1">Is Discounted</label>
                      <select name="is_discounted" class="form-control" aria-required="true" aria-invalid="false" required>
                        @if($is_discounted == '1')
                         <option value="1" selected>Yes</option>
                         <option value="0">No</option>
                        @else
                        <option value="1">Yes</option>
                          <option value="0" selected>No</option>
                        @endif
                      </select>
                  </div>
                  <div class="form-group col-md-3">
                      <label for="is_tranding" class="control-label mb-1">Is Tranding</label>
                      <select name="is_tranding" class="form-control" aria-required="true" aria-invalid="false" required>
                        @if($is_tranding == '1')
                         <option value="1" selected>Yes</option>
                         <option value="0">No</option>
                        @else
                        <option value="1">Yes</option>
                          <option value="0" selected>No</option>
                        @endif
                      </select>
                  </div>
                </div>
                    <input type="hidden" name="id" value="{{$id}}">
                </div>
        </div>

        <div class="mb-3 ml-3"><h4>More Images</h4></div>
        <div class="col-lg-12 mt-2">
            <div class="card">
                <div class="card-body">
                  <?php $loop_count_img=1;?>
                  <div class="row" id="addImg">
                    @foreach($proImgArr as $key=>$val)
                    <?php
                      $productImgrArr = (array)$val; //Converting object into array
                      $previous_loop_count_img = $loop_count_img;
                     ?>
                        <div class="form-group col-md-4 more_imgs_{{$loop_count_img++}}">
                          <input id="piid" name="piid[]" value="{{$productImgrArr['id']}}" type="hidden">
                            <label for="more_images" class="control-label mb-1">More Image</label>
                            <input id="more_images" name="more_images[]" type="file" class="form-control" aria-required="true" aria-invalid="false">
                            @if($productImgrArr['images'] !='')
                            <img width="120px" src="{{asset('storage/media/'.$productImgrArr['images'])}}" alt="img">
                            @endif
                            @error('more_images.*')
                            <div class="alert alert-danger" role="alert">
        											{{ $message }}
        										</div>
                            @enderror
                        </div>
                        <div class="col-md-2 more_imgs_{{$loop_count_img++}}">
                          <label for="more_images" class="control-label mb-1">&nbsp;</label>
                          @if($loop_count_img == 3)
                          <input value="Add More" type="button" class="btn btn-lg btn-success btn-block" onclick="addmoreimg()">
                          @else
                          <a href="{{url('admins/product/manage_product_imgs_delete/')}}/{{$productImgrArr['id']}}/{{$id}}"><input value="Remove" type="button" class="btn btn-lg btn-danger btn-block"></a>
                          @endif
                       </div>
                     @endforeach
                  </div>
                  </div>
              </div>
          </div>


        <div class="mb-3 ml-3"><h4>Product Attributes</h4></div>
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
                        @if($productAttrArr['attr_image'] !='')
                        <img width="120px" src="{{asset('storage/media/'.$productAttrArr['attr_image'])}}" alt="img">
                        @endif
                        @error('attr_image')
                        <div class="alert alert-danger" role="alert">
    											{{ $message }}
    										</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-2">
                        <label for="size" class="control-label mb-1">Size</label>
                        <select name="size_id[]" value="{{$productAttrArr['size_id']}}" class="form-control" aria-required="true" aria-invalid="false">
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
                        <select name="color_id[]" value="{{$productAttrArr['color_id']}}" class="form-control" aria-required="true" aria-invalid="false">
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
                    <a href="{{url('admins/product/manage_product_delete/')}}/{{$productAttrArr['id']}}/{{$id}}"><input value="Remove" type="button" class="btn btn-lg btn-danger btn-block"></a>
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

  var addmoreImg=Math.ceil(Math.random()*100);
  function addmoreimg(){
    addmoreImg++;
    var htm  = '<div class="form-group col-md-4 more_imgs_'+addmoreImg+'"><input id="piid" name="piid[]" value="" type="hidden"><label for="more_images" class="control-label mb-1">More Image</label><input id="more_images" name="more_images[]" type="file" class="form-control" aria-required="true" aria-invalid="false" required>@error('more_images')<div class="alert alert-danger" role="alert">{{ $message }}</div>@enderror</div><div class="col-md-2 more_imgs_'+addmoreImg+'"><label for="more_images" class="control-label mb-1"></label><input value="Remove" type="button" class="btn btn-lg btn-danger btn-block"  onclick=imgremove('+addmoreImg+')></div>';
    jQuery("#addImg").append(htm);
  }

  function imgremove(d){
    jQuery('.more_imgs_'+d).remove();
  }

    CKEDITOR.replace('short_desc');
    CKEDITOR.replace('desc');
    CKEDITOR.replace('technical_specification');

</script>
@endsection
