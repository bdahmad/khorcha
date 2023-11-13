<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;
use App\Models\Expense;
use DB;

class ArchiveController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $months = DB::table('incomes')
        ->select(DB::raw('YEAR(income_date) as year'),DB::raw('MONTH(income_date) as month'))
        ->union(DB::table('expenses')
        ->select(DB::raw('YEAR(expense_date) as year'),DB::raw('MONTH(expense_date) as month')))
        ->distinct()
        ->get();
        return view('admin.archive.index',compact('months'));
    }
    public function monthArchive($month_year){

        return view('admin.archive.current-month',compact('month_year'));

    }
    public function dayArchive($date){
        return view('admin.archive.day',compact('date'));
    }
}
