<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function get_register(){
        return view("auth.register");
    }

    public function post_register(Request $request){
        $request->validate([
            "username" => "bail|required|min:2|max:255",
            "email" => "bail|required|email:rfc,dns|unique:users|max:255",
            "password" => "bail|required|same:repassword|min:5|max:255"
        ]);

        $user = new User();

        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect("/login")
                ->with("alert_status", "success")
                ->with("alert_message", "Register successfull");
    }

    public function get_login(){
        return view("auth.login");
    }

    public function post_login(Request $request){
        $request->validate([
            "email" => "bail|required|email:rfc,dns|max:255",
            "password" => "bail|required|min:5|max:255"
        ]);

        $user = $request->only("email", "password");

        if(Auth::attempt($user)){
            return redirect("/home")
                    ->with("alert_status", "success")
                    ->with("alert_message", "Login successfull");
        }

        return redirect("/home")
                    ->with("alert_status", "danger")
                    ->with("alert_message", "Login details are not valid");
    }

    public function logout(){
        Auth::logout();

        return redirect("/login")
                ->with("alert_status", "success")
                ->with("alert_message", "Logout successfull");
    }
}
