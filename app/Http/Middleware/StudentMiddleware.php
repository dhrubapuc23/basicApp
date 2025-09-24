<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;

class StudentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $Minage): Response
    {
        // $roles = DB::table('newusers')->where('email',$request->email)->value('role');
        // if($roles === 1)
        // {
        //     return redirect()->route('student.show');
        // }
        //dd('route middleware');
        if($request->query('age') >= $Minage)
        {
            return $next($request);
        }
        return response("You are not allowed to access this page.");
        
        //abort(403);
        
    }
}
