<?php

namespace Mdh\MarketingCrm;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class Crm {

    public function call($endPoint,$body, $method){
        $response = $client->request($method, "$apiUrl/$endPoint", [
            'body' => json_encode($body),
            'headers' => [
              'Accept' => 'application/json',
              'Content-Type' => 'application/json',
            ],
        ]);

        return response()->json([
            'response' => json_decode($response->getBody())
        ]);
    }

    public function init($endPoint, $body = null, $method, $auth, $id = null)
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
            
            case 'PUT':
                $response = $client->request($method, "$apiUrl/api/3/$endPoint/$id", [
                    'body' => json_encode($body),
                    'headers' => [
                        'Accept' => 'application/json',
                        'Api-Token' => $apiKey,
                        'Content-Type' => 'application/json',
                    ],
                ]);
                break;

            case 'DELETE':
                $response = $client->request($method, "$apiUrl/api/3/$endPoint/$id", [
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