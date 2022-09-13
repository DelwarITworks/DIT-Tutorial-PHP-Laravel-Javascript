<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\tutorial;
use Auth;

class PublicController extends Controller
{
    public function index()
    {
        $tutorials = tutorial::where('status',1)->latest()->get();
        return view('home',compact('tutorials'));
    }
    public function tutorialSingle($slug)
    {
        $tutorial = tutorial::where('slug',$slug)->first();
        return view('tutorial.tutorial_detail',compact('tutorial'));
    }
    public function logout()
    {
        return Auth::logout();
    }
}
