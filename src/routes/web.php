<?php

use Mdh\MarketingCrm\Controllers\CrmController;
use Illuminate\Support\Facades\Route;

# Contacts
Route::get('contacts', [CrmController::class, 'getAllContacts']);
Route::post('contacts', [CrmController::class, 'createContact']);
Route::put('contacts/{id}', [CrmController::class, 'updateContact']);
Route::delete('contacts/{id}', [CrmController::class, 'deleteContact']);
Route::post('contacts/add-custom-field', [CrmController::class, 'addCustomField']);
Route::put('contacts/add-custom-field/{fieldId}', [CrmController::class, 'updateCustomField']);
Route::post('contacts/add-contact-to-list', [CrmController::class, 'addContactToList']);
Route::post('contacts/add-tag-to-contact', [CrmController::class, 'addTagToContact']);

# Automations
Route::get('automations', [CrmController::class, 'listAutomations']);
Route::post('add-contact-to-automation', [CrmController::class, 'addContactToAutomation']);
Route::delete('remove-contact-from-automation/{id}', [CrmController::class, 'removeContactFromAutomation']);
Route::get('list-automations-for-contact/{id}', [CrmController::class, 'listAllAutomationsForContact']);
Route::get('contact-automations-linkings', [CrmController::class, 'contactAndAutomationLinking']);

# Tags
Route::get('tags', [CrmController::class, 'getAllTags']);
Route::post('tags', [CrmController::class, 'createTag']);
Route::put('tags/{id}', [CrmController::class, 'updateTag']);
Route::delete('tags/{id}', [CrmController::class, 'deleteTag']);

# Lists
Route::get('lists', [CrmController::class, 'getAllLists']);
Route::post('lists', [CrmController::class, 'createList']);
Route::delete('lists/{id}', [CrmController::class, 'deleteList']);

# Fields
Route::get('fields', [CrmController::class, 'getAllFields']);
Route::post('fields', [CrmController::class, 'createfield']);
Route::put('fields/{id}', [CrmController::class, 'updatefield']);
Route::delete('fields/{id}', [CrmController::class, 'deletefield']);