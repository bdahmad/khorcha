<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Excel;
use App\Models\Expense;
use App\Models\Income;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function summary()
    {
        return view('admin.report.summary');
    }
    public function summaryPdf()
    {
        return view('admin.report.summary-pdf');
    }
    public function summaryExcel()
    {
        return view('admin.report.summary-excel');
    }
    public function currentMonth()
    {
        return view('admin.report.current-month');
    }
    public function currentMonthPdf()
    {
    }
    public function currentMonthExcel()
    {
    }
}
