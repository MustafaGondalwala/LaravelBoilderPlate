<?php

namespace App\Services;

use App\Models\PageLink;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class LinkService.
 */
class LinkService
{
    public function get(): Collection
    {
        return PageLink::withPages()->latest()->get();
    }
    function getPageIdByValue(string $search): int|null{
        return cache()->remember('get-page-id-'.$search, custom('cache_seconds'), function () use($search){
            return PageLink::query()->
            where('value','like',$search)->
            value('page_id');
        });
    }
}
