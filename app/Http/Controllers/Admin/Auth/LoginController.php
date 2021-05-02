<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\Models\AdminModel;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $guard='adminMid';
    protected $redirectTo='admin/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function guard(){
        return auth()->guard('adminMid');
    }

    public function loginForm(){
        if(auth()->guard('adminMid')->user()){
            return back();
        }
        return view('v_login');
    }

    public function login(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required',
        ]);

        if(auth()->guard('adminMid')->attempt(['email'=>$request->email, 'password'=>$request->password]))
        {
            //$admin=auth()->guard('adminMid')->user();
            \Session::put('success','Anda berhasil login');
            return redirect()->route('admin.a_home');
        } else {
            return back()->with('error', 'email atau password salah');
        }
    }

    public function logout(Request $request)
    {
        auth()->guard('adminMid')->logout();
        \Session::flush();
        \Session::put('success','Terima kasih');
        return redirect(url('v_login'));
    }
}
