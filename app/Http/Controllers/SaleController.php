<?php

namespace App\Http\Controllers;

use RuntimeException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SaleController extends Controller
{
    public function index()
    {
        // If the feature toggle is disabled, do not attempt to fetch sales data and return the maintenance view.
        if (!config('sales.enabled')) {
            return view('sales.index');
        }

        try {
            $sales = Cache::remember('sales_data', 60 * 60 * 8, function () {
                $borisUrl = rtrim((string) config('services.boris.url'), '/');
                $borisApiKey = (string) config('services.boris.api_key');

                $headers = [
                    'X-API-Key' => $borisApiKey,
                ];

                $championSalesResponse = Http::withHeaders($headers)->get($borisUrl.'/api/champions/sales');
                $skinSalesResponse = Http::withHeaders($headers)->get($borisUrl.'/api/skins/sales');

                if (! $championSalesResponse->successful() || ! $skinSalesResponse->successful()) {
                    Log::error('Boris sales request failed.', [
                        'champions_status' => $championSalesResponse->status(),
                        'skins_status' => $skinSalesResponse->status(),
                    ]);

                    throw new RuntimeException('Boris sales request failed.');
                }

                $championSales = $championSalesResponse->json();
                $skinSales = $skinSalesResponse->json();

                if (
                    ! isset($championSales['items']) || ! is_array($championSales['items']) ||
                    ! isset($skinSales['items']) || ! is_array($skinSales['items'])
                ) {
                    Log::error('Boris sales payload is invalid.');

                    throw new RuntimeException('Boris sales payload is invalid.');
                }

                return [
                    'champion_sales' => array_map(static fn (array $item): array => [
                        'item_id' => $item['id'],
                        'rp' => $item['sale_rp'],
                        'percent_off' => $item['percent_off'],
                    ], $championSales['items']),
                    'skin_sales' => array_map(static fn (array $item): array => [
                        'item_id' => $item['id'],
                        'rp' => $item['sale_rp'],
                        'percent_off' => $item['percent_off'],
                    ], $skinSales['items']),
                ];
            });
        } catch (\Exception $exception) {
            if (
                $exception->getMessage() === 'Boris sales request failed.' ||
                $exception->getMessage() === 'Boris sales payload is invalid.'
            ) {
                abort(503, 'Sorry, the Sale Rotation is currently under maintenance. Please try again later.');
            }

            Log::error('An error occurred while trying to fetch the Sale Rotation', ['error' => $exception->getMessage()]);
            abort(500, 'Sorry, an error occurred while trying to fetch the Sale Rotation. Please try again later.');
        }

        return view('sales.index', ['sales' => $sales]);
    }
 
}
