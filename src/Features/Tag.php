<?php

namespace Mdh\MarketingCrm\Features;

use Illuminate\Http\Request;
use Mdh\MarketingCrm\Crm;

class Tag
{
    public function getAllTags($auth)
    {
        $crm = new Crm();
        $endPoint = 'tags';
        $apiUrl = $auth['apiUrl'];
        $apiUrl = "$apiUrl/api/3/$endPoint";
        $body = null;
        $method = 'GET';

        return $crm->init($apiUrl, $body, $method, $auth);
    }

    public function createTag($auth, $body)
    {
        $crm = new Crm();
        $endPoint = 'tags';
        $apiUrl = $auth['apiUrl'];
        $apiUrl = "$apiUrl/api/3/$endPoint";
        $method = 'POST';

        return $crm->init($apiUrl, $body, $method, $auth);
    }

    public function updateTag($auth, $body, $id)
    {
        $crm = new Crm();
        $endPoint = "tags/$id";
        $apiUrl = $auth['apiUrl'];
        $apiUrl = "$apiUrl/api/3/$endPoint";
        $method = 'PUT';

        return $crm->init($apiUrl, $body, $method, $auth, $id);
    }

    public function deleteTag($auth, $id)
    {
        $crm = new Crm();
        $endPoint = "tags/$id";
        $apiUrl = $auth['apiUrl'];
        $apiUrl = "$apiUrl/api/3/$endPoint";
        $body = null;
        $method = 'DELETE';

        return $crm->init($apiUrl, $body, $method, $auth, $id);
    }
}