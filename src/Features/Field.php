<?php

namespace Mdh\MarketingCrm\Features;

use Illuminate\Http\Request;
use Mdh\MarketingCrm\Crm;

class Field
{
    public function getAllFields($auth)
    {
        $crm = new Crm();
        $endPoint = 'fields';
        $apiUrl = $auth['apiUrl'];
        $apiUrl = "$apiUrl/api/3/$endPoint";
        $body = null;
        $method = 'GET';

        return $crm->init($apiUrl, $body, $method, $auth);
    }

    public function createField($auth, $body)
    {
        $crm = new Crm();
        $endPoint = 'fields';
        $apiUrl = $auth['apiUrl'];
        $apiUrl = "$apiUrl/api/3/$endPoint";
        $method = 'POST';

        return $crm->init($apiUrl, $body, $method, $auth);
    }

    public function updateField($auth, $body, $id)
    {
        $crm = new Crm();
        $endPoint = "fields/$id";
        $apiUrl = $auth['apiUrl'];
        $apiUrl = "$apiUrl/api/3/$endPoint";
        $method = 'PUT';

        return $crm->init($apiUrl, $body, $method, $auth, $id);
    }

    public function deleteField($auth, $id)
    {
        $crm = new Crm();
        $endPoint = "fields/$id";
        $apiUrl = $auth['apiUrl'];
        $apiUrl = "$apiUrl/api/3/$endPoint";
        $body = null;
        $method = 'DELETE';

        return $crm->init($apiUrl, $body, $method, $auth, $id);
    }
}