<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManageController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        return view('admin.dashboard.home');
    }
    public function basic(){

        return view ('admin.manage.basic');
    }
    public function contact(){

        return view ('admin.manage.contact');
    }
    public function socialMedia(){

        return view ('admin.manage.socialMedia');
    }
}
