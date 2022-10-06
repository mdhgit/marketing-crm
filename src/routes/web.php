<?php

use Mdh\MarketingCrm\Controllers;
use Mdh\MarketingCrm\Controllers\CrmController;
use Illuminate\Support\Facades\Route;

Route::post('create-contact', [CrmController::class, 'createContact']);