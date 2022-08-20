<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(Request $request){
        return view('guest.index');
    }
    public function about(Request $request){
        return view('guest.about');
    }
    public function webdesign(Request $request){
        return view('guest.webdesign');
    }

    public function webdevelopment(Request $request){
        return view('guest.webdevelopment');
    }
    public function digitalmarketing(Request $request){
        return view('guest.digitalmarketing');
    }
    public function graphicdesigning(Request $request){
        return view('guest.graphicdesigning');
    }
    public function blog(Request $request){
        return view('guest.blog');
    }
    public function contact(Request $request){
        return view('guest.contact');
    }
    

    
    
}
