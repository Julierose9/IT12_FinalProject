<?php

namespace App\Http\Controllers\Cashier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Customer;

class OrderController extends Controller
{
    /**
     * Display a listing of the orders.
     */
    public function index()
    {
        // Sample data for testing (replace with real database queries)
        $orders = [
            (object)[
                'OrderID' => 'ORD-001',
                'OrderDate' => now()->subDays(2),
                'TotalAmount' => 1250.75,
                'OrderStatus' => 'Completed',
                'PaymentStatus' => 'Paid',
                'customer' => (object)[
                    'CustFName' => 'Maria',
                    'CustLName' => 'Santos',
                    'CustPhone' => '09123456789'
                ],
                'items_count' => 3,
                'order_details' => [
                    (object)['ProductID' => 'PRD-001', 'Qty' => 1, 'UnitPrice' => 899.75],
                    (object)['ProductID' => 'PRD-003', 'Qty' => 2, 'UnitPrice' => 175.50]
                ]
            ],
            (object)[
                'OrderID' => 'ORD-002',
                'OrderDate' => now()->subDays(1),
                'TotalAmount' => 560.25,
                'OrderStatus' => 'Processing',
                'PaymentStatus' => 'Pending',
                'customer' => (object)[
                    'CustFName' => 'Juan',
                    'CustLName' => 'Dela Cruz',
                    'CustPhone' => '09198765432'
                ],
                'items_count' => 2,
                'order_details' => [
                    (object)['ProductID' => 'PRD-002', 'Qty' => 1, 'UnitPrice' => 560.25]
                ]
            ],
            (object)[
                'OrderID' => 'ORD-003',
                'OrderDate' => now(),
                'TotalAmount' => 3200.00,
                'OrderStatus' => 'Pending',
                'PaymentStatus' => 'Unpaid',
                'customer' => (object)[
                    'CustFName' => 'Ana',
                    'CustLName' => 'Reyes',
                    'CustPhone' => '09151234567'
                ],
                'items_count' => 4,
                'order_details' => [
                    (object)['ProductID' => 'PRD-001', 'Qty' => 2, 'UnitPrice' => 899.75],
                    (object)['ProductID' => 'PRD-002', 'Qty' => 1, 'UnitPrice' => 560.25],
                    (object)['ProductID' => 'PRD-003', 'Qty' => 3, 'UnitPrice' => 175.50]
                ]
            ]
        ];

        // Sample statistics for dashboard
        $totalOrders = count($orders);
        $pendingOrders = 1;
        $completedOrders = 1;
        $totalRevenue = 5011.00;

        return view('cashier.orders.index', compact(
            'orders',
            'totalOrders',
            'pendingOrders',
            'completedOrders',
            'totalRevenue'
        ));
    }

    /**
     * Show the form for creating a new order.
     */
    public function create()
    {
        // Get products for the order form
        $products = Product::where('Status', 'Active')->get();
        $customers = Customer::all();
        
        return view('cashier.orders.create', compact('products', 'customers'));
    }

    /**
     * Store a newly created order in storage.
     */
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'CustID' => 'required|exists:customers,CustID',
            'products' => 'required|array',
            'products.*.product_id' => 'required|exists:products,ProdID',
            'products.*.quantity' => 'required|integer|min:1',
            'PaymentMethod' => 'required|string',
            'AmountTendered' => 'required|numeric|min:0'
        ]);

        // Create order logic here
        // This would typically involve:
        // 1. Creating the order record
        // 2. Creating order details
        // 3. Updating inventory
        // 4. Processing payment

        return redirect()->route('cashier.orders.index')
            ->with('success', 'Order created successfully!');
    }

    /**
     * Display the specified order.
     */
    public function show($id)
    {
        $order = Order::with(['customer', 'orderDetails.product'])->findOrFail($id);
        return view('cashier.orders.show', compact('order'));
    }

    /**
     * Update the specified order in storage.
     */
    public function update(Request $request, $id)
    {
        // Update order status or other details
        return redirect()->route('cashier.orders.index')
            ->with('success', 'Order updated successfully!');
    }

    /**
     * Process payment for an order.
     */
    public function processPayment(Request $request, $id)
    {
        // Payment processing logic
        return redirect()->route('cashier.orders.index')
            ->with('success', 'Payment processed successfully!');
    }
}