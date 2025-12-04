<?php

namespace App\Http\Controllers;

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
            $sales = Cache::remember('sales_data', 60 * 60 * 8, static function () {
                $lmi_api_key = config('services.lmi.api_key');

                $response = Http::withHeaders([
                    'Authorization' => 'Bearer ' . $lmi_api_key,
                ])->get('https://lmi.orianna.dev/api/lol-sales');

                $response = $response->json();

                if (! isset($response['champion_sales']) || $response['champion_sales'] === null) {
                    Log::error('LMI has broken');
                    return abort(503, 'Trying to access array offset on value of type null');
                }

                return $response;
            });
        } catch (\Exception $exception) {
            if ($exception->getMessage() === 'Trying to access array offset on value of type null') {
                Log::error('LMI has broken');
                abort(503, 'Sorry, the Sale Rotation is currently under maintenance. Please try again later.');
            } else {
                Log::error('An error occurred while trying to fetch the Sale Rotation', ['error' => $exception->getMessage()]);
                abort(500, 'Sorry, an error occurred while trying to fetch the Sale Rotation. Please try again later.');
            }
        }

        return view('sales.index', ['sales' => $sales]);
    }
 
}
