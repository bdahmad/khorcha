<?php

namespace App\Http\Controllers;

use App\Models\IncomeCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon\Carbon;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Auth;

class IncomeCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $allData = IncomeCategory::all();
        return view('admin.income.category.all',compact('allData'));
    }
    public function add()
    {
        return view('admin.income.category.add');
    }
    public function edit()
    {
        return view('admin.income.category.edit');
    }
    public function view()
    {
        
        return view('admin.income.category.view');
    }
    public function insert(Request $request)
    {
        IncomeCategory::insert([
            'income_cate_name' => $request['name'],
            'income_cate_remarks' => $request['remarks'],
        ]);
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
