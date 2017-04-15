<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
      public function handle($request, Closure $next)
      {
         if(Auth::user()->status==0)
          {
            return redirect('/logout');
          }
          return $next($request);
      }
    
}
