<?php

namespace Mdh\MarketingCrm\Controllers;

use Illuminate\Http\Request;
use Mdh\MarketingCrm\Features\Automation;
use Mdh\MarketingCrm\Features\Contact;
use Mdh\MarketingCrm\Features\Field;
use Mdh\MarketingCrm\Features\Lists;
use Mdh\MarketingCrm\Features\Tag;

class CrmController
{
    private $auth;

    public function __construct()
    {
        $apiKey = config('activecampaign.api_key');
        $apiUrl = config('activecampaign.api_url');

        $this->auth = [
            'apiKey' => $apiKey,
            'apiUrl' => $apiUrl
        ];
    }

    ### Contacts CRUD ###

    public function getAllContacts(Contact $contact)
    {
        $res = $contact->getAllContacts($this->auth);

        return $res;
    }

    public function createContact(Request $request, Contact $contact)
    {
        $data = $request->all();

        $res = $contact->createContact($this->auth, $data);

        return $res;
    }

    public function updateContact(Request $request, Contact $contact, $id)
    {
        $data = $request->all();

        $res = $contact->updateContact($this->auth, $data, $id);

        return $res;
    }

    public function deleteContact(Contact $contact, $id)
    {
        $res = $contact->deleteContact($this->auth, $id);

        return $res;
    }

    public function addCustomField(Request $request, Contact $contact)
    {
        $data = $request->all();

        $res = $contact->addCustomField($this->auth, $data);

        return $res;
    }

    public function updateCustomField(Request $request, Contact $contact, $fieldId)
    {
        $data = $request->all();

        $res = $contact->updateCustomField($this->auth, $data, $fieldId);

        return $res;
    }

    public function addContactToList(Request $request, Contact $contact)
    {
        // status: 1 -> Add, status: 2 -> Remove
        $data = $request->all();

        $res = $contact->addContactToList($this->auth, $data);

        return $res;
    }

    public function addTagToContact(Request $request, Contact $contact)
    {
        // status: 1 -> Add, status: 2 -> Remove
        $data = $request->all();

        $res = $contact->addTagToContact($this->auth, $data);

        return $res;
    }


    ### Tags CRUD ###

    public function getAllTags(Tag $tag)
    {
        $res = $tag->getAllTags($this->auth);

        return $res;
    }

    public function createTag(Request $request, Tag $tag)
    {
        $data = $request->all();

        $res = $tag->createTag($this->auth, $data);

        return $res;
    }

    public function updateTag(Request $request, Tag $tag, $id)
    {
        $data = $request->all();

        $res = $tag->updateTag($this->auth, $data, $id);

        return $res;
    }

    public function deleteTag(Tag $tag, $id)
    {
        $res = $tag->deleteTag($this->auth, $id);

        return $res;
    }


    ### Lists CRUD ###

    public function getAllLists(Lists $list)
    {
        $res = $list->getAllLists($this->auth);

        return $res;
    }

    public function createList(Request $request, Lists $list)
    {
        $data = $request->all();

        $res = $list->createList($this->auth, $data);

        return $res;
    }

    public function deleteList(Request $request, Lists $list, $id)
    {
        $res = $list->deleteList($this->auth, $id);

        return $res;
    }


    ### Fields CRUD ###

    public function getAllFields(Field $field)
    {
        $res = $field->getAllFields($this->auth);

        return $res;
    }

    public function createField(Request $request, Field $field)
    {
        $data = $request->all();

        $res = $field->createField($this->auth, $data);

        return $res;
    }

    public function updateField(Request $request, Field $field, $id)
    {
        $data = $request->all();

        $res = $field->updateField($this->auth, $data, $id);

        return $res;
    }

    public function deleteField(Field $field, $id)
    {
        $res = $field->deleteField($this->auth, $id);

        return $res;
    }

    public function listAutomations(Automation $automation)
    {
        $res = $automation->listAutomations($this->auth);

        return $res;
    }

    public function addContactToAutomation(Request $request, Automation $automation)
    {
        $data = $request->all();

        $res = $automation->addContactToAutomation($this->auth, $data);

        return $res;
    }

    public function removeContactFromAutomation(Request $request, Automation $automation, $id)
    {
        $res = $automation->removeContactFromAutomation($this->auth, $id);

        return $res;
    }

    public function listAllAutomationsForContact(Automation $automation, $id)
    {
        $res = $automation->listAllAutomationsForContact($this->auth, $id);

        return $res;
    }

    public function contactAndAutomationLinking(Automation $automation)
    {
        $res = $automation->contactAndAutomationLinking($this->auth);

        return $res;
    }
}