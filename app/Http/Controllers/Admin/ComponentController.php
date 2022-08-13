<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ComponentStore;
use App\Models\Admin;
use App\Models\Component;
use App\Services\Admin\ComponentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComponentController extends Controller
{
    protected $componentService;

    protected $admin;

    public function __construct(ComponentService $componentService)
    {
        $this->componentService = $componentService;
        $this->middleware(function ($request, $next) {
            $this->admin = auth()->guard('admin')->user();

            return $next($request);
        });
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            return $this->componentService->datatable($request);
        }
        if ($request->isMethod('GET')) {
            return view('admin.component.list');
        }
    }

    public function add(Request $request, Component $component)
    {
        $component->load('items');

        return view('admin.component.add', compact('component'));
    }

    public function store(ComponentStore $request, Component $component)
    {
        try {
            logger()->info('Component Add/Edit', ['component' => $component->toArray()]);

            $addData = $request->only([
                'name',
                'html',
                'status',
            ]);

            DB::beginTransaction();
            $this->componentService->addUpdate($this->admin, $component, $addData, $request->type);

            DB::commit();

            return redirect()->route('admin.component.list')->with('message', 'Component Updated Successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);

            logger()->error('Component Add/Edit Error', ['admin' => $this->admin->toArray(), $request->all()]);

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
