<?php

namespace App\Http\Controllers;

use App\Models\IncomeCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class RecycleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    }
    public function user()
    {
        return view('admin.recycle.user');
    }
    public function income()
    {
        return view('admin.recycle.income');
    }
    public function incomeCategory()
    {
        return view('admin.recycle.income-category');
    }
    public function expense()
    {
        return view('admin.recycle.expense');
    }
    public function expenseCategory()
    {
        return view('admin.recycle.expense-category');
    }
}
