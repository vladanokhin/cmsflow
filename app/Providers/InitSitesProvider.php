<?php

namespace App\Providers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Schema;
use App\Models\Site;


class InitSitesProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // The first need create sites links
        // ln -s ~/sites/ storage/app/
        $pathToSites = Storage::path('sites');

        if (File::exists($pathToSites) && !File::isEmptyDirectory($pathToSites) &&
            Schema::hasTable('sites'))
        {
            $listSites = File::directories($pathToSites);
            foreach ($listSites as $sitePath) {
                Site::withTrashed()
                    ->firstOrCreate(['name' => pathinfo($sitePath, PATHINFO_BASENAME)]);
            }

        }
        else {
            Log::warning('[InitSitesProvider] Unable to initialize site list');
        }
    }
}
