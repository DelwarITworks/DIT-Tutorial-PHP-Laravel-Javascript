<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\tutorial;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth' ,'verified']);
    }
    public function index()
    {
        $tutorials = tutorial::all();
        return view('admin.index',compact('tutorials'));
    }
}
