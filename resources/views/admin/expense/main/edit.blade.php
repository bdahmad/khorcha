@extends('layouts/admin')
@section('content')
<div class="row">
  <div class="col-md-12 ">
    <form method="post" action="{{ route('update-income') }}">
      @csrf
      <div class="card mb-3">
        <div class="card-header">
          <div class="row">
            <div class="col-md-8 card_title_part">
              <i class="fab fa-gg-circle"></i>update income Information
            </div>
            <div class="col-md-4 card_button_part">
              <a href="{{route('all-income') }}" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Income</a>
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
          <div class="row mb-3 {{ $errors->has('income_title')?'has-error':'' }}">
            <label class="col-sm-3 col-form-label col_form_label">Income Title<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input type="hidden" name="slug" value="{{$editData->income_slug}}">
              <input type="hidden" name="id" value="{{$editData->income_id}}">
              <input type="text" class="form-control form_control" id="" name="income_title"  value="{{ $editData->income_title  }}">
              @if($errors->has('income_title'))
              <span class="invalid-feedback " role="alert">
                <strong>{{$errors->first('income_title')}}</strong>
              </span>
              @endif
            </div>
          </div>
          <div class="row mb-3 {{ $errors->has('income_category')?'has-error':'' }}">
            @php
            $all = App\Models\IncomeCategory::where('income_cate_status',1)->orderBy('income_cate_name','ASC')->get();
            @endphp
            <label class="col-sm-3 col-form-label col_form_label">Income Category<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <select name="income_category" id="" class="form-control form_control">
                <option value="">Select Category</option>
                @foreach($all as $data)
                  <option value="{{$data->income_cate_id}}" @if($data->income_cate_id == $editData->income_cate_id) selected @endif >{{$data->income_cate_name}}</option>
                @endforeach
              </select>
              <!--   -->
              @if($errors->has('income_category'))
              <span class="invalid-feedback " role="alert">
                <strong>{{$errors->first('income_category')}}</strong>
              </span>
              @endif
            </div>
          </div>
          <div class="row mb-3 {{ $errors->has('income_amount')?'has-error':'' }}">
            <label class="col-sm-3 col-form-label col_form_label">Amount<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
            <input type="text" class="form-control form_control" id="" name="income_amount" value="{{ $editData->income_amount  }}">
              @if($errors->has('income_amount'))
              <span class="invalid-feedback " role="alert">
                <strong>{{$errors->first('income_amount')}}</strong>
              </span>
              @endif
            </div>
          </div>
          <div class="row mb-3 {{ $errors->has('income_date')?'has-error':'' }}">
            <label class="col-sm-3 col-form-label col_form_label">Date<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
            <input type="text" class="form-control form_control" id="date" name="income_date"  value="{{ $editData->income_date  }}">
              @if($errors->has('income_date'))
              <span class="invalid-feedback " role="alert">
                <strong>{{$errors->first('income_date')}}</strong>
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