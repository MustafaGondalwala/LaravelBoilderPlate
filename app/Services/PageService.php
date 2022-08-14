<?php

namespace App\Services;

use App\Models\Page;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class PageService.
 */
class PageService
{
    public function get():Collection
    {
        return Page::active()->get();
    }
    public function getById(int $page_id):Page{
        return cache()->remember('get-page-'.$page_id, custom('cache_seconds'), function () use($page_id){
            return Page::query()->
                active()->
                find($page_id)->
                with([
                    'components',
                    'headerItem',
                    'footerItem'
                ])->
                firstOrFail(['id']);
        });
    }
    public function searchByValue(string $search):Page{
        return Page::where('value','like',$search)->first();
    }
}
