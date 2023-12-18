<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Enums\SteamApiUrl;
use GuzzleHttp\Client;


class TestSteamApi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test-steam-api';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            $client = new Client();
            //TODO: Implement url using enum
            $response = $client->request('GET', SteamApiUrl::API_STEAM_BASE_URL->value);

            //Json Decode
            $data = json_decode($response->getBody(), true);

            if (isset($data['applist']['apps'])  && is_array($data['applist']['apps'])) {
                foreach ($data['applist']['apps'] as $app) {
                    if (isset($app['appid'])) {
                        print_r($app['appid']);
                        echo PHP_EOL;
                    }
                }
            }
        } catch (\Exception $e) {
        }
    }
}
