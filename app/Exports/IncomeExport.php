<?php

namespace App\Exports;

use App\Models\Income;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class IncomeExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return Income::all();
    // }
   
    public function view(): View
    {
        return view('admin.income.main.excel', [
            'allData' => Income::all()
        ]);
    }
}

