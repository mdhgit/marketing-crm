<?php

namespace Mdh\MarketingCrm\Controllers;

use Illuminate\Http\Request;
use Mdh\MarketingCrm\Features\Contact;

class CrmController
{
    private $auth;

    public function __construct()
    {
        $apiKey = config('activecampaign.api_key');
        $apiUrl = config('activecampaign.api_url');

        $this->auth = [
            'apiKey' => $apiKey,
            'apiUrl' => $apiUrl
        ];
    }

    public function createContact(Request $request, Contact $contact)
    {
        $data = $request->all();

        $res = $contact->create($this->auth, $data);

        return $res;
    }
}