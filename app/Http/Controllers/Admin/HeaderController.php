<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HeaderItemStore;
use App\Services\Admin\HeaderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HeaderController extends Controller
{
    public function __construct(HeaderService $headerService)
    {
        $this->headerService = $headerService;
        $this->middleware(function ($request, $next) {
            $this->admin = auth()->guard('admin')->user();

            return $next($request);
        });
    }

    public function add(Request $request)
    {
        $header_items = $this->headerService->get();

        return view('admin.header.add', compact('header_items'));
    }

    public function store(HeaderItemStore $request)
    {
        try {
            logger()->info('Header Item Add/Edit');

            DB::beginTransaction();

            $this->headerService->addUpdateType($request->header_item);

            DB::commit();

            return redirect()->route('admin.header.add')->with('message', 'Header Items Updated Successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);

            logger()->error('Header Item Add/Edit Error', ['admin' => $this->admin->toArray(), $request->all()]);

            return back()->with('message', 'Error Occured');
        }
    }
}
