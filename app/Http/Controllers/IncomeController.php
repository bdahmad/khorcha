<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class IncomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $allData = Income::where('income_status', 1)->orderBy('income_date', 'DESC')->get(); // get all data where status = 1 and desc order
        return view('admin.income.main.all', compact('allData'));
    }
    public function add()
    {
        return view('admin.income.main.add');
    }
    public function edit($slug)
    {
        $editData = Income::where('income_status', 1)->where('income_slug', $slug)->firstOrFail();
        return view('admin.income.main.edit', compact('editData'));
    }
    public function view($slug)
    {
        $viewData = Income::where('income_slug', $slug)->firstOrFail();
        return view('admin.income.main.view', compact('viewData'));
    }
    public function insert(Request $request)
    {
        $this->validate($request, [
            'income_title' => 'required | max:100',
            'income_category' => 'required',
            'income_amount' => 'required',
            'income_date' => 'required',
        ], [
            'income_title.required' => 'Please enter income title.',
            'income_category.required' => 'Please select income category.',
            'income_amount.required' => 'Please enter income amount.',
            'income_date.required' => 'Please select income date.',
        ]);
        $slug = 'I'.uniqid(20);
        $creator = Auth::user()->id;
        $insert = Income::insert([
            'income_title' => $request['income_title'],
            'income_cate_id' => $request['income_category'],
            'income_amount' => $request['income_amount'],
            'income_date' => $request['income_date'],
            'income_slug' => $slug,
            'income_creator' => $creator,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($insert) {
            Session::flash('success', 'Successfully add income information.');
            return redirect('dashboard/income/add');
        } else {
            Session::flash('error', 'Oops! Operation failed.');
            return redirect('dashboard/income/add');
        }
    }
    public function update(Request $request)
    {
        $this->validate($request, [
            'income_title' => 'required | max:100',
            'income_category' => 'required',
            'income_amount' => 'required',
            'income_date' => 'required',
        ], [
            'income_title.required' => 'Please enter income title.',
            'income_category.required' => 'Please select income category.',
            'income_amount.required' => 'Please enter income amount.',
            'income_date.required' => 'Please select income date.',
        ]);
        $id = $request['id'];
        $slug = $request['slug'];
        $editor = Auth::user()->id;
        $update = Income::where('income_status',1)->where('income_id',$id)->update([
            'income_title' => $request['income_title'],
            'income_cate_id' => $request['income_category'],
            'income_amount' => $request['income_amount'],
            'income_date' => $request['income_date'],
            'income_slug' => $slug,
            'income_editor' => $editor,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($update) {
            Session::flash('success', 'Successfully update income information.');
            return redirect('dashboard/income/view/'.$slug);
        } else {
            Session::flash('error', 'Oops! Operation failed.');
            return redirect('dashboard/income/edit/'.$slug);
        }
    }
    public function softDelete(Request $request)
    {
        $id = $request['modal_id'];
        $soft = Income::where('income_status', 1)->where('income_id', $id)->update([
            'income_status' => 0,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        
        if ($soft) {
            Session::flash('success', 'Successfully delete income information.');
            return redirect('dashboard/income');
        } else {
            Session::flash('error', 'Oops! Operation failed.');
            return redirect('dashboard/income');
        }
    }
    public function restore(Request $request)
    {
        $id = $request['restore_id'];
        $restore = Income::where('income_status', 0)->where('income_id', $id)->update([
            'income_status' => 1,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        
        if ($restore) {
            Session::flash('success', 'Successfully restore income information.');
            return redirect('dashboard/recycle/income');
        } else {
            Session::flash('error', 'Oops! Operation failed.');
            return redirect('dashboard/recycle/income');
        }
    }
    public function delete(Request $request)
    {
        $id = $request['delete_id'];
        $delete = Income::where('income_status', 0)->where('income_id', $id)->delete([]);
        
        if ($delete) {
            Session::flash('success', 'Successfully permanently delete income information.');
            return redirect('dashboard/recycle/income');
        } else {
            Session::flash('error', ' Operation failed.');
            return redirect('dashboard/recycle/income');
        }
    }
}
