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

   <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4>Login or Register</h4>
          <form class="aa-login-form" action="" id="loginFrm">
            <label for="">Email address<span>*</span></label>
            <input type="email" placeholder="Email" name="user_email"  required>
            <div id="email_err" class="login_msg"></div>
            <label for="">Password<span>*</span></label>
            <input type="password" placeholder="Password" name="user_password"  required>
            <div id="pwd_err" class="login_msg"></div>
            <button class="aa-browse-btn" type="submit" id="loginBtn">Login</button>
            @csrf
            <label for="rememberme" class="rememberme"><input type="checkbox" id="rememberme" Name="rememberme" > Remember me </label>
            <p class="aa-lost-password"><a href="#">Lost your password?</a></p>
          </form>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>

 </section>


@endsection
