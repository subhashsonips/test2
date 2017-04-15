<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
              $url = $request->segment(2);

              if(Auth::user()->status==0)
              {
                    return redirect('/'.Auth::user()->user_org.'/'."logout");

              }

                if (Auth::user()->type=='mother' && $url=="") {
                   
                    return redirect('/'.Auth::user()->user_org.'/'."dashboard");
                } 
                else if(Auth::user()->type=='rm' && $url=="")
                {
                    $User=User::find(Auth::user()->parent_id);
                   return redirect('/'.$User->user_org.'/'."dashboard");
                }
                 else if(Auth::user()->type=='ngo' && $url=="")
                {
                    $User=User::find(22);
                   return redirect('/'.$User->user_org.'/'."dashboard");
                }
                 else if(Auth::user()->type=='project_manager' && $url=="")
                {
                    $User=User::find(Auth::user()->parent_id);
                   return redirect('/'.$User->user_org.'/'."dashboard");
                }
                  else if(Auth::user()->type=='project_member' && $url=="")
                {
                    $User=User::find(Auth::user()->parent_id);
                   return redirect('/'.$User->user_org.'/'."dashboard");
                }

        }

        return $next($request);
    }
}
