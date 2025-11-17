<?php

namespace App\Http\Controllers\Cashier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the transactions.
     */
    public function index()
    {
        // Sample data combining orders and payments
        $transactions = [
            (object)[
                'OrderID' => 'ORD-001',
                'PaymentID' => 'PAY-001',
                'CustomerName' => 'Walk-in Customer',
                'CustomerContact' => 'N/A',
                'OrderDateTime' => now()->subHours(2),
                'ItemsCount' => 3,
                'ProductNames' => 'Rosey Makeup Kit, Gift Ribbon',
                'TotalAmount' => 1250.00,
                'PaymentMethod' => 'cash',
                'PaymentStatus' => 'paid',
                'OrderStatus' => 'completed'
            ],
            (object)[
                'OrderID' => 'ORD-002',
                'PaymentID' => 'PAY-002',
                'CustomerName' => 'Maria Santos',
                'CustomerContact' => '+63 912 345 6789',
                'OrderDateTime' => now()->subDays(1),
                'ItemsCount' => 2,
                'ProductNames' => 'Velvet Dress',
                'TotalAmount' => 1899.00,
                'PaymentMethod' => 'gcash',
                'PaymentStatus' => 'paid',
                'OrderStatus' => 'completed'
            ],
            (object)[
                'OrderID' => 'ORD-003',
                'PaymentID' => null,
                'CustomerName' => 'John Dela Cruz',
                'CustomerContact' => '+63 917 654 3210',
                'OrderDateTime' => now()->subDays(2),
                'ItemsCount' => 1,
                'ProductNames' => 'Perfume Set',
                'TotalAmount' => 750.00,
                'PaymentMethod' => 'card',
                'PaymentStatus' => 'unpaid',
                'OrderStatus' => 'pending'
            ],
            (object)[
                'OrderID' => 'ORD-004',
                'PaymentID' => 'PAY-003',
                'CustomerName' => 'Ana Reyes',
                'CustomerContact' => '+63 918 765 4321',
                'OrderDateTime' => now()->subDays(3),
                'ItemsCount' => 4,
                'ProductNames' => 'Various items',
                'TotalAmount' => 3200.00,
                'PaymentMethod' => 'cash',
                'PaymentStatus' => 'paid',
                'OrderStatus' => 'completed'
            ],
        ];

        // Sample statistics
        $totalTransactions = count($transactions);
        $totalRevenue = 7099.00;
        $completedOrders = 3;
        $pendingPayments = 1;

        return view('cashier.transactions.transactions', compact(
            'transactions',
            'totalTransactions',
            'totalRevenue',
            'completedOrders',
            'pendingPayments'
        ));
    }

    /**
     * Display the specified transaction.
     */
    public function show($id)
    {
        // This would fetch a specific transaction
        return view('cashier.transactions.show', compact('id'));
    }

    /**
     * Generate receipt for a transaction.
     */
    public function receipt($id)
    {
        // This would generate a receipt
        return response()->json(['message' => 'Receipt generated']);
    }
}   