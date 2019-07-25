<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class SessionsController extends Controller
{
    //
    public function create(){
        return view('sessions/create');
    }

    public function store(Request $request){
        $login_data = $this->validate($request,array(
            'email' => 'required|email',
            'password' => 'required'
        ));
        if(Auth::attempt($login_data,$request->has('remember'))){
            session()->flash('success','欢迎回来');
            return redirect()->route('users.show',array(Auth::user()));
        }else{
            session()->flash('danger','很抱歉，您的邮箱和密码不匹配');
            return redirect()->back()->withInput();
        }
    }

    public function destroy(){
        Auth::logout();
        session()->flash('success', '您已成功退出！');
        return redirect('login');
    }
}
