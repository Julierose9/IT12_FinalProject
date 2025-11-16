<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the employees.
     */
    public function index()
    {
        // Sample data - following the same pattern as your other controllers
        $employees = [
            (object)[
                'EmpID' => 'EMP-001',
                'EmpFName' => 'Maria',
                'EmpLName' => 'Santos',
                'EmpMMame' => 'R',
                'EmpContactNum' => '+63 912 345 6789',
                'EmpEmail' => 'maria.santos@dorasoshopee.com',
                'Role' => 'Admin',
                'Status' => 'Active',
                'created_at' => now()->subMonths(6)
            ],
            (object)[
                'EmpID' => 'EMP-002',
                'EmpFName' => 'John',
                'EmpLName' => 'Dela Cruz',
                'EmpMMame' => 'M',
                'EmpContactNum' => '+63 917 654 3210',
                'EmpEmail' => 'john.delacruz@dorasoshopee.com',
                'Role' => 'Cashier',
                'Status' => 'Active',
                'created_at' => now()->subMonths(3)
            ],
            (object)[
                'EmpID' => 'EMP-003',
                'EmpFName' => 'Ana',
                'EmpLName' => 'Reyes',
                'EmpMMame' => 'S',
                'EmpContactNum' => '+63 918 765 4321',
                'EmpEmail' => 'ana.reyes@dorasoshopee.com',
                'Role' => 'Cashier',
                'Status' => 'Active',
                'created_at' => now()->subMonths(2)
            ],
            (object)[
                'EmpID' => 'EMP-004',
                'EmpFName' => 'Carlos',
                'EmpLName' => 'Gonzales',
                'EmpMMame' => 'T',
                'EmpContactNum' => '+63 919 876 5432',
                'EmpEmail' => 'carlos.gonzales@dorasoshopee.com',
                'Role' => 'Manager',
                'Status' => 'On Leave',
                'created_at' => now()->subMonths(8)
            ],
            (object)[
                'EmpID' => 'EMP-005',
                'EmpFName' => 'Liza',
                'EmpLName' => 'Tan',
                'EmpMMame' => 'C',
                'EmpContactNum' => '+63 920 987 6543',
                'EmpEmail' => 'liza.tan@dorasoshopee.com',
                'Role' => 'Cashier',
                'Status' => 'Inactive',
                'created_at' => now()->subMonths(12)
            ],
        ];

        // Sample statistics
        $totalEmployees = count($employees);
        $activeEmployees = 3;
        $cashierCount = 3;
        $onLeaveCount = 1;

        return view('admin.employees.index', compact(
            'employees',
            'totalEmployees',
            'activeEmployees',
            'cashierCount',
            'onLeaveCount'
        ));
    }

    /**
     * Show the form for creating a new employee.
     */
    public function create()
    {
        return view('admin.employees.create');
    }

    /**
     * Store a newly created employee in storage.
     */
    public function store(Request $request)
    {
        // Simple validation
        $request->validate([
            'EmpID' => 'required|string|unique:employees,EmpID',
            'EmpFName' => 'required|string|max:255',
            'EmpLName' => 'required|string|max:255',
            'EmpMMame' => 'nullable|string|max:1',
            'EmpContactNum' => 'required|string|max:20',
            'EmpEmail' => 'required|email|unique:employees,EmpEmail',
            'Role' => 'required|string',
            'Status' => 'required|string',
            'HireDate' => 'required|date',
        ]);

        // For now, just redirect back with success
        return redirect()->route('admin.employees.index')
            ->with('success', 'Employee created successfully!');
    }
}