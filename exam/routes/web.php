<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/password/reset/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [ForgotPasswordController::class, 'reset'])->name('password.update');


Auth::routes();  // This enables default Laravel authentication routes


Route::middleware(['auth'])->group(function () {
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');  // Show tasks
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store'); // Store task
    Route::patch('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update'); // Update task
});

Route::resource('users', UserController::class);

Route::get('/', function () {
    return view('welcome'); //welcome.blade.php
   });
   Route::get('/multable', function () {
    $j = 6;
 return view('multable', compact('j')); 
     //multable.blade.php
   });
   Route::get('/even', function () {
    return view('even'); //even.blade.php
   });
   Route::get('/prime', function () {
    return view('prime'); //prime.blade.php
   });

   Route::get('/minitest', function(){
    $bill=[
        ['item'=>'jam','quantity'=>5,'price'=>12.50],
        ['item'=>'tea','quantity'=>15,'price'=>12.50],
        ['item'=>'banana','quantity'=>22,'price'=>12.50],
        ['item'=>'rice','quantity'=>50,'price'=>12.50],
    ];
    return view('minitest',compact('bill'));
    
});
Route::get('/transcript', function(){
    $student=[
        'name'=>'Lojain',
        'id'=>'1112',
        'departement'=>'',
        'Gpa'=>'3',
        'courses'=>[

        ['code'=>'CS101','name'=>'object oriented programming','grade'=>'A'],
        ['code'=>'CS101','name'=>'object oriented programming','grade'=>'A'],
        ['code'=>'CS101','name'=>'object oriented programming','grade'=>'A'],
        ['code'=>'CS101','name'=>'object oriented programming','grade'=>'A'],
    ]];







 return view('transcript',compact('student'));
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
