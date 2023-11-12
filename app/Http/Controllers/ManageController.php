<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Basic;
use App\Models\SocialMedia;
use App\Models\Contact;

class ManageController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        return view('admin.dashboard.home');
    }
    public function basic(){
        $data = Basic::where('basic_status',1)->where('basic_id',1)->firstOrfail();
        return view ('admin.manage.basic',compact('data'));
    }
    public function contact(){
        $data = Contact::where('contact_status',1)->where('contact_id',1)->firstOrfail();
        return view ('admin.manage.contact',compact('data'));
    }
    public function socialMedia(){
        $data = SocialMedia::where('socialMedia_status',1)->where('socialMedia_id',1)->firstOrfail();
        return view ('admin.manage.socialMedia',compact('data'));
    }
}
