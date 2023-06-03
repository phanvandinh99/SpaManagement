<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLogin()
    {
        return view('auth/login');
    }

    public function postLogin(Request $request)
    {
        // Kiểm tra dữ liệu nhập vào
        $rules = [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ];
        $messages = [
            'email.required' => 'Email là trường bắt buộc',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Mật khẩu là trường bắt buộc',
            'password.min' => 'Mật khẩu phải chứa ít nhất 6 ký tự',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect('login')->withErrors($validator)->withInput();
        } else {
            $email = $request->input('email');
            $password = $request->input('password');

            if (Auth::attempt(['email' => $email, 'password' => $password])) {

                $user = auth()->user();

                if ($user->roles->pluck('name')->contains('USER')) {
                    return redirect('user/home')->with('success', 'Đăng Nhập Thành Công!');
                }
                if ($user->roles->pluck('name')->contains('ADMIN')) {
                    return redirect('admin/home')->with('success', 'Đăng Nhập Thành Công Trang Quản Trị!');
                }
            } else {
                Session::flash('error', 'Email hoặc mật khẩu không đúng!');
                return redirect('login');
            }
        }
    }
}
