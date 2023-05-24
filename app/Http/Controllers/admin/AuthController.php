<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        $db_response = Admin::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ]);
        if ($db_response) {
            return redirect()->back()->with("message", $request->name . " register successfully");
        }
        return redirect()->back()->with("message", "Something went wrong");
    }

    public function login(Request $request)
    {
        $request->validate([
            "email" => "required|email|exists:admins",
            "password" => "required",
        ],[
            "email.exists"=>"Email invalid"
        ]);
        $admin = Auth::guard('admin')->attempt([
            "email" => $request->email,
            "password" => $request->password
        ]);
        if ($admin) {
            return redirect()->route("admin.home");
        }
        return redirect()->back()->with("message", "Credentials invalid");
    }
    public function logout()
    {
        Auth::guard("admin")->logout();
        // dd("1");
        return redirect()->route("admin.login");
    }
}
