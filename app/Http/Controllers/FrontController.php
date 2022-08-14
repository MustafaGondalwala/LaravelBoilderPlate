<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\FooterService;
use App\Services\HeaderService;
use App\Services\LinkService;
use App\Services\PageService;
use Error;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    protected $pageService;
    protected $linkService;
    protected $headerService;
    protected $footerService;
    public function __construct(PageService $pageService, LinkService $linkService, HeaderService $headerService, FooterService $footerService)
    {
        $this->pageService = $pageService;
        $this->linkService = $linkService;
        $this->headerService = $headerService;
        $this->footerService = $footerService;
    }

    public function index(Request $request, $page){
        try {
            logger()->info('Page View', ['page' => $page]);
            $page_id = $this->linkService->getPageIdByValue($page);

            if($page_id == null){
                throw new Error("Not Able to Find Page");
            }
            $page = $this->pageService->getById($page_id);

            $default_header = $this->headerService->default();
            $default_footer = $this->footerService->default();

            return view('front.render', compact('default_header','default_footer','page'));
        } catch (\Exception $e) {
            dd($e);
            logger()->error('Page View Error', [$request->all()]);
            return back()->with('message', 'Error Occured');
        }
    }
}
