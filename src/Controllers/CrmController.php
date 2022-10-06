<?php

namespace Mdh\MarketingCrm\Controllers;

use Illuminate\Http\Request;
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

    public function deleteContact(Request $request, Contact $contact, $id)
    {
        $res = $contact->deleteContact($this->auth, $id);

        return $res;
    }


    ### Contacts CRUD ###

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

    public function updateList(Request $request, Lists $list, $id)
    {
        $data = $request->all();

        $res = $list->updateList($this->auth, $data, $id);

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
}