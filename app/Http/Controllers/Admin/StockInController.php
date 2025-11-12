<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StockInController extends Controller
{
    /**
     * Display a listing of the stock in records.
     */
    public function index()
    {
        // Sample data - same pattern as products
        $stockIns = [
            (object)[
                'StockInID' => 'STKIN-001',
                'Qty' => 50,
                'ProdStatus' => 'Good',
                'DateRcvd' => now()->subDays(2),
                'product' => (object)[
                    'ProdName' => 'Rosey Makeup Kit',
                    'ProdID' => 'PRD-001'
                ],
                'supplier' => (object)[
                    'SupName' => 'Beauty Supplies Co.'
                ]
            ],
            // ... rest of your sample data
        ];

        // Sample statistics
        $totalStockIns = count($stockIns);
        $totalItemsReceived = 175;
        $activeSuppliers = 3;
        $recentStockIns = 3;

        return view('admin.stock-in.index', compact(
            'stockIns',
            'totalStockIns',
            'totalItemsReceived',
            'activeSuppliers',
            'recentStockIns'
        ));
    }

    /**
     * Show the form for creating a new stock in record.
     */
    public function create()
    {
        return view('admin.stock-in.create');
    }

    /**
     * Store a newly created stock in record in storage.
     */
    public function store(Request $request)
    {
        // Simple validation
        $request->validate([
            'ProdID' => 'required|string',
            'SupID' => 'required|string', 
            'Qty' => 'required|integer|min:1',
            'ProdStatus' => 'required|string',
            'DateRcvd' => 'required|date',
        ]);

        // For now, just redirect back with success
        return redirect()->route('admin.stock-in.index')
            ->with('success', 'Stock in record created successfully!');
    }
}