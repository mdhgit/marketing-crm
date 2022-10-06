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
        $body = null;
        $method = 'GET';

        return $crm->init($endPoint, $body, $method, $auth);
    }

    public function createField($auth, $body)
    {
        $crm = new Crm();
        $endPoint = 'fields';
        $method = 'POST';

        return $crm->init($endPoint, $body, $method, $auth);
    }

    public function updateField($auth, $body, $id)
    {
        $crm = new Crm();
        $endPoint = "fields/$id";
        $method = 'PUT';

        return $crm->init($endPoint, $body, $method, $auth, $id);
    }

    public function deleteField($auth, $id)
    {
        $crm = new Crm();
        $endPoint = "fields/$id";
        $body = null;
        $method = 'DELETE';

        return $crm->init($endPoint, $body, $method, $auth, $id);
    }
}