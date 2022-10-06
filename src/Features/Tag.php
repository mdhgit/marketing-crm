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
        $body = null;
        $method = 'GET';

        return $crm->init($endPoint, $body, $method, $auth);
    }

    public function createTag($auth, $body)
    {
        $crm = new Crm();
        $endPoint = 'tags';
        $method = 'POST';

        return $crm->init($endPoint, $body, $method, $auth);
    }

    public function updateTag($auth, $body, $id)
    {
        $crm = new Crm();
        $endPoint = "tags/$id";
        $method = 'PUT';

        return $crm->init($endPoint, $body, $method, $auth, $id);
    }

    public function deleteTag($auth, $id)
    {
        $crm = new Crm();
        $endPoint = "tags/$id";
        $body = null;
        $method = 'DELETE';

        return $crm->init($endPoint, $body, $method, $auth, $id);
    }
}