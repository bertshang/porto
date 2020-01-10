<?php

namespace Bertshang\Porto\Abstracts\Providers;

use Bertshang\Porto\Loaders\AliasesLoaderTrait;
use Bertshang\Porto\Loaders\ProvidersLoaderTrait;
use Illuminate\Support\ServiceProvider as LaravelAppServiceProvider;

/**
 * Class MainProvider
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
abstract class MainProvider extends LaravelAppServiceProvider
{

    use ProvidersLoaderTrait;
    use AliasesLoaderTrait;

    /**
     * Perform post-registration booting of services.
     */
    public function boot()
    {
        $this->loadServiceProviders();
        $this->loadAliases();
    }

    /**
     * Register anything in the container.
     */
    public function register()
    {

    }

}
