<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuConroller extends Controller
{
    public function services(){
        return view('menu.services');
    }
    public function about(){
        return view('menu.about-us');
    }
    public function faq(){
        return view('menu.faq');
    }
    public function contact(){
        return view('menu.contact');
    }
    public function terms(){
        return view('menu.terms');
    }
}
