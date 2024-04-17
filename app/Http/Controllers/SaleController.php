<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Cache::remember('sales_data', 60 * 60 * 8, static function () {
            $shopData = json_decode(
                file_get_contents('https://rico-vz.github.io/shop-depr-temp/download.json'),
                true
            );
            $salesData = array_filter($shopData, static fn ($collection) => $collection['path'] === '/event/sales');

            return reset($salesData)['dynamicCollection']['discountedProductsByProductType'] ?? [];
        });

        return view('sales.index', ['sales' => $sales]);
    }
}
