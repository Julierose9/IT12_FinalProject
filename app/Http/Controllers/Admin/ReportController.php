<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    /**
     * Display a listing of the records.
     */
    public function index()
    {
        // Sample data - following the same pattern as your other controllers
        $records = [
            (object)[
                'RecordID' => 'REC-001',
                'RecordType' => 'Stock In',
                'Description' => 'New stock received for product PRD-001 (Rosey Makeup Kit)',
                'Module' => 'Inventory',
                'Priority' => 'Medium',
                'Timestamp' => now()->subHours(2),
                'user' => (object)[
                    'Username' => 'admin.maria',
                    'employee' => (object)[
                        'EmpFName' => 'Maria',
                        'EmpLName' => 'Santos'
                    ]
                ]
            ],
            (object)[
                'RecordID' => 'REC-002',
                'RecordType' => 'Pullout',
                'Description' => 'Product pullout for damaged items - PRD-002 (Velvet Dress)',
                'Module' => 'Inventory',
                'Priority' => 'High',
                'Timestamp' => now()->subDays(1),
                'user' => (object)[
                    'Username' => 'cashier.john',
                    'employee' => (object)[
                        'EmpFName' => 'John',
                        'EmpLName' => 'Dela Cruz'
                    ]
                ]
            ],
            (object)[
                'RecordID' => 'REC-003',
                'RecordType' => 'Sale',
                'Description' => 'Completed sale transaction ORD-001 with total ₱2,450.00',
                'Module' => 'Sales',
                'Priority' => 'Low',
                'Timestamp' => now()->subDays(1),
                'user' => (object)[
                    'Username' => 'cashier.ana',
                    'employee' => (object)[
                        'EmpFName' => 'Ana',
                        'EmpLName' => 'Reyes'
                    ]
                ]
            ],
            (object)[
                'RecordID' => 'REC-004',
                'RecordType' => 'Adjustment',
                'Description' => 'Inventory quantity adjustment for PRD-003 (Gift Ribbon)',
                'Module' => 'Inventory',
                'Priority' => 'Medium',
                'Timestamp' => now()->subDays(2),
                'user' => (object)[
                    'Username' => 'admin.maria',
                    'employee' => (object)[
                        'EmpFName' => 'Maria',
                        'EmpLName' => 'Santos'
                    ]
                ]
            ],
            (object)[
                'RecordID' => 'REC-005',
                'RecordType' => 'System',
                'Description' => 'User login: admin.maria from IP 192.168.1.100',
                'Module' => 'Authentication',
                'Priority' => 'Low',
                'Timestamp' => now()->subDays(3),
                'user' => (object)[
                    'Username' => 'admin.maria',
                    'employee' => (object)[
                        'EmpFName' => 'Maria',
                        'EmpLName' => 'Santos'
                    ]
                ]
            ],
            (object)[
                'RecordID' => 'REC-006',
                'RecordType' => 'Stock In',
                'Description' => 'New stock received for product PRD-004 (Perfume Set)',
                'Module' => 'Inventory',
                'Priority' => 'Medium',
                'Timestamp' => now()->subDays(4),
                'user' => (object)[
                    'Username' => 'manager.carlos',
                    'employee' => (object)[
                        'EmpFName' => 'Carlos',
                        'EmpLName' => 'Gonzales'
                    ]
                ]
            ],
        ];

        // Sample statistics
        $totalRecords = count($records);
        $stockInRecords = 2;
        $pulloutRecords = 1;
        $salesRecords = 1;

        return view('admin.records.index', compact(
            'records',
            'totalRecords',
            'stockInRecords',
            'pulloutRecords',
            'salesRecords'
        ));
    }

    /**
     * Show the form for creating a new record.
     */
    public function create()
    {
        return view('admin.records.create');
    }

    /**
     * Store a newly created record in storage.
     */
    public function store(Request $request)
    {
        // Simple validation
        $request->validate([
            'RecordType' => 'required|string',
            'Description' => 'required|string',
            'Module' => 'required|string',
            'Priority' => 'required|string',
        ]);

        // For now, just redirect back with success
        return redirect()->route('admin.records.index')
            ->with('success', 'Record created successfully!');
    }

    /**
     * Export records to CSV or PDF.
     */
    public function export(Request $request)
    {
        $format = $request->get('format', 'csv');
        
        // Export logic would go here
        
        return redirect()->route('admin.records.index')
            ->with('success', "Records exported as {$format} successfully!");
    }
}