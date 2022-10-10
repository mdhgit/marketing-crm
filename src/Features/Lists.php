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
        $body = null;
        $method = 'GET';

        return $crm->init($endPoint, $body, $method, $auth);
    }

    public function createList($auth, $body)
    {
        $crm = new Crm();
        $endPoint = 'lists';
        $method = 'POST';

        return $crm->init($endPoint, $body, $method, $auth);
    }

    public function deleteList($auth, $id)
    {
        $crm = new Crm();
        $endPoint = "lists/$id";
        $body = null;
        $method = 'DELETE';

        return $crm->init($endPoint, $body, $method, $auth, $id);
    }
}