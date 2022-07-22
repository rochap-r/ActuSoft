<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckPermission
{

    public function handle(Request $request, Closure $next)
    {
       $routeActuel=$request->route()->getName();
       $listRoutes=auth()->user()->role->permissions->toArray();

       foreach ($listRoutes as $route){
           if ($route['name']===$routeActuel)
               return $next($request);
       }
       abort(403,'Accès interdit | non Authorisé!');
    }
}
