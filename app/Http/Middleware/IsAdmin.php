<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // check --> check xem user đã đăng nhập chưa
        // user() --> lấyấy thông tin của user đăng nhậpnhập
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request); // Cho phép tiếp tục xử lý request
        }

        // Nếu không phải admin, chuyển hướng về trang lỗi hoặc từ chối truy cập
        return redirect('/login')->with('error', 'Bạn không có quyền truy cập vào trang này.');
    }
}
