@extends('layouts.admin')
@section('content')
    <section class="burger" id="home">
            <div class="container">            
              <div class="row">
                <div class="col-md-6">
                  <div class="banner mt5">
                     <div class="logo">
                       <h1> impactify</h1>
                       <p class="big-p mt3"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                       tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                       quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                       consequat.
                      </p>
                    </div>
                 </div>
                </div>
                <div class="col-md-6">
                 <h3>Login to impactify</h3>
                 <p>Site administrator</p>
                 @if (count($errors) > 0)
                   @foreach ($errors->all() as $error)
                      {{ $error }}
                   @endforeach
                 @endif    
                <div class="panel">
                    <div class="panel-body">    
                             <form lpformnum="1" role="form" method="POST" action="{{ url('/admin-login') }}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="">User</label>
                                    <input class="form-control" id="" placeholder="User" type="text" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input class="form-control" id="inputPassword" placeholder="Password" type="password" name="password">
                                </div>                                
                                <div class="checkbox">
                                  <label>
                                    <input value="" type="checkbox">
                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                   Remember me
                                  </label>
                               </div>
                               <div class="text-center mt3">
                                <button type="submit" class="btn-alpha">Login</button>
                                </div> 
                            </form>  
               </div>
             </div>
            </div>
        </section>
 @endsection