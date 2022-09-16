<?php

namespace Mdh\MarketingCrm;

use GuzzleHttp\Client;

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
}