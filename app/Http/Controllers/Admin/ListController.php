<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\AdminService;
use Illuminate\Http\Request;

class ListController extends Controller
{
    protected $adminService;

    protected $admin;

    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
        $this->middleware(function ($request, $next) {
            $this->admin = auth()->guard('admin')->user();

            return $next($request);
        });
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            return $this->adminService->datatable($request);
        }
        if ($request->isMethod('GET')) {
            return view('admin.auth.list');
        }
    }
}
