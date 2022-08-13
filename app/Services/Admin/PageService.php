<?php

namespace App\Services\Admin;

use App\Models\Page;
use Yajra\DataTables\Facades\DataTables;

/**
 * Class PageService.
 */
class PageService
{
    public function datatable($request)
    {
        $data = Page::withCount(['components' => function ($query) {
            return $query->active();
        }])->latest();
        if ($request->name != '') {
            $data->where('name', 'like', '%'.$request->name.'%');
        }

        return DataTables::of($data)
            ->addColumn('action', function ($value) {
                $editRoute = route('admin.page.add', ['page' => $value->encrypted_id]);
                $deleteRoute = route('admin.page.delete', ['page' => $value->encrypted_id]);

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

            ->addColumn('component_count', function ($row) {
                return @$row->components_count;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function addUpdateComponent(Page $page, array $store)
    {
        extract($store, EXTR_PREFIX_SAME, 'dup');
        foreach ($sr_no as $key => $no) {
            $component_id_item = isset($component_id[$key]) ? $component_id[$key] : null;
            $status_item = isset($status[$key]) ? $status[$key] : null;

            $addData = [
                'sr_no' => $no,
                'component_id' => $component_id_item,
                'status' => $status_item,
            ];
            $checkNameExists = $page->components()->where(['sr_no' => $no])->exists();
            $page->components()->updateOrCreate(
                [
                    'sr_no' => $checkNameExists == true ? $no : null,
                ],
                $addData
            );
        }
    }

    public function addUpdate(Page $page, array $addData, array $components, array $header_item, array $footer_item): void
    {
        $updatePage = Page::updateOrCreate(
            ['id' => $page->exists == true ? $page->id : null],
            $addData
        );

        self::addUpdateComponent($updatePage, $components);
        HeaderService::addUpdateType($header_item, $page->id);
        FooterService::addUpdateType($footer_item, $page->id);
    }
}
