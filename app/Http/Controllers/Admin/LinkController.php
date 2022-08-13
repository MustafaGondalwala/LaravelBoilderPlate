<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LinkStore;
use App\Services\LinkService;
use App\Services\Admin\LinkService as AdminLinkService;
use App\Services\PageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LinkController extends Controller
{
    protected $linkService;
    protected $adminLinkService;
    protected $pageService;

    protected $admin;
    public function __construct(LinkService $linkService, PageService $pageService, AdminLinkService $adminLinkService)
    {
        $this->linkService = $linkService;
        $this->pageService = $pageService;
        $this->adminLinkService = $adminLinkService;
        $this->middleware(function ($request, $next) {
            $this->admin = auth()->guard('admin')->user();

            return $next($request);
        });
    }
    public function add(Request $request)
    {
        $link_items = $this->adminLinkService->get();
        $pages = $this->pageService->get();
        return view('admin.link.add', compact('link_items','pages'));
    }
    public function store(LinkStore $request)
    {
        try {
            logger()->info('Page Link Add/Edit');

            DB::beginTransaction();

            $this->adminLinkService->addUpdate($request->link_item);

            DB::commit();

            return redirect()->route('admin.link.add')->with('message', 'Page Link Updated Successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);

            logger()->error('Page Link Add/Edit Error', ['admin' => $this->admin->toArray(), $request->all()]);

            return back()->with('message', 'Error Occured');
        }
    }
}
