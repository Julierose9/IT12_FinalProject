<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the suppliers.
     */
    public function index()
    {
        // Sample data - following the same pattern as your StockInController
        $suppliers = [
            (object)[
                'SupplierID' => 'SUP-001',
                'SupName' => 'Beauty Supplies Co.',
                'SupContactNum' => '+1 (555) 123-4567',
                'Address' => '123 Beauty Ave, Cosmetic City, CC 12345',
                'Status' => 'Active',
                'products_count' => 15
            ],
            (object)[
                'SupplierID' => 'SUP-002',
                'SupName' => 'Fashion Trends Inc.',
                'SupContactNum' => '+1 (555) 234-5678',
                'Address' => '456 Fashion Blvd, Style Town, ST 67890',
                'Status' => 'Active',
                'products_count' => 22
            ],
            (object)[
                'SupplierID' => 'SUP-003',
                'SupName' => 'Craft Materials Ltd.',
                'SupContactNum' => '+1 (555) 345-6789',
                'Address' => '789 Craft Street, Art Village, AV 54321',
                'Status' => 'Inactive',
                'products_count' => 8
            ],
            (object)[
                'SupplierID' => 'SUP-004',
                'SupName' => 'Gift Wraps Unlimited',
                'SupContactNum' => '+1 (555) 456-7890',
                'Address' => '321 Gift Road, Present Park, PP 98765',
                'Status' => 'Active',
                'products_count' => 12
            ],
        ];

        // Sample statistics
        $totalSuppliers = count($suppliers);
        $activeSuppliers = 3;
        $totalProductsSupplied = 57;
        $recentSuppliers = 1;

        return view('admin.suppliers.index', compact(
            'suppliers',
            'totalSuppliers',
            'activeSuppliers',
            'totalProductsSupplied',
            'recentSuppliers'
        ));
    }

    /**
     * Show the form for creating a new supplier.
     */
    public function create()
    {
        return view('admin.suppliers.create');
    }

    /**
     * Store a newly created supplier in storage.
     */
    public function store(Request $request)
    {
        // Simple validation
        $request->validate([
            'SupplierID' => 'required|string|unique:suppliers,SupplierID',
            'SupName' => 'required|string|max:255',
            'SupContactNum' => 'required|string|max:20',
            'Address' => 'required|string',
            'Status' => 'required|string',
        ]);

        // For now, just redirect back with success
        return redirect()->route('admin.suppliers.index')
            ->with('success', 'Supplier created successfully!');
    }
}