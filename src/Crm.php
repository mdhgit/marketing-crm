<?php

namespace Mdh\MarketingCrm;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class Crm {

    public function createContact(Request $request, $auth)
    {
        $body = $request->all();
        $endPoint = 'contacts';
        $method = 'POST';
        return $this->init($endPoint, $body, $method, $auth);
    }

    public function init($endPoint, $body, $method, $auth)
    {
        $apiKey = $auth['apiKey'];
        $apiUrl = $auth['apiUrl'];

        $client = new Client();

        switch ($method) {
            case 'GET':
                $response = $client->request($method, "$apiUrl/api/3/$endPoint", [
                    'headers' => [
                      'Accept' => 'application/json',
                      'Api-Token' => $apiKey,
                      'Content-Type' => 'application/json',
                    ],
                ]);
                break;

            case 'POST':
                $response = $client->request($method, "$apiUrl/api/3/$endPoint", [
                    'body' => json_encode($body),
                    'headers' => [
                      'Accept' => 'application/json',
                      'Api-Token' => $apiKey,
                      'Content-Type' => 'application/json',
                    ],
                ]);
                break;
            
            default:
                # code...
                break;
        }

        return response()->json([
            'response' => json_decode($response->getBody())
        ]);
    }
}