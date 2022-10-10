<?php

namespace Mdh\MarketingCrm\Features;

use Illuminate\Http\Request;
use Mdh\MarketingCrm\Crm;

class Contact
{
    public function getAllContacts($auth)
    {
        $crm = new Crm();
        $endPoint = 'contacts';
        $body = null;
        $method = 'GET';

        return $crm->init($endPoint, $body, $method, $auth);
    }

    public function createContact($auth, $body)
    {
        $crm = new Crm();
        $endPoint = 'contacts';
        $method = 'POST';

        return $crm->init($endPoint, $body, $method, $auth);
    }

    public function updateContact($auth, $body, $id)
    {
        $crm = new Crm();
        $endPoint = "contacts/$id";
        $method = 'PUT';

        return $crm->init($endPoint, $body, $method, $auth, $id);
    }

    public function deleteContact($auth, $id)
    {
        $crm = new Crm();
        $endPoint = "contacts/$id";
        $body = null;
        $method = 'DELETE';

        return $crm->init($endPoint, $body, $method, $auth, $id);
    }

    public function addCustomField($auth, $body)
    {
        $crm = new Crm();
        $endPoint = "fieldValues";
        $method = 'POST';

        return $crm->init($endPoint, $body, $method, $auth);
    }

    public function updateCustomField($auth, $body, $fieldId)
    {
        $crm = new Crm();
        $endPoint = "fieldValues/$fieldId";
        $method = 'PUT';

        return $crm->init($endPoint, $body, $method, $auth);
    }

    public function addContactToList($auth, $body)
    {
        $crm = new Crm();
        $endPoint = "contactLists";
        $method = 'POST';

        return $crm->init($endPoint, $body, $method, $auth);
    }

    public function addTagToContact($auth, $body)
    {
        $crm = new Crm();
        $endPoint = "contactTags";
        $method = 'POST';

        return $crm->init($endPoint, $body, $method, $auth);
    }
}