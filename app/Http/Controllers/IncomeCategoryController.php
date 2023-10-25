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
        $allData = IncomeCategory::where('income_cate_status', 1)->orderBy('income_cate_id', 'DESC')->get(); // get all data where status = 1 and desc order
        return view('admin.income.category.all', compact('allData'));
    }
    public function add()
    {
        return view('admin.income.category.add');
    }
    public function edit($slug)
    {
        $editData = IncomeCategory::where('income_cate_status', 1)->where('income_cate_slug', $slug)->firstOrFail();
        return view('admin.income.category.edit', compact('editData'));
    }
    public function view($slug)
    {
        $viewData = IncomeCategory::where('income_cate_slug', $slug)->firstOrFail();
        return view('admin.income.category.view', compact('viewData'));
    }
    public function insert(Request $request)
    {
        $this->validate($request, [
            'name' => 'required | max:50 | unique:income_categories,income_cate_name',
        ], [
            'name.required' => 'Please enter income category name.',
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

        if ($insert) {
            Session::flash('success', 'Successfully add income category information.');
            return redirect('dashboard/income/category/add');
        } else {
            Session::flash('error', 'Oops! Operation failed.');
            return redirect('dashboard/income/category/add');
        }
    }
    public function update(Request $request)
    {
        $id = $request['id'];
        $this->validate($request, [
            'name' => 'required | max:50 | unique:income_categories,income_cate_name,' . $id . ',income_cate_id',
        ], [
            'name.required' => 'Please enter income category name.',
        ]);
        // $slug = 'IC'.uniqid(20);
        $slug = Str::slug($request['name'], '-');
        $editor = Auth::user()->id;
        $update = IncomeCategory::where('income_cate_status', 1)->where('income_cate_id', $id)->update([
            'income_cate_name' => $request['name'],
            'income_cate_remarks' => $request['remarks'],
            'income_cate_slug' => $slug,
            'income_cate_editor' => $editor,

            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($update) {
            Session::flash('success', 'Successfully update income category information.');
            return redirect('dashboard/income/category/view/' . $slug);
        } else {
            Session::flash('error', 'Oops! Operation failed.');
            return redirect('dashboard/income/category/edit/' . $slug);
        }
    }
    public function softDelete(Request $request)
    {
        $id = $request['modal_id'];
        $soft = IncomeCategory::where('income_cate_status', 1)->where('income_cate_id', $id)->update([
            'income_cate_status' => 0,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        
        if ($soft) {
            Session::flash('success', 'Successfully delete income category information.');
            return redirect('dashboard/income/category');
        } else {
            Session::flash('error', 'Oops! Operation failed.');
            return redirect('dashboard/income/category');
        }
    }
    public function restore(Request $request)
    {
        $id = $request['restore_id'];
        $restore = IncomeCategory::where('income_cate_status', 0)->where('income_cate_id', $id)->update([
            'income_cate_status' => 1,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        
        if ($restore) {
            Session::flash('success', 'Successfully restore income category information.');
            return redirect('dashboard/recycle/income/category');
        } else {
            Session::flash('error', 'Oops! Operation failed.');
            return redirect('dashboard/recycle/income/category');
        }
    }
    public function delete(Request $request)
    {
        $id = $request['delete_id'];
        $delete = IncomeCategory::where('income_cate_status', 0)->where('income_cate_id', $id)->delete([]);
        
        if ($delete) {
            Session::flash('success', 'Successfully parmanently delete income category information.');
            return redirect('dashboard/recycle/income/category');
        } else {
            Session::flash('error', 'Oops! Operation failed.');
            return redirect('dashboard/recycle/income/category');
        }
    }
}
