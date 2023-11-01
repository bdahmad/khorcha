<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('admin.user.all');
    }
    public function add()
    {
        return view('admin.user.add');
    }
    public function edit()
    {
        return view('admin.user.edit');
    }
    public function view()
    {
        return view('admin.user.view');
    }
    public function insert(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required',
            'confirmPassword' => 'required',
            'role' => 'required',
        ],[
            'name.required' => 'Please enter Full name.',
            'email.required' => 'Please enter valid email address.',
            'username.required' => 'Please enter username.',
            'password.required' => 'Please enter password.',
            'confirmPassword.required' => 'Please enter confirm password.',
            'role.required' => 'Please select role.',
        ]);
        $slug = 'User'.uniqid(20);

        $insert = User::insertGetId([
            'name' => $request['name'],
            'email' => $request['email'],
            'username' => $request['username'],
            'password' => Hash::make($request['password']),
            'role' => $request['role'],
            'slug' => $slug,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);
        if($insert){
            return redirect()->route('add-user')->with('success','Successfully add new user.');
        }else{
            return redirect()->route('add-user')->with('error','Operation Failed.');

        }
    }
    public function update()
    {
    }
    public function delete()
    {
    }
    public function softDelete()
    {
    }
    public function restore()
    {
    }
}
