<?php

namespace App\Services\Admin;

use App\Models\Header;
use App\Models\HeaderItem;

/**
 * Class HeaderService.
 */
class HeaderService
{
    public static function addUpdateType(array $store, int|null $page_id = null): void
    {
        extract($store, EXTR_PREFIX_SAME, 'dup');
        foreach ($sr_no as $key => $no) {
            $type_item = $type[$key];
            $value_item = isset($value[$key]) ? $value[$key] : null;
            $value1_item = isset($value1[$key]) ? $value1[$key] : null;
            $status_item = isset($status[$key]) ? $status[$key] : null;

            if ($no == null) {
                continue;
            }
            $addData = [
                'sr_no' => $no,
                'type' => $type_item,
                'value' => $value_item,
                'value1' => $value1_item,
                'status' => $status_item,
                'page_id' => $page_id,
            ];
            if ($page_id == null) {
                Header::create(
                    $addData
                );
            } else {
                $checkSrNoExists = HeaderItem::where(['sr_no' => $no])->exists();
                HeaderItem::updateOrCreate(
                    ['sr_no' => $checkSrNoExists == true ? $sr_no : null],
                    $addData
                );
            }
        }
    }

    public function get()
    {
        return Header::orderBy('sr_no')->get();
    }
}
