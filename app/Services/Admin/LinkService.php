<?php

namespace App\Services\Admin;

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

    public function addUpdate(array $store)
    {
        extract($store, EXTR_PREFIX_SAME, 'dup');
        foreach ($value as $key => $v) {
            $page_id_item = isset($page_id[$key]) ? $page_id[$key] : null;
            $status_item = isset($status[$key]) ? $status[$key] : null;

            $addData = [
                'value' => $v,
                'page_id' => $page_id_item,
                'status' => $status_item,
            ];
            $checkValueExists = PageLink::where(['value' => $v])->exists();
            PageLink::updateOrCreate(
                [
                    'value' => $checkValueExists == true ? $v : null,
                ],
                $addData
            );
        }
    }
}
