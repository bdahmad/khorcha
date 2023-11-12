@extends('layouts/admin')
@section('content')

@php
$all_income=App\Models\Income::select(DB::raw('count(*) as total'),DB::raw('YEAR(income_date) year, MONTH(income_date) month'))->groupby('year','month')->orderBy('income_date','DESC')->get();


  $all_expense=App\Models\Expense::select(DB::raw('count(*) as total'),DB::raw('YEAR(expense_date) year, MONTH(expense_date) month'))->groupby('year','month')->orderBy('expense_date','DESC')->get();
  





@endphp


<div class="row">
  <div class="col-md-12"> 
    <div class="card mb-3"> 
      <div class="card-header"> 
        <div class="row"> 
          <div class="col-md-8 card_title_part"> 
            <i class="fab fa-gg-circle"></i>Income Expense Archive 
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
        <table id="example" class="table table-bordered table-striped table-hover custom_table"> 
          <thead class="table-dark">
            <tr> 
              <th>Date</th> 
              <th>Income</th> 
              <th>Expense</th>
              <th>Savings</th> 
              <th>Action</th>
            </tr>
          </thead>
          <tbody> 
            @foreach($months as $month) 
            <tr>
              <td>
                @php 
                  $year = $month->year;
                  $month = $month->month;
                  $year_month = $year.'-'.$month;
                  $month_year = date('F-Y',strtotime($year_month));
                  echo $month_year;
                @endphp
              </td>
              <td>
                @php 
                  $total_income = App\Models\Income::where('income_status',1)
                  ->whereYear('income_date','=',$year)
                  ->whereMonth('income_date','=',$month)
                  ->sum('income_amount');
                  echo number_format($total_income,2);
                @endphp
              </td>
              <td>
                @php 
                  $total_expense = App\Models\Expense::where('expense_status',1)
                  ->whereYear('expense_date','=',$year)
                  ->whereMonth('expense_date','=',$month)
                  ->sum('expense_amount');

                  echo number_format($total_expense,2);
                @endphp
              </td>
              @if($total_income>$total_expense)
                <td class="text-success">
                  {{$total_income-$total_expense}}
                </td>
              @else
                <td class="text-danger">
                  {{$total_income-$total_expense}}
                </td>
              @endif
              <td> 
                <a href="{{route('month.archive',$month_year)}}" class= "btn btn-secondary btn-sm" >Details</a>
              </td>
            </tr> 
            @endforeach

            <!-- <tfoot>
              <tr>
              <td colspan="3" class="text-end">Total:</td>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td colspan="3" class="text-end">Savings:</td>
              <td></td>
            </tr>
            </tfoot> -->
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