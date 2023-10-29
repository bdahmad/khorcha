@extends('layouts/admin')
@section('content')
<div class="row">
  <div class="col-md-12 ">
    <form method="post" action="{{ route('insert-expense') }}">
      @csrf
      <div class="card mb-3">
        <div class="card-header">
          <div class="row">
            <div class="col-md-8 card_title_part">
              <i class="fab fa-gg-circle"></i>add expense Information
            </div>
            <div class="col-md-4 card_button_part">
              <a href="{{route('all-expense') }}" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All expense</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
              @if(Session::has('success'))
              <div class="alert alert-success alert_success " role="alert">
                <strong>Success: </strong>{{Session::get('success')}}
              </div>
              @endif
              @if(Session::has('error'))
              <div class="alert alert-danger alert_error " role="alert">
                <strong>Opps! </strong>{{Session::get('error')}}
              </div>
              @endif
            </div>
            <div class="col-md-2"></div>
          </div>
          <div class="row mb-3 {{ $errors->has('expense_title')?'has-error':'' }}">
            <label class="col-sm-3 col-form-label col_form_label">expense Title<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control form_control" id="" name="expense_title" {{ old('expense_title') }}>
              @if($errors->has('expense_title'))
              <span class="invalid-feedback " role="alert">
                <strong>{{$errors->first('expense_title')}}</strong>
              </span>
              @endif
            </div>
          </div>
          <div class="row mb-3 {{ $errors->has('expense_category')?'has-error':'' }}">
            @php
            $all = App\Models\ExpenseCategory::where('expense_cate_status',1)->orderBy('expense_cate_name','ASC')->get();
            @endphp
            <label class="col-sm-3 col-form-label col_form_label">expense Category<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <select name="expense_category" id="" class="form-control form_control">
                <option value="">Select Category</option>
                @foreach($all as $data)
                  <option value="{{$data->expense_cate_id}}">{{$data->expense_cate_name}}</option>
                @endforeach
              </select>
              @if($errors->has('expense_category'))
              <span class="invalid-feedback " role="alert">
                <strong>{{$errors->first('expense_category')}}</strong>
              </span>
              @endif
            </div>
          </div>
          <div class="row mb-3 {{ $errors->has('expense_amount')?'has-error':'' }}">
            <label class="col-sm-3 col-form-label col_form_label">Amount<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
            <input type="text" class="form-control form_control" id="" name="expense_amount" {{ old('expense_amount') }}>
              @if($errors->has('expense_amount'))
              <span class="invalid-feedback " role="alert">
                <strong>{{$errors->first('expense_amount')}}</strong>
              </span>
              @endif
            </div>
          </div>
          <div class="row mb-3 {{ $errors->has('expense_date')?'has-error':'' }}">
            <label class="col-sm-3 col-form-label col_form_label">Date<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
            <input type="text" class="form-control form_control" id="date" name="expense_date" {{ old('expense_date') }}>
              @if($errors->has('expense_date'))
              <span class="invalid-feedback " role="alert">
                <strong>{{$errors->first('expense_date')}}</strong>
              </span>
              @endif
            </div>
          </div>
        </div>
        <div class="card-footer text-center">
          <button type="submit" class="btn btn-sm btn-dark">submit</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection