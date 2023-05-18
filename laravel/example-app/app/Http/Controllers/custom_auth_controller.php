<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class custom_auth_controller extends Controller
{
    public function login(){
        return view("auth.login");
    }
    public function registration(){
        return view("auth.registration");
    }
    public function register_user(Request $request){
        echo "Hello posted";
    }

}
