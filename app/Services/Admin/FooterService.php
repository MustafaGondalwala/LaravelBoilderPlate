<?php

namespace App\Services\Admin;

use App\Models\Footer;
use App\Models\FooterItem;

/**
 * Class FooterService.
 */
class FooterService
{

    public static function addUpdateType(array $store, int|null $page_id = null):void
    {
        extract($store, EXTR_PREFIX_SAME, 'dup');
        foreach ($sr_no as $key => $no) {
            $type_item = $type[$key];
            $value_item = isset($value[$key]) ? $value[$key] : null;
            $value1_item = isset($value1[$key]) ? $value1[$key] : null;
            $status_item = isset($status[$key]) ? $status[$key] : null;

            if($no == null){
                continue;
            }

            $addData = [
                'sr_no' => $no,
                'type' => $type_item,
                'value' => $value_item,
                'value1' => $value1_item,
                'status' => $status_item,
                'page_id' => $page_id
            ];
            if($page_id == null){
                Footer::create(
                    $addData
                );
            }else{
                FooterItem::create(
                    $addData
                );
                $checkSrNoExists = FooterItem::where(['sr_no' => $no])->exists();
                FooterItem::updateOrCreate(
                    ['sr_no' => $checkSrNoExists == true ? $sr_no : null],
                    $addData
                );
            }

        }
    }
    function get(){
        return FooterItem::whereNull('page_id')->orderBy('sr_no')->get();
    }
}

