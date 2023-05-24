<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            "name" => "required",
            "email" => "required|email",
            "password" => "required",
        ]);
        $db_response = null;
        $db_response = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ]);
        if ($db_response) {
            return redirect()->back()->with("message", $request->name . " register successfully");
        }
        return redirect()->back()->with("message", "Something went wrong");
    }

    public function logIn(Request $request)
    {
        $request->validate([
            "email" => "required|email|exists:users",
            "password" => "required",
        ],[
            "email"=>"Email is invalid"
        ]);
        $user = Auth::attempt([
            "email" => $request->email,
            "password" => $request->password
        ]);
        if ($user) {
            return redirect()->route("user.home");
        }
        return redirect()->back()->with("message", "Credentials invalid");
    }
    public function logout()
    {
        Auth::guard("web")->logout();
        return redirect()->route("user.login");
    }
}
