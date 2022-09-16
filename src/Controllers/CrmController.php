<?php

namespace Mdh\MarketingCrm\Controllers;

use Illuminate\Http\Request;
use Mdh\MarketingCrm\Crm;

class CrmController
{
    public function index(Crm $inspire) {
        $quote = $inspire->justDoIt();

        return $quote;
    }
}