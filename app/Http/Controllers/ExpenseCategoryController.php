<?php

namespace App\Http\Controllers;

use App\Models\ExpenseCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class ExpenseCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $allData = ExpenseCategory::where('expense_cate_status', 1)->orderBy('expense_cate_id', 'DESC')->get(); // get all data where status = 1 and desc order
        return view('admin.expense.category.all', compact('allData'));
    }
    public function add()
    {
        return view('admin.expense.category.add');
    }
    public function edit($slug)
    {
        $editData = ExpenseCategory::where('expense_cate_status', 1)->where('expense_cate_slug', $slug)->firstOrFail();
        return view('admin.expense.category.edit', compact('editData'));
    }
    public function view($slug)
    {
        $viewData = ExpenseCategory::where('expense_cate_slug', $slug)->firstOrFail();
        return view('admin.expense.category.view', compact('viewData'));
    }
    public function insert(Request $request)
    {
        $this->validate($request, [
            'name' => 'required | max:50 | unique:expense_categories,expense_cate_name',
        ], [
            'name.required' => 'Please enter expense category name.',
        ]);
        $slug = Str::slug($request['name'], '-');
        $creator = Auth::user()->id;
        $insert = ExpenseCategory::insert([
            'expense_cate_name' => $request['name'],
            'expense_cate_remarks' => $request['remarks'],
            'expense_cate_slug' => $slug,
            'expense_cate_creator' => $creator,

            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($insert) {
            Session::flash('success', 'Successfully add expense category information.');
            return redirect('dashboard/expense/category/add');
        } else {
            Session::flash('error', 'Oops! Operation failed.');
            return redirect('dashboard/expense/category/add');
        }
    }
    public function update(Request $request)
    {
        $id = $request['id'];
        $this->validate($request, [
            'name' => 'required | max:50 | unique:expense_categories,expense_cate_name,' . $id . ',expense_cate_id',
        ], [
            'name.required' => 'Please enter expense category name.',
        ]);
        $slug = Str::slug($request['name'], '-');
        $editor = Auth::user()->id;
        $update = ExpenseCategory::where('expense_cate_status', 1)->where('expense_cate_id', $id)->update([
            'expense_cate_name' => $request['name'],
            'expense_cate_remarks' => $request['remarks'],
            'expense_cate_slug' => $slug,
            'expense_cate_editor' => $editor,

            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($update) {
            Session::flash('success', 'Successfully update expense category information.');
            return redirect('dashboard/expense/category/view/' . $slug);
        } else {
            Session::flash('error', 'Oops! Operation failed.');
            return redirect('dashboard/expense/category/edit/' . $slug);
        }
    }
    public function softDelete(Request $request)
    {
        $id = $request['modal_id'];
        $soft = ExpenseCategory::where('expense_cate_status', 1)->where('expense_cate_id', $id)->update([
            'expense_cate_status' => 0,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($soft) {
            Session::flash('success', 'Successfully delete expense category information.');
            return redirect('dashboard/expense/category');
        } else {
            Session::flash('error', 'Oops! Operation failed.');
            return redirect('dashboard/expense/category');
        }
    }
    public function restore(Request $request)
    {
        $id = $request['restore_id'];
        $restore = ExpenseCategory::where('expense_cate_status', 0)->where('expense_cate_id', $id)->update([
            'expense_cate_status' => 1,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        if ($restore) {
            Session::flash('success', 'Successfully restore expense category information.');
            return redirect('dashboard/recycle/expense/category');
        } else {
            Session::flash('error', 'Oops! Operation failed.');
            return redirect('dashboard/recycle/expense/category');
        }
    }
    public function delete(Request $request)
    {
        $id = $request['delete_id'];
        $delete = ExpenseCategory::where('expense_cate_status', 0)->where('expense_cate_id', $id)->delete([]);

        if ($delete) {
            Session::flash('success', 'Successfully permanently delete expense category information.');
            return redirect('dashboard/recycle/expense/category');
        } else {
            Session::flash('error', 'Oops! Operation failed.');
            return redirect('dashboard/recycle/expense/category');
        }
    }
}
