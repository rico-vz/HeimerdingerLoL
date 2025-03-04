<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class SaleController extends Controller
{
    public function index()
    {
        try {
            $sales = Cache::remember('sales_data', 60 * 60 * 8, static function () {
                $lmi_api_key = config('services.lmi.api_key');

                $response = Http::withHeaders([
                    'Authorization' => 'Bearer '.$lmi_api_key,
                ])->get('https://lmi.orianna.dev/api/lol-sales');

                $response = $response->json();

                if ($response['champion_sales'] === null) {
                    logger()->error('LMI has broken');

                    return abort(503, 'Trying to access array offset on value of type null');
                }

                return $response;
            });
        } catch (\Exception $exception) {
            if ($exception->getMessage() === 'Trying to access array offset on value of type null') {
                logger()->error('LMI has broken');
                abort(503, 'Sorry, the Sale Rotation is currently under maintenance. Please try again later.');
            } else {
                logger()->error('An error occurred while trying to fetch the Sale Rotation', ['error' => $exception->getMessage()]);
                abort(500, 'Sorry, an error occurred while trying to fetch the Sale Rotation. Please try again later.');
            }
        }

        return view('sales.index', ['sales' => $sales]);
    }
}
