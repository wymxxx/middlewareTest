<?php

namespace App\Http\Middleware;

use Closure;

class TestMiddleware
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
        if($request->input('username') == 'NickLee'){
            return redirect()->route('welcome');
        }
        return $next($request);
    }

    public function terminate($request, $response){
        //session()->flush();
        session()->put('admin_username', $request->username);
        session()->put('test_value', 'This is '.$request->url());
        var_dump(session()->all());
        echo "<script language=javascript>alert('This is after response logic!');</script>";
    }
}
