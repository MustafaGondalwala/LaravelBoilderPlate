<?php

namespace App\Services\Admin;

use App\Models\Admin;
use App\Models\Component;
use Yajra\DataTables\DataTables;

/**
 * Class ComponentService.
 */
class ComponentService
{
    public function datatable($request)
    {
        $data = Component::latest();
        if ($request->name != '') {
            $data->where('name', 'like', '%'.$request->name.'%');
        }

        return DataTables::of($data)
            ->addColumn('action', function ($value) {
                $editRoute = route('admin.component.add', ['component' => $value->encrypted_id]);
                $deleteRoute = route('admin.component.delete', ['component' => $value->encrypted_id]);

                $editButton = '<a class="btn btn-sm btn-warning" href="'.$editRoute.'">Edit</a>';
                $deleteForm = '<form method="POST" action="'.$deleteRoute.'">
                            <input type="hidden" name="_method" value="delete" />
                            <input type="hidden" name="_token" value="'.csrf_token().'">
                            <div class="form-group">
                                <input type="submit" class="btn btn-sm btn-danger" value="Delete" />
                            </div>
                        </form>';

                $buttons = $editButton.$deleteForm;

                return $buttons;
            })
            ->addColumn('status', function ($row) {
                return @$row->status == 1 ? 'Active' : 'InActive';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function addUpdateType(Component $component, array $store)
    {
        extract($store, EXTR_PREFIX_SAME, 'dup');
        foreach ($link_name as $key => $name) {
            $type_item = $type[$key];
            $status_item = $status[$key];
            $value_item = isset($value[$key]) ? $value[$key] : null;
            $value1_item = isset($value1[$key]) ? $value1[$key] : null;
            $status_value = isset($status[$key]) ? $status[$key] : null;

            if($name == null){
                continue;
            }
            if($type_item == "file" || $type_item == "image" || $type_item ==  "video"){
                $path = '/'.custom('username').'/component/'.$type_item.'/';
                $store_value = "";
                
                if (filter_var($value_item, FILTER_VALIDATE_URL)) { 

                    $store_value = uploadUrlToStorage($value_item, $path);

                }else if($value1_item != null){
                    $store_value = uploadFile($value1_item, $path);
                }
            }else{
                $store_value = $value_item;
            }

            $addData = [
                'name' => $name,
                'status' => $status_item,
                'type' => $type_item,
                'value' => $store_value,
                'value1' => null,
                'status' => $status_value
            ];
            $checkNameExists = $component->items()->where(['name' => $name])->exists();
            $component->items()->updateOrCreate(
                [
                    'name' => $checkNameExists == true ? $name : null,
                ],
                $addData
            );
        }
    }

    public function addUpdate(Admin $admin, Component $component, array $addData, array $type): void
    {
        $updateComponent = Component::updateOrCreate(
            ['id' => $component->exists == true ? $component->id : null],
            $addData
        );

        self::addUpdateType($updateComponent, $type);
    }
}
