@extends('layouts/admin')
@section('content')
<div class="row">
  <div class="col-md-12 ">
    <form method="post" action="{{ route('insert-in-cate') }}">
      @csrf
      <div class="card mb-3">
        <div class="card-header">
          <div class="row">
            <div class="col-md-8 card_title_part">
              <i class="fab fa-gg-circle"></i>add income category Information
            </div>
            <div class="col-md-4 card_button_part">
              <a href="{{route('all-in-cate') }}" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All category</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          @if(Session::has('error'))
          <div class="alert alert-danger alerterror " role="alert">
                  <strong>Opps!</strong>{{Session::get('error')}}
                </div>
          @endif
          <div class="row mb-3 {{ $errors->has('name')?'has-error':'' }}">
            <label class="col-sm-3 col-form-label col_form_label">Category Name<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control form_control" id="" name="name">
              @if($errors->has('name'))
                <span class="invalid-feedback " role="alert">
                  <strong>{{$errors->first('name')}}</strong>
                </span>
              @endif
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label col_form_label">Remarks:</label>
            <div class="col-sm-7">
              <textarea name="remarks" id="" class="form-control form_control"  cols="30" rows="1"></textarea>
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