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
            $responseSteam = '';
            //Json Decode
            $data = json_decode($response->getBody(), true);

            if (isset($data['applist']['apps'])  && is_array($data['applist']['apps'])) {
                $requestCount = 0;
                foreach ($data['applist']['apps'] as $app) {
                    if (isset($app['appid'])) {
                        $responseSteam = $client->request('GET', SteamApiUrl::STORE_STEAM_BASE_URL->value . $app['appid']);
                        $data2 = json_decode($responseSteam->getBody(), true);
                        print_r($data2);
                        echo PHP_EOL;
                        sleep(1.5);

                        if ($requestCount >= 200) {
                            break;
                        }
                    }
                }
            }
        } catch (\Exception $e) {
            print_r($e);
        }
    }
}
