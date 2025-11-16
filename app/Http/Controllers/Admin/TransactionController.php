<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Carbon\Carbon;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        
        $transactions = collect([
            (object)[
                'id'            => 'TRX-001',
                'cashier'       => (object)['EmpFName' => 'Maria',   'EmpLName' => 'Santos'],
                'total_items'   => 3,
                'amount'        => 1250.00,
                'payment_method'=> 'Cash',
                'status'        => 'Completed',
                'created_at'    => Carbon::parse('2025-11-16 09:12:00'),
            ],
            (object)[
                'id'            => 'TRX-002',
                'cashier'       => (object)['EmpFName' => 'John',    'EmpLName' => 'Dela Cruz'],
                'total_items'   => 1,
                'amount'        => 899.50,
                'payment_method'=> 'GCash',
                'status'        => 'Completed',
                'created_at'    => Carbon::parse('2025-11-15 14:33:00'),
            ],
            (object)[
                'id'            => 'TRX-003',
                'cashier'       => (object)['EmpFName' => 'Ana',     'EmpLName' => 'Reyes'],
                'total_items'   => 5,
                'amount'        => 2300.00,
                'payment_method'=> 'Credit Card',
                'status'        => 'Cancelled',
                'created_at'    => Carbon::parse('2025-11-10 11:05:00'),
            ],
            (object)[
                'id'            => 'TRX-004',
                'cashier'       => (object)['EmpFName' => 'Carlos',  'EmpLName' => 'Gonzales'],
                'total_items'   => 2,
                'amount'        => 560.00,
                'payment_method'=> 'Cash',
                'status'        => 'Completed',
                'created_at'    => Carbon::parse('2025-10-28 16:44:00'),
            ],
            (object)[
                'id'            => 'TRX-005',
                'cashier'       => (object)['EmpFName' => 'Liza',    'EmpLName' => 'Tan'],
                'total_items'   => 4,
                'amount'        => 1899.75,
                'payment_method'=> 'GCash',
                'status'        => 'Completed',
                'created_at'    => Carbon::parse('2025-09-22 13:20:00'),
            ],
        ]);

        
        $period = $request->input('period', 'daily');

        $now = Carbon::now();

        $filtered = $transactions->filter(function ($t) use ($period, $now) {
            return match ($period) {
                'daily'   => $t->created_at->isToday(),
                'monthly' => $t->created_at->isCurrentMonth(),
                'yearly'  => $t->created_at->isCurrentYear(),
                default   => true,
            };
        });

        
        if ($request->has('export')) {
            $csv = "Transaction ID,Cashier,Items,Amount,Payment,Status,Date\n";
            foreach ($filtered as $t) {
                $csv .= "\"{$t->id}\",\"{$t->cashier->EmpFName} {$t->cashier->EmpLName}\",{$t->total_items},{$t->amount},\"{$t->payment_method}\",\"{$t->status}\",\"{$t->created_at->format('M d, Y H:i')}\"\n";
            }
            return response($csv)
                ->header('Content-Type', 'text/csv')
                ->header('Content-Disposition', 'attachment; filename="transactions_' . $now->format('Y-m-d') . '.csv"');
        }

        
        $perPage = 15;
        $page    = max(1, $request->input('page', 1));
        $offset  = ($page - 1) * $perPage;
        $slice   = $filtered->slice($offset, $perPage)->values();

        $paginator = new LengthAwarePaginator(
            $slice,
            $filtered->count(),
            $perPage,
            $page,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        
        $totalTransactions = $filtered->count();
        $completedCount    = $filtered->where('status', 'Completed')->count();
        $cancelledCount    = $filtered->where('status', 'Cancelled')->count();

        return view('admin.reports.transaction', compact(
            'paginator',
            'totalTransactions',
            'completedCount',
            'cancelledCount',
            'period'
        ));
    }
}