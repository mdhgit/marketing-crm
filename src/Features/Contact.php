<?php

namespace Mdh\MarketingCrm\Features;

use Illuminate\Http\Request;
use Mdh\MarketingCrm\Crm;

class Contact
{
    public function create($auth, $body)
    {
        $crm = new Crm();
        $endPoint = 'contacts';
        $method = 'POST';

        return $crm->init($endPoint, $body, $method, $auth);
    }

    public function update(Request $request, $auth)
    {
        
    }

}