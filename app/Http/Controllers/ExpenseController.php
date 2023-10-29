<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Expense;
use Str;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class ExpenseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $allData = Expense::where('expense_status',1)->orderBy('expense_id','DESC')->get();
        return view('admin.expense.main.all',compact('allData'));
    }
    public function add(){
        return view('admin.expense.main.add');
    }public function edit($slug){
        $editData = Expense::where('expense_status',1)->where('expense_slug',$slug)->firstOrFail();
        return view('admin.expense.main.edit',compact('editData'));
    }public function view($slug){
        $viewData = Expense::where('expense_status',1)->where('expense_slug',$slug)->firstOrFail();
        return view('admin.expense.main.view',compact('viewData'));
        
    }public function insert(Request $request){
        $this->validate($request,[
            'expense_title' => 'required | max: 100',
            'expense_category' => 'required',
            'expense_amount' => 'required',
            'expense_date' => 'required',
        ],[
            'expense_tilte.required' => 'Please enter expense title.',
            'expense_category.required' => 'Please select expense category.',
            'expense_amount.requied' => "Please enter expense amount.",
            'expense_date.requied' => "Please enter expense date.",
        ]);
        $slug = 'E'.uniqid(20);
        $creator = Auth::user()->id;
        $insert = Expense::insert([
            'expense_title' => $request['expense_title'],
            'expense_cate_id' => $request['expense_category'],
            'expense_amount' => $request['expense_amount'],
            'expense_date' => $request['expense_date'],
            'expense_slug' => $slug,
            'expense_creator' => $creator,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);
        if($insert){
            Session::flash('success','Successfully add expense information.');
            return redirect('dashboard/expense/add');
        }else{
            Session::flash('error','Oops! Operation failed.');
            return redirect('dashboard/expense/add');
        }
    }public function update(Request $request){
        $this->validate($request,[
            'expense_title' => 'required | max: 100',
            'expense_category' => 'required',
            'expense_amount' => 'required',
            'expense_date' => 'required',
        ],[
            'expense_title.required' => 'Please enter expense title.',
            'expense_category.required' => 'Please select expense category.',
            'expense_amount.required' => 'Please enter expense amount.',
            'expense_date.required' => 'Please select expense date.',
        ]);
        $id =  $request['id'];
        $slug = $request['slug'];
        $editor = Auth::user()->id;
        $update = Expense::where('expense_status',1)->where('expense_id',$id)->update([
            'expense_title'=> $request['expense_title'],
            'expense_cate_id' => $request['expense_category'],
            'expense_amount' => $request['expense_amount'],
            'expense_date' => $request['expense_date'],
            'expense_slug' => $slug,
            'expense_editor' => $editor,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        if($update){
            Session::flash('success','Successfully update expense information.');
            return redirect('dashboard/expense/view/'.$slug);
        }else{
            Session::flash('error',' Operation Failed.');
            return redirect('dashboard/expense/edit/'.$slug);
        }

    }
    public function softDelete(Request $request){
        $id = $request['modal_id'];

        $soft = Expense::where('expense_status',1)->where('expense_id',$id)->update([
            'expense_status' => 0,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        if($soft){
            Session::flash('success','Successfully delete expense information.');
            return redirect('dashboard/expense');
        }else{
            Session::flash('error',' Operation Failed.');
            return redirect('dashboard/expense');
        }

    }public function restore(Request $request){
        $id = $request['restore_id'];
        $restore = Expense::where('expense_status',0)->where('expense_id',$id)->update([
            'expense_status' => 1,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        if($restore){
            Session::flash('success','Successfully restore expense information.');
            return redirect('dashboard/recycle/expense');
        }else{
            Session::flash('error','Operation Failed.');
            return redirect('dashboard/recycle/expense');
        }
    }
    public function delete(Request $request){
        $id = $request['delete_id'];
        $delete = Expense::where('expense_status',0)->where('expense_id',$id)->delete([]);
        if($delete){
            return redirect('dashboard/recycle/expense')->with('success','Successfully permanent delete expense information.');
        }else{
            return redirect('dashboard/recycle/expense')->with('error','Operation Failed.');
        }
    }
}
