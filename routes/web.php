<?php

use App\Http\Controllers\admin\AuthController as AdminAuthControlle;
use App\Http\Controllers\user\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});


// Admin routes
Route::prefix("admin")->name("admin.")->group(function(){
    Route::middleware(["guest:admin"])->group(function(){
       Route::view("/login","admin.login")->name("/"); 
       Route::post("/login",[AdminAuthControlle::class,"logIn"])->name("login"); 
       
      //  I disabled this route for testing purpose you can enabled it
      //  Route::view("/register","admin.register")->name("register"); 

      //  I disabled this route for testing purpose you can enabled it
      //  Route::post("/register",[AdminAuthControlle::class,"create"])->name("create"); 
    });
    Route::middleware(["auth:admin"])->group(function(){
       Route::view("/home","admin.dashboard.home")->name("home"); 
       Route::post("/logout",[AdminAuthControlle::class,"logout"])->name("logout"); 
    });
});

// User routes
Route::prefix("user")->name("user.")->group(function(){
    Route::middleware(["guest:web"])->group(function(){
       Route::view("/login","user.login")->name("index"); 
       Route::view("/register","user.register")->name("register"); 
       Route::post("/register",[AuthController::class,"create"])->name("create"); 
       Route::post("/login",[AuthController::class,"logIn"])->name("login"); 
    });
    Route::middleware(["auth:web"])->group(function(){
       Route::view("/home","user.dashboard.home")->name("home"); 
       Route::post("/logout",[AuthController::class,"logout"])->name("logout"); 
    });
});

