<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function store(Request $request)
    {
        if (!auth()->user()->hasRole('Admin')) {
            abort(403, 'Unauthorized');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $employee = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'credit' => 0.00, // Added for consistency with users table
        ]);

        $employee->assignRole('Employee'); // Use Spatie to assign role

        return redirect()->back()->with('success', 'Employee added successfully.');
    }

    public function addCredit(Request $request)
    {
        if (!auth()->user()->hasPermissionTo('manage_customers')) {
            abort(401, 'Unauthorized');
        }

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'credit' => 'required|numeric|min:0.01',
        ]);

        $customer = User::find($request->user_id);
        if (!$customer->hasRole('Customer')) {
            return redirect()->back()->with('error', 'Invalid customer.');
        }

        $customer->credit += $request->credit;
        $customer->save();

        return redirect()->back()->with('success', 'Credit added to customer!');
    }

    public function listCustomers()
    {
        if (!auth()->user()->hasPermissionTo('manage_customers')) {
            abort(401, 'Unauthorized');
        }

        $customers = User::role('Customer')->get();
        return view('customers.index', compact('customers'));
    }
}