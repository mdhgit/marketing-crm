<?php

namespace Mdh\MarketingCrm\Features;

use Illuminate\Http\Request;
use Mdh\MarketingCrm\Crm;

class Automation
{
    public function listAutomations($auth)
    {
        $crm = new Crm();
        $endPoint = 'automations';  // All automations
        $apiUrl = $auth['apiUrl'];
        $apiUrl = "$apiUrl/api/3/$endPoint";
        $body = null;
        $method = 'GET';

        return $crm->init($apiUrl, $body, $method, $auth);
    }

    public function addContactToAutomation($auth, $body)
    {
        $crm = new Crm();
        $endPoint = 'contactAutomations';
        $apiUrl = $auth['apiUrl'];
        $apiUrl = "$apiUrl/api/3/$endPoint";
        $method = 'POST';

        return $crm->init($apiUrl, $body, $method, $auth);
    }

    public function removeContactFromAutomation($auth, $id)
    {
        $crm = new Crm();
        $endPoint = "contactAutomations/$id";
        $apiUrl = $auth['apiUrl'];
        $apiUrl = "$apiUrl/api/3/$endPoint";
        $body = null;
        $method = 'DELETE';

        return $crm->init($apiUrl, $body, $method, $auth, $id);
    }

    public function listAllAutomationsForContact($auth, $id)
    {
        $crm = new Crm();
        $endPoint = "contacts/$id/automationEntryCounts";
        $apiUrl = $auth['apiUrl'];
        $apiUrl = "$apiUrl/api/3/$endPoint";
        $body = null;
        $method = 'GET';

        return $crm->init($apiUrl, $body, $method, $auth);
    }

    public function contactAndAutomationLinking($auth)
    {
        $crm = new Crm();
        $endPoint = 'contactAutomations';  // Automations Link With Contact
        $apiUrl = $auth['apiUrl'];
        $apiUrl = "$apiUrl/api/3/$endPoint";
        $body = null;
        $method = 'GET';

        // In JSON Response: Identify Based On Contact Id (Actual Contact) & SeriesId (Automation Id) 
        // This Will Give A Contact Automation Id, Linking Id
        // In Delete Request, Pass This Id, To Remove A Contact From An Automation

        return $crm->init($apiUrl, $body, $method, $auth);
    }
}