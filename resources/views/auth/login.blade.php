<!DOCTYPE html>
<html>
<head>
  <title>login from</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <link rel="stylesheet" href="{{ url('/css/style.css') }}">   
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <script type="text/javascript" src="{{ url('/js/jquery.validate.js') }}"></script>
</head>
<body>
  <section id="login" class="">
    <div class="container-fluid form_hero">
      <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
          <div class="custm_form">
            <div class="custm_form_inner">
              <div class="form_header text-center">
                <div class="form_logo_wrp"><img src="images/octb_logo2.png" alt="logo"></div>
                <p class="text-uppercase">sign in</p>
              </div>
              <form  method="POST" id="login-form" action="{{ url('/login') }}">
                @if ($errors->has('email'))
                                    <span class="help-block">
                                       <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                <div class="form-group">
                  
                  <input class="form-control" id="" placeholder="What is your email?" name="email" value="" required aria-required="true" type="email">
                </div>
                 @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                <div class="form-group">
                  
                  <input class="form-control" id="inputPassword" placeholder="What is your password?" name="password" required aria-required="true" type="password">
                </div>
                <!--<p class="text-right"><a href="">Forgot password?</a></p>

                <div class="checkbox">
                  <label>
                    <input value="" type="checkbox">
                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                    Remember me
                  </label>
                </div>-->
                <div class="text-center">
                  <button href="" type="submit" class="">Login</button>
                </div>
              </form>
            </div>  
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="container cookie_wrp" style="display:none">
    <div class="row">
      <div class="col-lg-12">
        <div class="cookie_inner">
          <p class="marg_0" >This website uses cookies to enhance your experience. By logging in, you fully consent to Overcome The Barrier, Inc storing a cookie on your device to identify you uniquely as you navigate our website.</p>
        <button class="btn">OK  </button>
        </div>
      </div>
    </div>
  </div>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
<script type="text/javascript">
  $(document).ready(function(){
  $("#login-form").validate();
</script>
</body>
</html>