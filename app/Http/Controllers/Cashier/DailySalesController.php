<?php

namespace App\Http\Controllers\Cashier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class dailySalesController extends Controller
{
    public function dailySales(Request $request)
    {
        $date = $request->get('date') ? Carbon::parse($request->date) : Carbon::today();
        $selectedDate = $date->copy();

        // Fake sales data
        $fakeSales = [
            ['method' => 'Cash',        'amount' => 2450.50, 'count' => 8],
            ['method' => 'GCash',       'amount' => 3899.75, 'count' => 12],
           
        ];

        $totalSales = array_sum(array_column($fakeSales, 'amount'));
        $totalOrders = array_sum(array_column($fakeSales, 'count'));
        $avgOrder = $totalOrders > 0 ? $totalSales / $totalOrders : 0;

        $breakdown = [];
        foreach ($fakeSales as $sale) {
            $percentage = $totalSales > 0 ? ($sale['amount'] / $totalSales) * 100 : 0;
            $breakdown[$sale['method']] = [
                'count' => $sale['count'],
                'amount' => $sale['amount'],
                'percentage' => $percentage,
            ];
        }

        $summary = [
            'total_sales' => $totalSales,
            'total_orders' => $totalOrders,
            'avg_order' => $avgOrder,
        ];

        return view('cashier.reports.daily-sales', compact('selectedDate', 'summary', 'breakdown'));
    }
}