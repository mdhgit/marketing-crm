<?php

namespace Mdh\MarketingCrm;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class Crm {

    public function init($apiUrl, $body = null, $method, $auth, $specialCase = null)
    {
        $client = new Client();
        $apiKey = $auth['apiKey'];

        switch ($method) {
            case 'GET':
                $response = $client->request($method, $apiUrl, [
                    'headers' => [
                      'Accept' => 'application/json',
                      'Api-Token' => $apiKey,
                      'Content-Type' => 'application/json',
                    ],
                ]);
                break;

            case 'POST':
                if($specialCase) {
                    $response = $client->request($method, $apiUrl, [
                        'form_params' => $body,
                        'headers' => [
                          'Api-Token' => $apiKey,
                          'Content-Type' => 'application/x-www-form-urlencoded',
                        ],
                    ]);
                } else {

                    $response = $client->request($method, $apiUrl, [
                        'body' => json_encode($body),
                        'headers' => [
                          'Accept' => 'application/json',
                          'Api-Token' => $apiKey,
                          'Content-Type' => 'application/json',
                        ],
                    ]);
                }
                break;
            
            case 'PUT':
                $response = $client->request($method, $apiUrl, [
                    'body' => json_encode($body),
                    'headers' => [
                        'Accept' => 'application/json',
                        'Api-Token' => $apiKey,
                        'Content-Type' => 'application/json',
                    ],
                ]);
                break;

            case 'DELETE':
                $response = $client->request($method, $apiUrl, [
                    'body' => json_encode($body),
                    'headers' => [
                        'Accept' => 'application/json',
                        'Api-Token' => $apiKey,
                        'Content-Type' => 'application/json',
                    ],
                ]);
                break;
            
            default:
                return response()->json([
                    'response' => "Something Went Wrong, Please Try Again After Some Time"
                ]);
                break;
        }

        return response()->json([
            'response' => json_decode($response->getBody())
        ]);
    }
}