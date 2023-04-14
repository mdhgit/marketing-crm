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
        $apiUrl = $auth['apiUrl'];
        $apiUrl = "$apiUrl/api/3/$endPoint";
        $body = null;
        $method = 'GET';

        return $crm->init($apiUrl, $body, $method, $auth);
    }

    public function filterContacts($auth, $endPoint)
    {
        $crm = new Crm();
        // $endPoint = 'contacts';
        $apiUrl = $auth['apiUrl'];
        $apiUrl = "$apiUrl/api/3/$endPoint";
        $body = null;
        $method = 'GET';

        return $crm->init($apiUrl, $body, $method, $auth);
    }

    public function createContact($auth, $body)
    {
        $crm = new Crm();
        $endPoint = 'contacts';
        $apiUrl = $auth['apiUrl'];
        $apiUrl = "$apiUrl/api/3/$endPoint";
        $method = 'POST';

        return $crm->init($apiUrl, $body, $method, $auth);
    }

    public function updateContact($auth, $body, $id)
    {
        $crm = new Crm();
        $endPoint = "contacts/$id";
        $apiUrl = $auth['apiUrl'];
        $apiUrl = "$apiUrl/api/3/$endPoint";
        $method = 'PUT';

        return $crm->init($apiUrl, $body, $method, $auth, $id);
    }

    public function deleteContact($auth, $id)
    {
        $crm = new Crm();
        $endPoint = "contacts/$id";
        $apiUrl = $auth['apiUrl'];
        $apiUrl = "$apiUrl/api/3/$endPoint";
        $body = null;
        $method = 'DELETE';

        return $crm->init($apiUrl, $body, $method, $auth, $id);
    }

    public function addCustomField($auth, $body)
    {
        $crm = new Crm();
        $endPoint = "fieldValues";
        $apiUrl = $auth['apiUrl'];
        $apiUrl = "$apiUrl/api/3/$endPoint";
        $method = 'POST';

        return $crm->init($apiUrl, $body, $method, $auth);
    }

    public function updateCustomField($auth, $body, $fieldId)
    {
        $crm = new Crm();
        $endPoint = "fieldValues/$fieldId";
        $apiUrl = $auth['apiUrl'];
        $apiUrl = "$apiUrl/api/3/$endPoint";
        $method = 'PUT';

        return $crm->init($apiUrl, $body, $method, $auth);
    }

    public function addContactToList($auth, $body)
    {
        $crm = new Crm();
        $endPoint = "contactLists";
        $apiUrl = $auth['apiUrl'];
        $apiUrl = "$apiUrl/api/3/$endPoint";
        $method = 'POST';

        return $crm->init($apiUrl, $body, $method, $auth);
    }

    public function addTagToContact($auth, $body)
    {
        $crm = new Crm();
        $endPoint = "contactTags";
        $apiUrl = $auth['apiUrl'];
        $apiUrl = "$apiUrl/api/3/$endPoint";
        $method = 'POST';

        return $crm->init($apiUrl, $body, $method, $auth);
    }

    public function getConatctTagAssociation($auth, $body, $contactId, $tagName)
    {
        $associationId = null;

        $crm = new Crm();
        $endPoint = "contactTags";
        $apiUrl = $auth['apiUrl'];
        $apiUrl = "$apiUrl/api/3/contacts/$contactId/$endPoint";
        $method = 'GET';

        $contactTagAssociation = $crm->init($apiUrl, $body, $method, $auth);
        $contactTagAssociation = $contactTagAssociation->getData()->response->contactTags;

        $tagId = null;
        $tag = new Tag;
        $tagResponse = $tag->searchTag($auth, $tagName);
        $tagId = $tagResponse->getData()->response->tags[0]->id;

        foreach($contactTagAssociation as $association) {

            if($association->tag == $tagId) {
                $associationId = $association->id;
            }
        }

        return $associationId;
    }

    public function removeTagToContact($auth, $body, $contactId, $tagName)
    {
        $crm = new Crm();
        $endPoint = "contactTags";
        $apiUrl = $auth['apiUrl'];
        $associationId = $this->getConatctTagAssociation($auth, $body, $contactId, $tagName);

        $apiUrl = "$apiUrl/api/3/$endPoint/$associationId";
        $method = 'DELETE';

        return $crm->init($apiUrl, $body, $method, $auth);
    }
}