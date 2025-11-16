<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SupplierController extends Controller
{
    public function index()
    {
        // ---- Fake data (no DB) ----
        $suppliers = collect([
            (object)[
                'SupplierID'     => 'SUP-1001',
                'SupName'        => 'ABC Gifts Corp.',
                'SupContactNum'  => '0917-123-4567',
                'Address'        => '123 Gift St., Manila',
                'Status'         => 'Active',
                'products_count' => 45,
            ],
            (object)[
                'SupplierID'     => 'SUP-1002',
                'SupName'        => 'ToyLand Supplies',
                'SupContactNum'  => '0922-987-6543',
                'Address'        => '456 Play Ave., Quezon City',
                'Status'         => 'Active',
                'products_count' => 32,
            ],
            (object)[
                'SupplierID'     => 'SUP-1003',
                'SupName'        => 'Party Essentials',
                'SupContactNum'  => '0935-555-1122',
                'Address'        => '789 Celebration Rd., Makati',
                'Status'         => 'Inactive',
                'products_count' => 0,
            ],
        ]);

        $totalSuppliers        = $suppliers->count();
        $activeSuppliers       = $suppliers->where('Status', 'Active')->count();
        $totalProductsSupplied = $suppliers->sum('products_count');
        $recentSuppliers       = $suppliers->where('created_at', '>=', now()->startOfMonth())->count(); // always 0 for demo

        return view('admin.suppliers.index', compact(
            'suppliers',
            'totalSuppliers',
            'activeSuppliers',
            'totalProductsSupplied',
            'recentSuppliers'
        ));
    }

    public function store(Request $request)
    {
        // ---- Fake store (no DB) ----
        $request->validate([
            'SupplierID'    => 'required|string',
            'SupName'       => 'required|string|max:255',
            'SupContactNum' => 'required|string|max:20',
            'Address'       => 'required|string',
            'Status'        => 'required|in:Active,Inactive,Pending',
        ]);

        // Simulate a successful insert
        return redirect()
            ->route('admin.suppliers.index')
            ->with('success', 'Supplier "' . $request->SupName . '" added successfully (demo mode).');
    }
}