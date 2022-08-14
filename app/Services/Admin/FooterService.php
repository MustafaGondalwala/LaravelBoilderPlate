<?php

namespace App\Services\Admin;

use App\Models\Footer;
use App\Models\FooterItem;

/**
 * Class FooterService.
 */
class FooterService
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
            
            if($type_item == "script_file"){
                $path = '/'.custom('username').'/header/'.$type_item.'/';
                $store_value = "";
                if($value1_item != null){
                    $store_value = uploadFile($value1_item, $path);
                }
            }else{
                $store_value = $value_item;
            }

            $addData = [
                'sr_no' => $no,
                'type' => $type_item,
                'value' => $store_value,
                'value1' => $value1_item,
                'status' => $status_item,
                'page_id' => $page_id,
            ];
            if ($page_id == null) {
                $checkSrNoExists = Footer::where(['sr_no' => $no])->exists();
                Footer::updateOrCreate(
                    ['sr_no' => $checkSrNoExists == true ? $no : null],
                    $addData
                );
            } else {
                $checkSrNoExists = FooterItem::where(['sr_no' => $no])->exists();
                FooterItem::updateOrCreate(
                    ['sr_no' => $checkSrNoExists == true ? $no : null],
                    $addData
                );
            }
        }
    }

    public function get()
    {
        return Footer::orderBy('sr_no')->get();
    }
}
