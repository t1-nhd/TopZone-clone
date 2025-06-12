<?php

namespace App\Http\Middleware;

use App\Models\Staff;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminCheckMiddleware
{
    public $staff_allowed_routes = [
        'products.edit',
        'products.store',
        'products.create',
        'products.delete',
        'product_images.store',
        'product_images.delete',
        'product_images.destroy',
        'product_types.destroy',
        'staffs.create',
        'staffs.store',
        'staffs.update',
        'customers.show',
    ];
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){
            if(Auth::user()->account_type == 2){
                return $next($request);
            } else {
                if(Auth::user()->account_type == 1){
                    if($request->routeIs($this->staff_allowed_routes)){
                        // dd(strpos($request->getRequestUri(), '/products/') !== false);
                        // dd($this->backToRouteIndex($request->getRequestUri()));
                        return redirect()->route($this->backToRouteIndex($request->getRequestUri()));
                    } else {
                        return $next($request);
                    }
                }
            }
            return redirect()->route('index');
        }
        return redirect()->route('login');
    }

    private function backToRouteIndex($url) {
        if (strpos($url, '/products/') !== false) {
            return 'products.index';
        } elseif (strpos($url, '/product_images/') !== false) {
            return 'product_images.index';
        } elseif (strpos($url, '/staffs/') !== false) {
            return 'staffs.index';
        } elseif (strpos($url, '/customers/') !== false) {
            return 'customers.index';
        }
        return 'index';
    }
}
