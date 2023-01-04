<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class jabatan
{

    // public function handle(Request $request, Closure $next)
    // {
    //     $jabatan = array_slice(func_get_args(), 2);

    //     foreach ($jabatan as $jabatan) { 
    //         $user = \Auth::user()->jabatan;
    //         if( $user == $jabatan){
    //             return $next($request);
    //         }
    //     }
    
    //     return redirect('/home');
    // }
}
