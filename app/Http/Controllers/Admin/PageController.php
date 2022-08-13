<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use App\Services\Admin\PageService;
use App\Http\Requests\Admin\PageStore;
use App\Services\ComponentService;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    protected $pageService;
    protected $componentService;

    protected $admin;

    public function __construct(PageService $pageService, ComponentService $componentService)
    {
        $this->pageService = $pageService;
        $this->componentService = $componentService;
        $this->middleware(function ($request, $next) {
            $this->admin = auth()->guard('admin')->user();

            return $next($request);
        });
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            return $this->pageService->datatable($request);
        }
        if ($request->isMethod('GET')) {
            return view('admin.page.list');
        }
    }

    public function add(Request $request, Page $page)
    {
        $page->load([
            'components',
            'headerItem',
            'footerItem'
        ]);
        $components = $this->componentService->getList();
        return view('admin.page.add', compact('page','components'));
    }
    public function store(PageStore $request, Page $page)
    {
        try {
            logger()->info('Page Add/Edit', ['page' => $page->toArray()]);

            DB::beginTransaction();

            $addData = $request->only([
                'name',
                'status'
            ]);

            $this->pageService->addUpdate($page, $addData, $request->component,$request->header_item, $request->footer_item);

            DB::commit();

            return redirect()->route('admin.page.list')->with('message', 'Page Updated Successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);

            logger()->error('Page Add/Edit Error', ['admin' => $this->admin->toArray(), $request->all()]);

            return back()->with('message', 'Error Occured');
        }
    }

    public function delete(Admin $admin)
    {
        try {
            logger()->info('Admin Delete', ['admin' => $admin->toArray()]);

            $admin->delete();

            return redirect()->route('admin.list')->with('message', 'Admin Deleted Successfully');
        } catch (\Exception $e) {
            logger()->error('Admin Delete Error', ['admin' => $admin->toArray()]);

            return back()->with('message', 'Error Occured');
        }
    }
}
