<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\UsersController;
use App\Http\Controllers\Web\ProductController;
use App\Http\Controllers\Web\EmployeeController;
use App\Models\Product;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Gate;

Route::get('/', function () {
    return view('welcome');
});

// Debug route
Route::get('/debug-permission', function() {
    if (!auth()->check()) {
        return "Not logged in";
    }
    $user = auth()->user();
    $output = [
        'user' => $user->name,
        'email' => $user->email,
        'roles' => $user->roles->pluck('name'),
        'permissions' => $user->getAllPermissions()->pluck('name'),
        'direct_permissions' => $user->permissions->pluck('name'),
        'all_roles' => Role::all()->pluck('name'),
        'all_permissions' => Permission::all()->pluck('name'),
    ];
    return response()->json($output);
});

Route::get('register', [UsersController::class, 'register'])->name('register');
Route::post('register', [UsersController::class, 'doRegister'])->name('do_register');
Route::get('login', [UsersController::class, 'login'])->name('login');
Route::post('login', [UsersController::class, 'doLogin'])->name('do_login');
Route::get('logout', [UsersController::class, 'doLogout'])->name('do_logout');

Route::middleware('auth')->group(function () {
    // User profile routes
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/{user?}', [UsersController::class, 'profile'])->name('view');
        Route::get('/edit/{user?}', [UsersController::class, 'edit'])->name('edit');
        Route::post('/save/{user}', [UsersController::class, 'save'])->name('save');
        Route::get('/password/{user?}', [UsersController::class, 'editPassword'])->name('edit_password');
        Route::post('/password/{user}', [UsersController::class, 'savePassword'])->name('save_password');
    });

    // Products routes
    Route::prefix('products')->name('products.')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::post('/', function(Request $request) {
            if (Gate::allows('add_products')) {
                return app(ProductController::class)->store($request);
            }
            abort(403);
        })->name('store');
        
        Route::get('/edit/{product?}', function(Request $request, $product = null) {
            if (Gate::allows('edit_products')) {
                return app(ProductController::class)->edit($request, $product);
            }
            abort(403);
        })->name('edit');
        
        Route::put('/{product}', function(Request $request, $product) {
            if (Gate::allows('edit_products')) {
                return app(ProductController::class)->update($request, $product);
            }
            abort(403);
        })->name('update');
        
        Route::delete('/{product}', function(Request $request, $product) {
            if (Gate::allows('delete_products')) {
                return app(ProductController::class)->destroy($product);
            }
            abort(403);
        })->name('destroy');
        
        Route::post('/{product}/buy', function(Request $request, Product $product) {
            if (auth()->user()->hasRole('Customer')) {
                return app(ProductController::class)->buy($request, $product);
            }
            abort(403);
        })->name('buy');
    });

    // Customer management routes
    Route::prefix('customers')->name('customers.')->group(function () {
        Route::get('/', function() {
            if (Gate::allows('manage_customers')) {
                return app(EmployeeController::class)->listCustomers();
            }
            abort(403);
        })->name('index');
        
        Route::post('/add-credit', function(Request $request) {
            if (Gate::allows('manage_customers')) {
                return app(EmployeeController::class)->addCredit($request);
            }
            abort(403);
        })->name('addCredit');
    });

    // Customer purchases routes
    Route::prefix('purchases')->name('purchases.')->group(function () {
        Route::get('/', function () {
            if (auth()->user()->hasRole('Customer')) {
                return view('purchases.index', ['purchases' => auth()->user()->purchases]);
            }
            abort(403);
        })->name('index');
    });

    // Employee management routes
    Route::prefix('employees')->name('employees.')->group(function () {
        Route::get('/add', function() {
            if (auth()->user()->hasRole('Admin')) {
                return app(UsersController::class)->addEmployee();
            }
            abort(403);
        })->name('add');
        
        Route::post('/', function(Request $request) {
            if (auth()->user()->hasRole('Admin')) {
                return app(UsersController::class)->storeEmployee($request);
            }
            abort(403);
        })->name('store');
    });

    // User management routes
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', function(Request $request) {
            if (Gate::allows('admin_users')) {
                return app(UsersController::class)->list($request);
            }
            abort(403);
        })->name('index');
        
        Route::get('/delete/{user}', function(Request $request, $user) {
            if (Gate::allows('admin_users')) {
                return app(UsersController::class)->delete($request, $user);
            }
            abort(403);
        })->name('delete');
    });
});