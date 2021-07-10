/**
  * Template Name: Daily Shop
  * Version: 1.0
  * Template Scripts
  * Author: MarkUps
  * Author URI: http://www.markups.io/

  Custom JS


  1. CARTBOX
  2. TOOLTIP
  3. PRODUCT VIEW SLIDER
  4. POPULAR PRODUCT SLIDER (SLICK SLIDER)
  5. FEATURED PRODUCT SLIDER (SLICK SLIDER)
  6. LATEST PRODUCT SLIDER (SLICK SLIDER)
  7. TESTIMONIAL SLIDER (SLICK SLIDER)
  8. CLIENT BRAND SLIDER (SLICK SLIDER)
  9. PRICE SLIDER  (noUiSlider SLIDER)
  10. SCROLL TOP BUTTON
  11. PRELOADER
  12. GRID AND LIST LAYOUT CHANGER
  13. RELATED ITEM SLIDER (SLICK SLIDER)


**/

jQuery(function($){


  /* ----------------------------------------------------------- */
  /*  1. CARTBOX
  /* ----------------------------------------------------------- */

     jQuery(".aa-cartbox").hover(function(){
      jQuery(this).find(".aa-cartbox-summary").fadeIn(500);
    }
      ,function(){
          jQuery(this).find(".aa-cartbox-summary").fadeOut(500);
      }
     );

  /* ----------------------------------------------------------- */
  /*  2. TOOLTIP
  /* ----------------------------------------------------------- */
    jQuery('[data-toggle="tooltip"]').tooltip();
    jQuery('[data-toggle2="tooltip"]').tooltip();

  /* ----------------------------------------------------------- */
  /*  3. PRODUCT VIEW SLIDER
  /* ----------------------------------------------------------- */

    jQuery('#demo-1 .simpleLens-thumbnails-container img').simpleGallery({
        loading_image: 'demo/images/loading.gif'
    });

    jQuery('#demo-1 .simpleLens-big-image').simpleLens({
        loading_image: 'demo/images/loading.gif'
    });

  /* ----------------------------------------------------------- */
  /*  4. POPULAR PRODUCT SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */

    jQuery('.aa-popular-slider').slick({
      dots: false,
      infinite: false,
      speed: 300,
      slidesToShow: 4,
      slidesToScroll: 4,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    });


  /* ----------------------------------------------------------- */
  /*  5. FEATURED PRODUCT SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */

    jQuery('.aa-featured-slider').slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
              infinite: true,
              dots: true
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
          // You can unslick at a given breakpoint now by adding:
          // settings: "unslick"
          // instead of a settings object
        ]
    });

  /* ----------------------------------------------------------- */
  /*  6. LATEST PRODUCT SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */
    jQuery('.aa-latest-slider').slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
              infinite: true,
              dots: true
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
          // You can unslick at a given breakpoint now by adding:
          // settings: "unslick"
          // instead of a settings object
        ]
    });

  /* ----------------------------------------------------------- */
  /*  7. TESTIMONIAL SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */

    jQuery('.aa-testimonial-slider').slick({
      dots: true,
      infinite: true,
      arrows: false,
      speed: 300,
      slidesToShow: 1,
      adaptiveHeight: true
    });

  /* ----------------------------------------------------------- */
  /*  8. CLIENT BRAND SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */

    jQuery('.aa-client-brand-slider').slick({
        dots: false,
        infinite: false,
        speed: 300,
        autoplay: true,
        autoplaySpeed: 2000,
        slidesToShow: 5,
        slidesToScroll: 1,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 4,
              slidesToScroll: 4,
              infinite: true,
              dots: true
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
          // You can unslick at a given breakpoint now by adding:
          // settings: "unslick"
          // instead of a settings object
        ]
    });

  /* ----------------------------------------------------------- */
  /*  9. PRICE SLIDER  (noUiSlider SLIDER)
  /* ----------------------------------------------------------- */

    jQuery(function(){
      if($('body').is('.productPage')){
       var skipSlider = document.getElementById('skipstep');
       var price_lower = jQuery("#price_filter_lower").val();
       var price_upper = jQuery("#price_filter_upper").val();
       if(price_lower == '' || price_upper == ''){
         var price_lower = 300;
         var price_upper = 1100;
       }
        noUiSlider.create(skipSlider, {
            range: {
                'min': 0,
                '10%': 100,
                '20%': 300,
                '30%': 500,
                '40%': 700,
                '50%': 900,
                '60%': 1100,
                '70%': 1300,
                '80%': 1500,
                '90%': 1700,
                'max': 1900
            },
            snap: true,
            connect: true,
            start: [price_lower, price_upper]
        });
        // for value print
        var skipValues = [
          document.getElementById('skip-value-lower'),
          document.getElementById('skip-value-upper')
        ];

        skipSlider.noUiSlider.on('update', function( values, handle ) {
          skipValues[handle].innerHTML = values[handle];
        });
      }
    });



  /* ----------------------------------------------------------- */
  /*  10. SCROLL TOP BUTTON
  /* ----------------------------------------------------------- */

  //Check to see if the window is top if not then display button

    jQuery(window).scroll(function(){
      if ($(this).scrollTop() > 300) {
        $('.scrollToTop').fadeIn();
      } else {
        $('.scrollToTop').fadeOut();
      }
    });

    //Click event to scroll to top

    jQuery('.scrollToTop').click(function(){
      $('html, body').animate({scrollTop : 0},800);
      return false;
    });

  /* ----------------------------------------------------------- */
  /*  11. PRELOADER
  /* ----------------------------------------------------------- */

    jQuery(window).load(function() { // makes sure the whole site is loaded
      jQuery('#wpf-loader-two').delay(200).fadeOut('slow'); // will fade out
    })

  /* ----------------------------------------------------------- */
  /*  12. GRID AND LIST LAYOUT CHANGER
  /* ----------------------------------------------------------- */

  jQuery("#list-catg").click(function(e){
    e.preventDefault(e);
    jQuery(".aa-product-catg").addClass("list");
  });
  jQuery("#grid-catg").click(function(e){
    e.preventDefault(e);
    jQuery(".aa-product-catg").removeClass("list");
  });


  /* ----------------------------------------------------------- */
  /*  13. RELATED ITEM SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */

    jQuery('.aa-related-item-slider').slick({
      dots: false,
      infinite: false,
      speed: 300,
      slidesToShow: 4,
      slidesToScroll: 4,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    });

});

function show_color_image(im,color){
  jQuery("#color_id").val(color);
  jQuery('.simpleLens-container').html('<div class="simpleLens-big-image-container"><a data-lens-image="'+im+'" class="simpleLens-lens-image"><img src="'+im+'" class="simpleLens-big-image"></a></div>');


}
function show_product(size){
  jQuery("#size_id").val(size);
  jQuery(".pro_size").css('border','1px solid #ddd');
  jQuery(".pro_size_"+size).css('border','1px solid black');
  jQuery(".hide_color").hide();
  jQuery(".size_"+size).show();
}
function add_to_cart(id,size_str_id,color_str_id){
  jQuery(".addToCartMsg").html('');
  var size = jQuery("#size_id").val();
  var color = jQuery("#color_id").val();
  if(size ==''){
    jQuery(".addToCartMsg").html('<div class="alert alert-danger" role="alert">Please select size</div>');
  }else if(color ==''){
    jQuery(".addToCartMsg").html('<div class="alert alert-danger" role="alert">Please select color</div>');
  }else{
    jQuery("#pro_qty").val(jQuery("#qty").val());
    jQuery("#product_id").val(id);
    jQuery.ajax({
      url : "/addtocart",
      type : "POST",
      data : jQuery("#addTocartFrm").serialize(),
      success : function(result){
        alert(result.msg);
        var totalPrice = 0;
        $(".aa-cart-notify").html(result.totalCartItem);
        if(result.totalCartItem > 0){
          var html= '<div class="aa-cartbox-summary"><ul>';
          $.each(result.data, function( key, value ) {
            totalPrice = parseInt(totalPrice) + (parseInt(value.qty) * parseInt(value.price));
              html+= '<li><a class="aa-cartbox-img" href="'+value.slug+'"><img src="'+IMAGE_PATH+'/'+value.attr_image+'" alt=""></a><div class="aa-cartbox-info"><h4><a href="'+value.slug+'">'+value.name+'</a></h4><p>'+value.qty+' x '+value.price+' Tk.</p></div></li>';
            });
          html+='<li><span class="aa-cartbox-total-title">Total</span><span class="aa-cartbox-total-price">'+totalPrice+' Tk.</span></li></ul><a class="aa-cartbox-checkout aa-primary-btn" href="'+WEB_PATH+'/mycart'+'">Cart</a></div>';
          $(".test").html(html);
        }
      }
    });
  }
}

function updateQty(pid,paid,size,color,price){
  jQuery("#size_id").val(size);
  jQuery("#color_id").val(color);
  var s = jQuery("#qty"+paid).val();
  if(s < 1){
    deleteCart(pid,paid,size,color);
  }else{
    jQuery("#qty").val(s);
    jQuery("#product_id").val(pid);
    add_to_cart(pid,size,color);
    jQuery("#total_price"+paid).html(s*price+' Tk.');
  }
}

function deleteCart(pid,paid,size,color){
  jQuery("#size_id").val(size);
  jQuery("#color_id").val(color);
  jQuery("#pro_qty").val(0);
  jQuery("#product_id").val(pid);
  add_to_cart(pid,size,color);
  window.location.href = window.location.href;
}

function sort_by(){
  var sort = jQuery("#sort_by_value").val();
  jQuery("#sort_value").val(sort);
  jQuery("#sortFrm").submit();
}

function price_filter(){
  jQuery("#price_filter_lower").val(jQuery("#skip-value-lower").html());
  jQuery("#price_filter_upper").val(jQuery("#skip-value-upper").html());
  jQuery("#sortFrm").submit();
}

function color_filter(colorID,type){
  var color_str = jQuery("#color_filter").val();
  if(type == 1){
    var new_str = color_str.replace(colorID+":"," ");
    jQuery("#color_filter").val(new_str);

  }else{
    jQuery("#color_filter").val(colorID+":"+color_str);
  }
  jQuery("#sortFrm").submit();
}

function searchItem(){
   var search_item = jQuery("#search_item").val();
   if(search_item.length > 2){
     window.location.href = "/search/"+search_item;
   }
}

jQuery("#regFrm").submit(function(e){
  e.preventDefault();
  jQuery(".err_field").html("");
  jQuery.ajax({
    url : "/registration_form",
    type : "POST",
    data : jQuery("#regFrm").serialize(),
    success : function(result){
      if(result.status == 'error'){
        jQuery.each(result.errors,function(key,val){
          jQuery("#"+key+"_error").html(val);
        })
      }
      if(result.status == 'success'){
        alert(result.msg);
        jQuery("#regFrm")[0].reset();
      }
    }
  });
});

jQuery("#loginFrm").submit(function(e){
  e.preventDefault();
  jQuery(".login_msg").html("");
  jQuery.ajax({
    url : "/user_login_form",
    type : "POST",
    data : jQuery("#loginFrm").serialize(),
    success : function(result){
      if(result.status == 'error_email'){
        jQuery("#email_err").html(result.msg);
      }
      if(result.status == 'error_pwd'){
        jQuery("#pwd_err").html(result.msg);
      }
      if(result.status == 'success'){
        window.location.href = "/";
      }
    }
  });
});

function apply_coupon_code(){
  jQuery("#coupon_msg").html("");
  var coupon_Code = jQuery("#coupon_Code").val();
  if(coupon_Code == ""){
    jQuery("#coupon_msg").html("Please enter a coupon code");
  }else{
    jQuery.ajax({
      url : "/apply_coupon",
      type : "post",
      data : "coupon_code="+coupon_Code+"&_token="+jQuery("[name='_token']").val(),
      success:function(result){
        jQuery("#coupon_msg").html(result.msg);
        jQuery("#coupon_row").removeClass('hide');
        jQuery("#coupon_name").html("<b>"+coupon_Code+"</b>");
        jQuery("#final_total").html(result.totalPrice+"/-");

      }
    });
  }
}

jQuery("#orderFrm").submit(function(e){
  e.preventDefault();
  jQuery.ajax({
    url : "/order_form",
    type : "POST",
    data : jQuery("#orderFrm").serialize(),
    success : function(result){
      jQuery("#order_msg").html("Please Wait....");
      if(result.status == "success"){
        window.location.href="/order_placed";
      }
      jQuery("#order_msg").html(result.msg);

    }
  });
});

jQuery("#frmReview").submit(function(e){
  e.preventDefault();
  jQuery.ajax({
    url : "/product_review",
    type : "POST",
    data : jQuery("#frmReview").serialize(),
    success : function(result){
      if(result.status == "success"){
        jQuery(".review_msg").html(result.msg);
         setInterval(function(){
           window.location.href = window.location.href;
         },3000);
      }
      if(result.status == "error"){
        jQuery(".review_msg").html(result.msg);
      }
    }
  });
});
