<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard(){
        return view("admin.dashboard");
    }

    public function login(){
        return view("admin.login");
    }
    public function login_submit(Request $request)
    {
        $request->validate([
        "email"=> "required| email",
        "password"=> "required"
        ]);
        $check =$request->all();
        $data = [
            "email" => $check["email"],
            "password" => $check["password"],
        ];
        if (Auth::guard("admin")->attempt($data)) {
            return redirect()->route("admin_dashboard")->with("success","Login Successful");
        } else {
        return redirect()->route("admin_login")->with("error","invalid credentials");
        }

    }

    public function logout()
    {
        Auth::guard("admin")->logout(); 
        return redirect()->route("admin_login")->with("success","logout Successfully");
    }
}
