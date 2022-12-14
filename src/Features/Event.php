<?php

namespace Mdh\MarketingCrm\Features;

use Illuminate\Http\Request;
use Mdh\MarketingCrm\Crm;

class Event
{
    
    public function register($auth, $body, $urlEndPoint)
    {
        $crm = new Crm();
        $method = 'POST';
        $specialCase = true;

        return $crm->init($urlEndPoint, $body, $method, $auth, $specialCase);
    }

    public function prepareEventArray($email, $event, $actId, $key,$eventData=null)
    {
        if(empty($email) || empty($event) || empty($actId) || empty($key))
            return false;

        $visit = json_encode(array(
            "email" => $email
        ));

        return array(
            "actid" => $actId,
            "key" => $key,
            "event" => $event,
            "eventdata" => $eventData,
            "visit" => $visit
        );
    }

}