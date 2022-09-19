<?php

namespace Mdh\MarketingCrm\Controllers;

use Illuminate\Http\Request;
use Mdh\MarketingCrm\Crm;
use \ActiveCampaign as ActiveCampaign;

class CrmController
{
    public function index(Crm $inspire) {
        $quote = $inspire->justDoIt();

        return $quote;
    }

    public function createContact(Request $request, Crm $inspire)
    {
        $res = $inspire->createContact($request);

        return $res;
    }
}