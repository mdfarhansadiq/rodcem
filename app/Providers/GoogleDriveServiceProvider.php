<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class GoogleDriveServiceProvider extends ServiceProvider
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
         \Storage::extend('google', function ($app, $config) {
        // $client = new \Google_Client();
        // dd($client);
        // dd($client['clientId']);
        // $client->setClientId($config['clientId']);
        // $client->setClientSecret($config['clientSecret']);
        // $client->refreshToken($config['refreshToken']);
        // $service = new \Google_Service_Drive($client);
        // $adapter = new \Hypweb\Flysystem\GoogleDrive\GoogleDriveAdapter($service, $config['folderId']);


            $client = new \Google\Client();
            // dd($client);
            $client->setClientId([$config['clientId']]);
            $client->setClientSecret($config['clientSecret']);
            $client->refreshToken($config['refreshToken']);
            $client->setApplicationName('Rodcem Backup');

            $service = new \Google\Service\Drive($client);

            // variant 1
            $adapter = new \Masbug\Flysystem\GoogleDriveAdapter($service, 'My_App_Root');
        return new \League\Flysystem\Filesystem($adapter);
    });
    }
}
