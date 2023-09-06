<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function logout(){

        auth()->logout();
        return redirect("/");
    }
    public function login(Request $request){

        $loginDetails = $request->validate([
            "email" => "required",
            "password" => "required"
        ]);
        return "Password" . $loginDetails["password"];
    }
    public function register(Request $request) {

        $incomingFields = $request->validate([
            "name" => ["required", Rule::unique("users", "name")],
            "email" => ["required", "email", Rule::unique("users", "email")],
            "password" => "required"
        ]);
        
        $incomingFields["password"] = bcrypt($incomingFields["password"]);

        $user = User::create($incomingFields);
        
        auth()->login($user);
        // // Add user to database
        return redirect("/");
    }
}
