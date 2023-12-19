<?php

namespace App\Enums;

enum SteamApiUrl: string
{
    case API_STEAM_BASE_URL = 'https://api.steampowered.com/ISteamApps/GetAppList/v2/';
    case STORE_STEAM_BASE_URL = 'https://store.steampowered.com/api/appdetails?appids=';
}
