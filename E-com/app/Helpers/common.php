<?php

use Illuminate\Support\Facades\DB;

  function prx($arr){
    echo '<pre>';
    print_r($arr);
    die();
  }
  function getTopNav(){
    $categories = DB::table('categories')
                  ->where(['status'=>1])
                  ->get();
            $arr=[];
        foreach($categories as $row){
          $arr[$row->id]['category_name']=$row->category_name;
        	$arr[$row->id]['category_slug']=$row->category_slug;
        	$arr[$row->id]['parent_id']=$row->parent_category_id;
        }
        $str=buildTreeView($arr,0);
        return $str;
  }

  $html='';
function buildTreeView($arr,$parent,$level=0,$prelevel= -1){
	global $html;
	foreach($arr as $id=>$data){
		if($parent==$data['parent_id']){
			if($level>$prelevel){
				if($html==''){
					$html.='<ul class="nav navbar-nav">';
				}else{
					$html.='<ul class="dropdown-menu">';
				}
			}
			if($level==$prelevel){
				$html.='</li>';
			}
			$html.='<li><a href="/category/'.$data["category_slug"].'">'.$data['category_name'].'</a>';
			if($level>$prelevel){
				$prelevel=$level;
			}
			$level++;
			buildTreeView($arr,$id,$level,$prelevel);
			$level--;
		}
	}
	if($level==$prelevel){
		$html.='</li></ul>';
	}
	return $html;
}

  function getRandId(){
    if(session()->has('USER_TEMP_ID')){
      return session()->get('USER_TEMP_ID');
    }else{
      $rand = rand(111111111,999999999);
      session()->put('USER_TEMP_ID',$rand);
      return $rand;
    }
  }

  function getCartItem(){
    if(session()->has('USER_LOGIN_ID')){
      $user_id = session()->get('USER_LOGIN_ID');
      $user_type = 'reg';
    }else{
      $user_id = getRandId();
      $user_type = 'not-reg';
    }

    $result = DB::table('carts')
            ->leftJoin('products','products.id','=','carts.product_id')
            ->leftJoin('product_attr','product_attr.id','=','carts.product_attr_id')
            ->leftJoin('sizes','sizes.id' ,'=','product_attr.size_id')
            ->leftJoin('colors','colors.id' ,'=','product_attr.color_id')
            ->where(['user_id'=>$user_id])
            ->where(['user_type'=>$user_type])
            ->select('products.name','product_attr.attr_image','products.slug','product_attr.price','carts.qty','colors.color','sizes.size','products.id as pid','product_attr.id as pro_attr_id')
            ->get();

    return $result;
  }


  function apply_coupon($coupon_code){
    $coupon_code = $coupon_code;
    $totalprice=0;
    $result = DB::table('coupons')
                  ->where(['coupon_slug'=>$coupon_code])
                  ->get();

    if(isset($result[0])){

      if($result[0]->status == 0){
        $status = "error";
        $msg = "Coupon Expired";
      }else{
        if($result[0]->is_onetime == 1){
          $status = "error";
          $msg = "Coupon is already used";
        }else{
          $min_order_amt = $result[0]->min_order_amt;
          $getCartItem = getCartItem();
          foreach ($getCartItem as $list) {
            $totalprice = $totalprice + ($list->qty * $list->price);
          }
          if($min_order_amt < $totalprice){
            $status = "success";
            $msg = "Coupon Applied";
          }else{
            $status = "error";
            $msg = "Cart Minimum Price should be greater or equal to $min_order_amt /-";
          }
        }
      }
    }else{
      $status = "error";
      $msg = "Coupon Doesn't Exist";
    }
    $coupon_value=0;
    if($status == "success"){
      $value = $result[0]->value;
      $type = $result[0]->type;
      $coupon_value=$value;
      if($type == 'Value'){
        $totalprice = $totalprice - $value;
      }
      if($type == 'Per'){
        $newPrice = ($totalprice/100)*$value;
        $coupon_value = floor($newPrice);
        $totalprice = round($totalprice - $newPrice);
      }
    }
    return json_encode(['status'=>$status,'msg'=>$msg,'totalPrice'=>$totalprice,'coupon_value'=>$coupon_value]);
  }
?>
