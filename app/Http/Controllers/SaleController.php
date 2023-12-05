<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Cache;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Cache::remember('sales_data', 60 * 60 * 8, function () {
            $shopData = json_decode(file_get_contents('https://api.shop.riotgames.com/v3/collections/'),
                true);
            $salesData = array_filter($shopData, function ($collection) {
                return $collection['path'] === '/event/sales';
            });
            return reset($salesData)['dynamicCollection']['discountedProductsByProductType'] ?? [];
        });

        return view('sales.index', compact('sales'));
    }
}
