<?php

use App\Http\Controllers\UserController;
use App\Http\Middleware\CustomAuth;
use App\Http\Middleware\NonCustomAuth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
})->middleware(NonCustomAuth::class);

Route::get('/register', function () {
    return view('register');
})->middleware(NonCustomAuth::class);

Route::post("/register",[UserController::class,'register']);
Route::post("/login",[UserController::class,'login']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(CustomAuth::class);


Route::get('/logout', [UserController::class,'out'])->middleware(CustomAuth::class);
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/verifyPage', function(){
//     return view('verifyPage');
// });

Route::get('/var', [App\Http\Controllers\UserController::class, 'var']);
