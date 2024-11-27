<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SmsController extends Controller
{
    private $apiUrl = 'https://postback-sms.com/api/';
    private $token = '5994c91001f57eea808aff11738d752a';

    public function getNumber(Request $request)
    {
        $response = Http::get($this->apiUrl, [
            'action' => 'getNumber',
            'country' => $request->input('country', 'se'), // по умолчанию 'se'
            'service' => $request->input('service', 'wa'), // по умолчанию 'wa'
            'token' => $this->token,
            'rent_time' => $request->input('rent_time', null), // опционально
        ]);

        return response()->json($response->json());
    }

    public function getSms(Request $request)
    {
        $response = Http::get($this->apiUrl, [
            'action' => 'getSms',
            'activation' => $request->input('activation_id'),
            'token' => $this->token,
        ]);

        return response()->json($response->json());
    }

    public function cancelNumber(Request $request)
    {
        $response = Http::get($this->apiUrl, [
            'action' => 'cancelNumber',
            'activation' => $request->input('activation_id'),
            'token' => $this->token,
        ]);

        return response()->json($response->json());
    }

    public function getStatus(Request $request)
    {
        $response = Http::get($this->apiUrl, [
            'action' => 'getStatus',
            'activation' => $request->input('activation_id'),
            'token' => $this->token,
        ]);

        return response()->json($response->json());
    }
}
