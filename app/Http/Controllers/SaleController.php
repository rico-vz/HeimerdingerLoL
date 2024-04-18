<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Cache::remember('sales_data', 60 * 60 * 8, static function () {
            $lmi_api_key = config('services.lmi.api_key');

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $lmi_api_key,
            ])->get('https://lmi.orianna.dev/api/lol-sales');

            return $response->json();
        });

        return view('sales.index', ['sales' => $sales]);
    }
}
