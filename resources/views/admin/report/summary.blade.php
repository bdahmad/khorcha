@extends('layouts/admin')
@section('content')

@php
$allIncome = App\Models\Income::where('income_status',1)->get();
$allExpense = App\Models\Expense::where('expense_status',1)->get();


$totalIncome = App\Models\Income::where('income_status',1)->sum('income_amount');
$totalExpense = App\Models\Expense::where('expense_status',1)->sum('expense_amount');


$total_savings = ($totalIncome-$totalExpense);
@endphp


<div class="row">
  <div class="col-md-12"> 
    <div class="card mb-3"> 
      <div class="card-header"> 
        <div class="row"> 
          <div class="col-md-8 card_title_part"> 
            <i class="fab fa-gg-circle"></i>Income Expense Statement 
          </div> 
          <div class="col-md-4 card_button_part"> 
            <a href="{{route('all-income')}}" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Income</a> 
            <a href="{{route('all-expense')}}" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Expense</a> 
          </div>
        </div> 
      </div> 
      <div class=" card-body">
        <div class="row"> 
          <div class="col-md-2"> 

          </div> 
          <div class=" col-md-8"> 
            @if(Session::has('success')) 
            <div class="alert alert-success alert_success " role="alert"> 
              <strong>Success: </strong>{{Session::get('success')}}
            </div> 
            @endif @if(Session::has('error')) ?div class="alert alert-danger alert_error " role="alert">
              <strong>Opps! </strong>{{Session::get('error')}} 
            </div> 
            @endif 
          </div> 
          <div class=" col-md-2"></div> 
        </div>
        <table id="allTableAsc" class="table table-bordered table-striped table-hover custom_table"> 
          <thead class="table-dark">
            <tr> 
              <th>Date</th> 
              <th>Title</th>
              <th>Category</th> 
              <th>Income</th> 
              <th>Expense</th>
            </tr>
          </thead>
          <tbody> 
            @foreach($allIncome as $income) 
            <tr>
              <td>{{date('d-m-Y',strtotime($income->income_date))}}</td>
              <td>{{ $income->income_title }}</td>
              <td>{{ $income->categoryInfo->income_cate_name }}</td>
              <td>{{ number_format($income->income_amount,2) }}</td>
              <td> </td>
            </tr> 
            @endforeach 
            @foreach($allExpense as $expense) 
            <tr>
              <td>{{date('d-m-Y',strtotime($expense->expense_date)) }}</td>
              <td>{{ $expense->expense_title }}</td>
              <td>{{ $expense->categoryInfo->expense_cate_name }}</td>
              <td></td>
              <td>{{number_format($expense->expense_amount,2) }}</td>
            </tr>
            @endforeach

            <tfoot>
              <tr>
              <td colspan="3" class="text-end">Total:</td>
              <td>{{number_format($totalIncome,2)}}</td>
              <td>{{number_format($totalExpense,2)}}</td>
            </tr>
            <tr>
              <td colspan="3" class="text-end">Savings:</td>
              <td>{{number_format($total_savings,2)}}</td>
            </tr>
            </tfoot>
          </tbody>
        </table>
      </div> 
      <div class="card-footer"> 
        <div class="btn-group" role="group" aria-label="Button group">
          <button type="button" onclick="window.print()" class="btn btn-sm btn-dark">Print</button> 
          <a href="{{route('pdf-income')}}" class="btn btn-sm btn-secondary">PDF</a> 
          <a href="{{route('excel-income')}}" class="btn btn-sm btn-dark">Excel</a> 
        </div>
      </div>
    </div>
  </div>
</div> <!-- Modal -->
<div class="modal fade" id="softDeleteModal" tabindex="-1" aria-labelledby="softDeleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{route('softDelete-income') }}" method="post"> @csrf <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="softDeleteModalLabel">Confirm Message</h1>
        </div>
        <div class="modal-body modal_body">
          Are you sure to delete?
          <input type="hidden" name="modal_id" id="modal_id">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-sm btn-success">Confirm</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection