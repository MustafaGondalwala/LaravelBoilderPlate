<?php

namespace App\Services;

use App\Models\Page;

/**
 * Class PageService.
 */
class PageService
{
    public function get()
    {
        return Page::active()->get();
    }
}
