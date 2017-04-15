@extends('layouts.app')

@section('content')
<section class="login burger">
    <p class="brand tmarg">Imenso</p>
    <p class="text-center">Administrator</p>
       
            <div class="panel panel-default">
               
                <div class="panel-body">
                    <form role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="control-label">E-Mail</label>                          
                                <input id="email" type="email" class="inpt" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                           
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="control-label">Password</label>                            
                                <input id="password" type="password" class="inpt" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                          
                        </div>                      
                          
                      <div class="checkbox">
                             <label>
                                  <input type="checkbox" name="remember"><span class="cr"><i class="cr-icon fa fa-check"></i></span>Remember Me
                             </label>
                         </div>                           
                       

                        <div class="text-center">                          
                                <button type="submit" class="btn-dark">
                                    Login
                                </button>
                                <p><a class="btn btn-link" href="{{ url('/password/reset') }}">
                                    Forgot Your Password?
                                </a> </p>                        
                        </div>
                    </form>
                </div>
            </div>
      
    
</section>

@endsection
