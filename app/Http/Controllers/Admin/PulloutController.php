<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PullOutController extends Controller
{
    /**
     * Display a listing of the pull out records.
     */
    public function index()
    {
        // Sample data - same pattern as stock-ins
        $pullOuts = [
            (object)[
                'PullOutID' => 'PULL-001',
                'Qty' => 5,
                'Reason' => 'Damaged during handling',
                'DatePullOut' => now()->subDays(3),
                'employee' => (object)[
                    'EmpFName' => 'Juan',
                    'EmpLName' => 'Dela Cruz',
                    'EmpID' => 'EMP-001'
                ],
                'product' => (object)[
                    'ProdName' => 'Rosey Makeup Kit',
                    'ProdID' => 'PRD-001'
                ]
            ],
            (object)[
                'PullOutID' => 'PULL-002',
                'Qty' => 10,
                'Reason' => 'Expired products',
                'DatePullOut' => now()->subDays(1),
                'employee' => (object)[
                    'EmpFName' => 'Maria',
                    'EmpLName' => 'Santos',
                    'EmpID' => 'EMP-002'
                ],
                'product' => (object)[
                    'ProdName' => 'Gift Ribbon',
                    'ProdID' => 'PRD-003'
                ]
            ],
            (object)[
                'PullOutID' => 'PULL-003',
                'Qty' => 2,
                'Reason' => 'Customer return - defective',
                'DatePullOut' => now(),
                'employee' => (object)[
                    'EmpFName' => 'Pedro',
                    'EmpLName' => 'Reyes',
                    'EmpID' => 'EMP-003'
                ],
                'product' => (object)[
                    'ProdName' => 'Velvet Dress',
                    'ProdID' => 'PRD-002'
                ]
            ]
        ];

        // Sample statistics
        $totalPullOuts = count($pullOuts);
        $totalItemsPulled = 17; // 5 + 10 + 2
        $damagedItems = 5;
        $expiredItems = 10;

        return view('admin.pullouts.index', compact(
            'pullOuts',
            'totalPullOuts',
            'totalItemsPulled',
            'damagedItems',
            'expiredItems'
        ));
    }

    /**
     * Show the form for creating a new pull out record.
     */
    public function create()
    {
        return view('admin.pullouts.create');
    }

    /**
     * Store a newly created pull out record in storage.
     */
    public function store(Request $request)
    {
        // Simple validation
        $request->validate([
            'EmpID' => 'required|string',
            'ProdID' => 'required|string',
            'Qty' => 'required|integer|min:1',
            'Reason' => 'required|string|max:255',
            'DatePullOut' => 'required|date',
        ]);

        // For now, just redirect back with success
        return redirect()->route('admin.pullouts.index')
            ->with('success', 'Pull out record created successfully!');
    }

    /**
     * Display the specified pull out record.
     */
    public function show($id)
    {
        // Sample data for show page
        $pullOut = (object)[
            'PullOutID' => $id,
            'Qty' => 5,
            'Reason' => 'Damaged during handling',
            'DatePullOut' => now()->subDays(3),
            'employee' => (object)[
                'EmpFName' => 'Juan',
                'EmpLName' => 'Dela Cruz',
                'EmpID' => 'EMP-001'
            ],
            'product' => (object)[
                'ProdName' => 'Rosey Makeup Kit',
                'ProdID' => 'PRD-001',
                'CategoryName' => 'Cosmetics'
            ]
        ];

        return view('admin.pullouts.show', compact('pullOut'));
    }

    /**
     * Show the form for editing the specified pull out record.
     */
    public function edit($id)
    {
        // Sample data for edit page
        $pullOut = (object)[
            'PullOutID' => $id,
            'Qty' => 5,
            'Reason' => 'Damaged during handling',
            'DatePullOut' => now()->subDays(3),
            'EmpID' => 'EMP-001',
            'ProdID' => 'PRD-001'
        ];

        return view('admin.pullouts.edit', compact('pullOut'));
    }

    /**
     * Update the specified pull out record in storage.
     */
    public function update(Request $request, $id)
    {
        // Simple validation
        $request->validate([
            'EmpID' => 'required|string',
            'ProdID' => 'required|string',
            'Qty' => 'required|integer|min:1',
            'Reason' => 'required|string|max:255',
            'DatePullOut' => 'required|date',
        ]);

        return redirect()->route('admin.pullouts.index')
            ->with('success', 'Pull out record updated successfully!');
    }

    /**
     * Remove the specified pull out record from storage.
     */
    public function destroy($id)
    {
        return redirect()->route('admin.pullouts.index')
            ->with('success', 'Pull out record deleted successfully!');
    }
}