@extends('front.layout')

@section('title','Register Now!!')

@section('content')

<section id="aa-myaccount">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="aa-myaccount-area">
            <div class="row">
              <div class="col-md-8">
                <div class="aa-myaccount-register">
                 <h4>Register</h4>
                 <form action="" class="aa-login-form" id="regFrm">

                    <label for="">Username<span>*</span></label>
                    <input type="text" placeholder="Username" name="username" >
                    <div id="username_error"  class="err_field"></div>

                    <label for="">Email<span>*</span></label>
                    <input type="email" placeholder="Email" name="email" >
                    <div id="email_error"  class="err_field"></div>

                    <label for="">Mobile<span>*</span></label>
                    <input type="text" placeholder="Mobile" name="mobile" >
                    <div id="mobile_error"  class="err_field"></div>

                    <label for="">Password<span>*</span></label>
                    <input type="password" placeholder="Password" name="password" >
                    <div id="password_error"  class="err_field"></div>

                    <button type="submit" class="aa-browse-btn" id="regBtn">Register</button>
                    @csrf
                  </form>
                </div>
              </div>
            </div>
         </div>
       </div>
     </div>
   </div>
 </section>


@endsection
