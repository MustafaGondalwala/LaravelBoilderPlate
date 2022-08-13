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
}
