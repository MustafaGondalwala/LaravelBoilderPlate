<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\AdminService;

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
            $current_user = $request->user();
            $data = Question::with(['subject', 'details', 'attachment'])->latest();
            if ($request->title != '') {
                $data->where('title', 'like', '%'.$request->title.'%');
            }
            if ($request->subject_id != '') {
                $data->where('subject_id', $request->subject_id);
            }

            return DataTables::of($data)
                    ->addColumn('action', function ($value) {
                        $editRoute = route('admin.question.add', ['question' => encrypt_param($value->id)]);
                        $deleteRoute = route('admin.question.delete', ['question' => encrypt_param($value->id)]);

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
                    ->addColumn('subject', function ($row) {
                        return @$row->subject->name;
                    })
                    ->addColumn('isQCDone', function ($row) {
                        return @$row->details->isQCDone == 1 ? 'Yes' : 'No';
                    })
                    ->addColumn('comment', function ($row) {
                        return @$row->details->comment;
                    })
                    ->rawColumns(['action', 'addColumn'])
                    ->make(true);
        }
        if ($request->isMethod('GET')) {
            $subjects = SubjectMaster::where(['status' => 1])->get();

            return view('admin.question.list', compact('subjects'));
        }
    }
}
