<?php

namespace App\Http\Controllers;

use App\Models\IncomeCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
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
        $this->validate($request,[
            'name'=> 'required | max:50 | unique:income_categories,income_cate_name',
        ],[
            'name.required'=>'Please enter income category name.',
        ]);
        // $slug = 'IC'.uniqid(20);
        $slug = Str::slug($request['name'], '-');
        $creator = Auth::user()->id;
        $insert = IncomeCategory::insert([
            'income_cate_name' => $request['name'],
            'income_cate_remarks' => $request['remarks'],
            'income_cate_slug' => $slug,
            'income_cate_creator' => $creator,

            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        if($insert){
            Session::flash('success','Successfully add income category information.');
            return redirect('dashboard/income/category/add');
        }else{
            Session::flash('error','Oops! Operation failed.');
            return redirect('dashboard/income/category/add');
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
