<?php

namespace App\Services;

use GuzzleHttp\Client;
use App\Enums\SteamApiUrl;

class SteamApiService
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function fetchData()
    {
        try {
            $response = $this->client->request('GET', SteamApiUrl::API_STEAM_BASE_URL->value);
            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            var_dump($e);
        }
    }

    public function fetchAppDetails($appId)
    {
        $response = $this->client->request('GET', SteamApiUrl::STORE_STEAM_BASE_URL->value . $appId);
        return json_decode($response->getBody(), true);
    }

    public function fetchAndStore()
    {

        $appList = $this->fetchData();

        if (isset($appList['applist']['apps']) && is_array($appList['applist']['apps'])) {
            $requestCount = 0;

            foreach ($appList['applist']['apps'] as $app) {
                if ($requestCount >= 200) {
                    break;
                }
                $details = $this->fetchAppDetails($app['appid']);

                //TODO: Save to database, make model fillable with right column
                //
                //

                $requestCount++;
                sleep(1.5);
            }
        }
    }
}
