<?php

namespace App\Http\Controllers\Cashier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        // Fake payments data
        $fakePayments = [
            [
                'PaymentID' => 'PAY-001',
                'OrderID' => 'ORD-001',
                'CustomerName' => 'Maria Santos',
                'Amount' => 899.75,
                'PaymentMethod' => 'GCash',
                'Status' => 'Paid',
                'created_at' => now()->subDays(1),
            ],
            [
                'PaymentID' => 'PAY-002',
                'OrderID' => 'ORD-002',
                'CustomerName' => 'Juan Dela Cruz',
                'Amount' => 560.25,
                'PaymentMethod' => 'Cash',
                'Status' => 'Paid',
                'created_at' => now()->subHours(5),
            ],
            [
                'PaymentID' => 'PAY-003',
                'OrderID' => 'ORD-003',
                'CustomerName' => 'Ana Reyes',
                'Amount' => 175.50,
                'PaymentMethod' => 'Cash',
                'Status' => 'Cancelled',
                'created_at' => now(),
            ],
        ];

        // Simple search
        $search = $request->get('search');
        $payments = collect($fakePayments);

        if ($search) {
            $payments = $payments->filter(function ($payment) use ($search) {
                return str_contains(strtolower($payment['PaymentID']), strtolower($search)) ||
                       str_contains(strtolower($payment['OrderID']), strtolower($search)) ||
                       str_contains(strtolower($payment['CustomerName']), strtolower($search)) ||
                       str_contains(strtolower($payment['PaymentMethod']), strtolower($search));
            });
        }

        $payments = $payments->values();

        return view('cashier.payments.index', compact('payments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'OrderID' => 'required',
            'Amount' => 'required|numeric|min:0.01',
            'PaymentMethod' => 'required',
            'Status' => 'required|in:Paid,Pending,Failed',
        ]);

        // Simulate saving to session (fake DB)
        $newPayment = [
            'PaymentID' => 'PAY-' . str_pad(rand(1, 999), 3, '0', STR_PAD_LEFT),
            'OrderID' => $request->OrderID,
            'CustomerName' => $request->OrderID === 'walk-in' ? 'Walk-in Customer' : 'Customer from Order',
            'Amount' => (float) $request->Amount,
            'PaymentMethod' => $request->PaymentMethod,
            'Status' => $request->Status,
            'created_at' => now(),
        ];

        // Optional: Store in session to persist across requests
        $payments = Session::get('fake_payments', []);
        $payments[] = $newPayment;
        Session::put('fake_payments', $payments);

        return redirect()->route('cashier.payments.index')
            ->with('success', 'Payment recorded successfully!');
    }
}