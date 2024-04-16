<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRoleAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        {
            $user=Auth::user();//используем фасад Auth берем функцию user
            if($user->role_admin === 0){ // если у польователя нет роли админа редиректим и выводим сообщение
             session()->flash('success','Приветсвуем вас'.' '.$user->name.'!');
             return to_route('basket-place');//редирект на главную


            }

         return $next($request);
     }
    }
}
