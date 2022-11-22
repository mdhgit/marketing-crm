<?php

namespace Mdh\MarketingCrm\Features;

use Illuminate\Http\Request;
use Mdh\MarketingCrm\Crm;

class Lists
{
    public function getAllLists($auth)
    {
        $crm = new Crm();
        $endPoint = 'lists';
        $apiUrl = $auth['apiUrl'];
        $apiUrl = "$apiUrl/api/3/$endPoint";
        $body = null;
        $method = 'GET';

        return $crm->init($apiUrl, $body, $method, $auth);
    }

    public function createList($auth, $body)
    {
        $crm = new Crm();
        $endPoint = 'lists';
        $apiUrl = $auth['apiUrl'];
        $apiUrl = "$apiUrl/api/3/$endPoint";
        $method = 'POST';

        return $crm->init($apiUrl, $body, $method, $auth);
    }

    public function deleteList($auth, $id)
    {
        $crm = new Crm();
        $endPoint = "lists/$id";
        $apiUrl = $auth['apiUrl'];
        $apiUrl = "$apiUrl/api/3/$endPoint";
        $body = null;
        $method = 'DELETE';

        return $crm->init($apiUrl, $body, $method, $auth, $id);
    }
}