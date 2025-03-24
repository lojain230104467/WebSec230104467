<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\{
    UserController, ProductController, ExamController, QuestionController, 
    ProfileController, AdminController, PurchaseController, HomeController
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Public Routes
Route::get('/', function () {
    return view('welcome');
});

Route::get('/calculator', function () {
    return view('calculator');
});

Route::get('/multable', function () {
    $j = 6;
    return view('multable', compact('j'));
});

Route::get('/even', function () {
    return view('even');
});

Route::get('/prime', function () {
    return view('prime');
});

Route::get('/minitest', function(){
    $bill = [
        ['item' => 'jam', 'quantity' => 5, 'price' => 12.50],
        ['item' => 'tea', 'quantity' => 15, 'price' => 12.50],
        ['item' => 'banana', 'quantity' => 22, 'price' => 12.50],
        ['item' => 'rice', 'quantity' => 50, 'price' => 12.50],
    ];
    return view('minitest', compact('bill'));
});

Route::get('/transcript', function(){
    $student = [
        'name' => 'Lojain',
        'id' => '1112',
        'department' => '',
        'Gpa' => '3',
        'courses' => [
            ['code' => 'CS101', 'name' => 'Object Oriented Programming', 'grade' => 'A'],
            ['code' => 'CS102', 'name' => 'Data Structures', 'grade' => 'A'],
            ['code' => 'CS103', 'name' => 'Database Systems', 'grade' => 'A'],
            ['code' => 'CS104', 'name' => 'Computer Networks', 'grade' => 'A'],
        ],
    ];
    return view('transcript', compact('student'));
});

// Authentication Routes
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Routes requiring authentication
Route::middleware(['auth'])->group(function () {

    // Profile Routes
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
        Route::post('/update-password', [ProfileController::class, 'updatePassword'])->name('profile.update-password');
    });

    // Product Routes
    Route::prefix('products')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('products.index');
        Route::get('/{product}', [ProductController::class, 'show'])->name('products.show');
        Route::post('/buy/{product}', [PurchaseController::class, 'buy'])->middleware('role:Customer');
    });

    // Admin Routes
    Route::middleware(['role:Admin'])->group(function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
        Route::resource('products', ProductController::class)->except(['show']);
        Route::resource('users', UserController::class);
    });

    // Exam Routes
    Route::prefix('exam')->group(function () {
        Route::get('/start', [ExamController::class, 'start'])->name('exam.start');
        Route::post('/submit', [ExamController::class, 'submitExam'])->name('exam.submit');
    });

    // Question Routes
    Route::prefix('questions')->group(function () {
        Route::get('/', [QuestionController::class, 'index'])->name('questions.index');
        Route::get('/create', [QuestionController::class, 'create'])->name('questions.create');
        Route::post('/', [QuestionController::class, 'store'])->name('questions.store');
        Route::get('/{id}/edit', [QuestionController::class, 'edit'])->name('questions.edit');
        Route::put('/{question}', [QuestionController::class, 'update'])->name('questions.update');
        Route::delete('/{id}', [QuestionController::class, 'destroy'])->name('questions.destroy');
    });

});
