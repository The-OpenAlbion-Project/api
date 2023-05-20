<?php

namespace App\Services\AlbionOnlineData;

use Illuminate\Support\Collection;

class AlbionOnlineDataService
{
    public function items(): Collection
    {
        return cache()->remember('aod.items', 60 * 5, function () {
            return collect(json_decode(file_get_contents('https://github.com/ao-data/ao-bin-dumps/raw/master/formatted/items.json'), true));
        });
    }
}
