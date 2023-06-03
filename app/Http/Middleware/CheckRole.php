<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class CheckRole
{
    public function handle($request, Closure $next, $role)
    {
        // Kiểm tra đăng nhập mới được phép truy cập trang
        if (!Auth::check()) {
            return redirect('/login')->with('info', 'Trang yêu cầu phải đăng nhập mới được sử dụng!');
        }
        // Kiểm tra quyền
        if ($request->user()->hasAnyRole($role)) {
            return $next($request);
        }
        // Trường hợp chưa đăng nhập
        else {
            return redirect()->back()->with('error', 'Bạn không đủ quền để sử dụng trang này');
        }
    }
}
