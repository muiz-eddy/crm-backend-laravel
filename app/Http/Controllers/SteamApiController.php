<?php

namespace App\Http\Controllers;

use App\Services\SteamApiService;

class SteamApiController extends Controller
{
    public function store(SteamApiService $steamApiService)
    {
        $steamApiService->fetchAndStore();

        return redirect()->back()->with('success', 'Steam data fetched');

        //TODO: Implement Routing
    }
}
