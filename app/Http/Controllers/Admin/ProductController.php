<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     */
    public function index()
    {
        // Sample data for testing (remove this when you have real data)
        $products = [
            (object)[
                'ProdID' => 'PRD-001',
                'ProdName' => 'Rosey Makeup Kit',
                'ProdDescription' => 'Premium makeup set with brushes',
                'ReorderLvl' => 20,
                'Status' => 'Active',
                'current_stock' => 45,
                'category' => (object)['CategoryName' => 'Beauty'],
                'supplier' => (object)['SupName' => 'Beauty Supplies Co.']
            ],
            (object)[
                'ProdID' => 'PRD-002',
                'ProdName' => 'Velvet Dress', 
                'ProdDescription' => 'Elegant evening dress',
                'ReorderLvl' => 15,
                'Status' => 'Active',
                'current_stock' => 8,
                'category' => (object)['CategoryName' => 'Clothing'],
                'supplier' => (object)['SupName' => 'Fashion Trends Inc.']
            ],
            (object)[
                'ProdID' => 'PRD-003',
                'ProdName' => 'Gift Ribbon',
                'ProdDescription' => 'Decorative gift wrapping', 
                'ReorderLvl' => 25,
                'Status' => 'Active',
                'current_stock' => 120,
                'category' => (object)['CategoryName' => 'Accessories'],
                'supplier' => (object)['SupName' => 'Craft Materials Ltd.']
            ]
        ];

        // Sample statistics
        $totalProducts = count($products);
        $activeProducts = 3;
        $lowStockProducts = 1; // Velvet Dress has low stock
        $totalCategories = 3;

        return view('admin.products.index', compact(
            'products',
            'totalProducts',
            'activeProducts', 
            'lowStockProducts',
            'totalCategories'
        ));
    }

    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created product in storage.
     */
    public function store(Request $request)
{
    // Simple validation for now
    $request->validate([
        'ProdID' => 'required|string',
        'ProdName' => 'required|string',
        'ReorderLvl' => 'required|integer|min:0',
    ]);

    // For now, just redirect back with success message
    // Later you can add database saving logic here
    return redirect()->route('admin.products.index')
        ->with('success', 'Product created successfully!');
}

    /**
     * Display the specified product.
     */
    public function show($id)
    {
        return view('admin.products.show');
    }

    /**
     * Show the form for editing the specified product.
     */
    public function edit($id)
    {
        return view('admin.products.edit');
    }

    /**
     * Update the specified product in storage.
     */
    public function update(Request $request, $id)
    {
        return redirect()->route('admin.products.index')
            ->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified product from storage.
     */
    public function destroy($id)
    {
        return redirect()->route('admin.products.index')
            ->with('success', 'Product deleted successfully!');
    }
}