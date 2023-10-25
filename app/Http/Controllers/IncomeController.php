<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IncomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('admin.income.main.all');
    }
    public function add(){
        return view('admin.income.main.add');
        
    }public function edit(){
        
    }public function view(){
        return view('admin.income.main.view');
        
    }public function insert(){
        
    }public function update(){
        
    }public function delete(){
        
    }public function softDelete(){
        
    }public function restore(){
        
    }
}
