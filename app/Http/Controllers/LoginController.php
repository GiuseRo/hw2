<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller {

    public function login() {
        if(session('user_id') != null) {
            return redirect("home");
        }
        else {
            return view('login')->with('csrf_token', csrf_token());
        }
     }

     public function checkLogin(){
        $request = request();
       // $user = User::where('username', request('username'))->where('password', request('password'))->first();
       $user = User::where('username', request('username'))->first();
        if($user !== null && password_verify(request('password'),$user->password)) {
            Session::put('user_id', $user->id);
            return redirect('home');
        }
        else {
            return redirect('login')->withInput();
        }
     }

     public function logout() {
       Session::flush();
        return redirect('login');
    }
    }

    ?>