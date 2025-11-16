<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    /**
     * Display a listing of the accounts.
     */
    public function index()
    {
        // Sample data - following the same pattern as your other controllers
        $accounts = [
            (object)[
                'AccountID' => 'ACC-001',
                'Username' => 'admin.maria',
                'Email' => 'maria.santos@dorasoshopee.com',
                'Role' => 'Admin',
                'Status' => 'Active',
                'LastLogin' => now()->subHours(2),
                'employee' => (object)[
                    'EmpID' => 'EMP-001',
                    'EmpFName' => 'Maria',
                    'EmpLName' => 'Santos'
                ]
            ],
            (object)[
                'AccountID' => 'ACC-002',
                'Username' => 'cashier.john',
                'Email' => 'john.delacruz@dorasoshopee.com',
                'Role' => 'Cashier',
                'Status' => 'Active',
                'LastLogin' => now()->subDays(1),
                'employee' => (object)[
                    'EmpID' => 'EMP-002',
                    'EmpFName' => 'John',
                    'EmpLName' => 'Dela Cruz'
                ]
            ],
            (object)[
                'AccountID' => 'ACC-003',
                'Username' => 'cashier.ana',
                'Email' => 'ana.reyes@dorasoshopee.com',
                'Role' => 'Cashier',
                'Status' => 'Active',
                'LastLogin' => now()->subDays(3),
                'employee' => (object)[
                    'EmpID' => 'EMP-003',
                    'EmpFName' => 'Ana',
                    'EmpLName' => 'Reyes'
                ]
            ],
            (object)[
                'AccountID' => 'ACC-004',
                'Username' => 'manager.carlos',
                'Email' => 'carlos.gonzales@dorasoshopee.com',
                'Role' => 'Manager',
                'Status' => 'Suspended',
                'LastLogin' => now()->subWeeks(2),
                'employee' => (object)[
                    'EmpID' => 'EMP-004',
                    'EmpFName' => 'Carlos',
                    'EmpLName' => 'Gonzales'
                ]
            ],
            (object)[
                'AccountID' => 'ACC-005',
                'Username' => 'cashier.liza',
                'Email' => 'liza.tan@dorasoshopee.com',
                'Role' => 'Cashier',
                'Status' => 'Inactive',
                'LastLogin' => now()->subMonths(2),
                'employee' => (object)[
                    'EmpID' => 'EMP-005',
                    'EmpFName' => 'Liza',
                    'EmpLName' => 'Tan'
                ]
            ],
        ];

        // Sample statistics
        $totalAccounts = count($accounts);
        $activeAccounts = 3;
        $adminAccounts = 1;
        $suspendedAccounts = 1;

        return view('admin.accounts.index', compact(
            'accounts',
            'totalAccounts',
            'activeAccounts',
            'adminAccounts',
            'suspendedAccounts'
        ));
    }

    /**
     * Show the form for creating a new account.
     */
    public function create()
    {
        return view('admin.accounts.create');
    }

    /**
     * Store a newly created account in storage.
     */
    public function store(Request $request)
    {
        // Simple validation
        $request->validate([
            'AccountID' => 'required|string|unique:accounts,AccountID',
            'EmpID' => 'required|string|exists:employees,EmpID',
            'Username' => 'required|string|max:255|unique:accounts,Username',
            'Email' => 'required|email|unique:accounts,Email',
            'Password' => 'required|string|min:8|confirmed',
            'Role' => 'required|string',
            'Status' => 'required|string',
        ]);

        // For now, just redirect back with success
        return redirect()->route('admin.accounts.index')
            ->with('success', 'Account created successfully!');
    }

    /**
     * Reset password for an account.
     */
    public function resetPassword(Request $request, $id)
    {
        $request->validate([
            'NewPassword' => 'required|string|min:8|confirmed',
        ]);

        // Password reset logic would go here

        return redirect()->route('admin.accounts.index')
            ->with('success', 'Password reset successfully!');
    }
}