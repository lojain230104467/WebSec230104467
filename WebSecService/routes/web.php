<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;

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

