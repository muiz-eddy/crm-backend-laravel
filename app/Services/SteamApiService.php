<?php

namespace App\Services;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use App\Enums\SteamApiUrl;
use App\Models\Steam_Games;

class SteamApiService extends Command
{
    protected $client;
    protected $signature = 'test:steamapi';

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function fetchData()
    {
        try {
            //TODO: Implement url using enum
            $response = $this->client->request('GET', SteamApiUrl::API_STEAM_BASE_URL . SteamApiUrl::GET_STEAM_ID);

            //Json Decode
            $data = json_decode($response->getBody(), true);
            dd($data);
        } catch (\Exception $e) {
        }
    }

    protected function saveData($data)
    {
        Steam_Games::create(
            []
        );
    }
}
