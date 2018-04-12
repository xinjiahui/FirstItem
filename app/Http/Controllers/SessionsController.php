<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;

class SessionsController extends Controller
{
   public function create()
    {
        return view('sessions.create');
    }
   public function store(Request $request)
    {
       $this->validate($request, [
           'email' => 'required|email|max:255',
           'password' => 'required'
       ]);
    $email = $request['email'];
    $passwd = $request['password']; ;
    if (Auth::attempt(['email' => $email, 'password' => $passwd],$request->has('remember'))) {
       session()->flash('success', '欢迎回来！');
          return redirect()->route('users.show', [Auth::user()]);
       } else {
           // 登录失败后的相关操作
         session()->flash('danger', '很抱歉，您的邮箱和密码不匹配');
          return redirect()->back();
       }

    }
    public function destroy()
    {
        Auth::logout();
        session()->flash('success', '您已成功退出！');
        return redirect('login');
    }
}