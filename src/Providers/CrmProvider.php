<?php

namespace Mdh\MarketingCrm\Providers;

use Illuminate\Support\ServiceProvider;

class CrmProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
    }
}