<?php
namespace App\Services;

use GuzzleHttp\Client;

class SteamApiService {

    protected $client;

    public function __construct(Client $client) {
        $this ->client = $client;
    }

    public function fetchData() {
        try {
            //TODO: Implement url using enum
            $response = $this->client->request('GET', 'url');
        }
        catch(\Exception $e) {

        }
    }

}
