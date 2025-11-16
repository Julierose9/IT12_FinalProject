<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class InventoryController extends Controller
{
    public function index(Request $request)
    {
        $inventory = [
            (object)[
                'ProdID' => 'PRD-001',
                'ProdName' => 'Rosey Makeup Kit',
                'ProdDescription' => 'Premium makeup set with brushes',
                'ReorderLvl' => 20,
                'CurrentStock' => 45,
                'updated_at' => now()->subDays(1),
                'category' => (object)['CatName' => 'Beauty'],
                'supplier' => (object)['SupName' => 'Beauty Supplies Co.']
            ],
            (object)[
                'ProdID' => 'PRD-002',
                'ProdName' => 'Velvet Dress',
                'ProdDescription' => 'Elegant evening dress',
                'ReorderLvl' => 15,
                'CurrentStock' => 8,
                'updated_at' => now()->subHours(4),
                'category' => (object)['CatName' => 'Clothing'],
                'supplier' => (object)['SupName' => 'Fashion Trends Inc.']
            ],
            (object)[
                'ProdID' => 'PRD-003',
                'ProdName' => 'Gift Ribbon',
                'ProdDescription' => 'Decorative gift wrapping',
                'ReorderLvl' => 25,
                'CurrentStock' => 120,
                'updated_at' => now()->subDays(2),
                'category' => (object)['CatName' => 'Accessories'],
                'supplier' => (object)['SupName' => 'Craft Materials Ltd.']
            ],
            (object)[
                'ProdID' => 'PRD-004',
                'ProdName' => 'Scented Candle Set',
                'ProdDescription' => '3-pack lavender & vanilla candles',
                'ReorderLvl' => 30,
                'CurrentStock' => 12,
                'updated_at' => now()->subDays(3),
                'category' => (object)['CatName' => 'Home'],
                'supplier' => (object)['SupName' => 'Aroma Essentials']
            ],
            (object)[
                'ProdID' => 'PRD-005',
                'ProdName' => 'Personalized Keychain',
                'ProdDescription' => 'Custom engraved metal keychain',
                'ReorderLvl' => 50,
                'CurrentStock' => 78,
                'updated_at' => now()->subWeek(),
                'category' => (object)['CatName' => 'Gifts'],
                'supplier' => (object)['SupName' => 'GiftCraft Studio']
            ],
        ];

        // Search filter
        $search = $request->get('search');
        if ($search) {
            $inventory = array_filter($inventory, function ($item) use ($search) {
                return stripos($item->ProdName, $search) !== false ||
                       stripos($item->ProdID, $search) !== false ||
                       stripos($item->category->CatName, $search) !== false;
            });
            $inventory = array_values($inventory);
        }

        // Export to CSV
        if ($request->has('export')) {
            $csv = "Product ID,Product Name,Category,Current Stock,Reorder Level,Status,Last Updated,Supplier\n";
            foreach ($inventory as $item) {
                $status = $item->CurrentStock <= $item->ReorderLvl ? 'Low Stock' : 'In Stock';
                $csv .= "\"{$item->ProdID}\",\"{$item->ProdName}\",\"{$item->category->CatName}\",{$item->CurrentStock},{$item->ReorderLvl},\"{$status}\",\"{$item->updated_at->format('M d, Y H:i')}\",\"{$item->supplier->SupName}\"\n";
            }
            return response($csv)
                ->header('Content-Type', 'text/csv')
                ->header('Content-Disposition', 'attachment; filename="inventory-report-' . now()->format('Y-m-d') . '.csv"');
        }

        // Statistics
        $totalProducts = count($inventory);
        $lowStockCount = count(array_filter($inventory, fn($p) => $p->CurrentStock <= $p->ReorderLvl));
        $inStockCount = $totalProducts - $lowStockCount;

        // Pagination
        $perPage = 15;
        $page = max(1, $request->get('page', 1));
        $offset = ($page - 1) * $perPage;
        $paginated = array_slice($inventory, $offset, $perPage);

        $products = new LengthAwarePaginator(
            $paginated,
            $totalProducts,
            $perPage,
            $page,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        return view('admin.reports.inventory', compact(
            'products',
            'totalProducts',
            'lowStockCount',
            'inStockCount'
        ));
    }
}