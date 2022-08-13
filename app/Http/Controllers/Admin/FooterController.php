<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FooterItemStore;
use App\Services\Admin\FooterService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FooterController extends Controller
{
    public function __construct(FooterService $footerService)
    {
        $this->footerService = $footerService;
        $this->middleware(function ($request, $next) {
            $this->admin = auth()->guard('admin')->user();

            return $next($request);
        });
    }

    public function add(Request $request)
    {
        $footer_items = $this->footerService->get();

        return view('admin.footer.add', compact('footer_items'));
    }

    public function store(FooterItemStore $request)
    {
        try {
            logger()->info('Footer Item Add/Edit');

            DB::beginTransaction();

            $this->footerService->addUpdateType($request->footer_item);

            DB::commit();

            return redirect()->route('admin.footer.add')->with('message', 'Footer Items Updated Successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);

            logger()->error('Footer Item Add/Edit Error', ['admin' => $this->admin->toArray(), $request->all()]);

            return back()->with('message', 'Error Occured');
        }
    }
}
