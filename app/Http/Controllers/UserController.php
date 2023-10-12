<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function insert()
    {
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
