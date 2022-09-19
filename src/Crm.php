<?php

namespace Mdh\MarketingCrm;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class Crm {

    public function justDoIt() {
        $http = new Client();

        $response = $http->request('GET', "https://inspiration.goprogram.ai/", [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
        ])->getBody()->getContents();

        $response = json_decode($response);

        return response()->json([
            'res' => $response->quote . ' -' . $response->author
        ]);
    }

    public function createContact(Request $request)
    {
        $body = $request->all();
        $endPoint = 'contacts';
        $method = 'POST';
        return $this->init($endPoint, $body, $method);
    }

    private function init($endPoint, $body, $method)
    {
        $apiKey = config('activecampaign.api_key');
        $apiUrl = config('activecampaign.api_url');

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