@extends('layouts/admin')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card mb-3">
      <div class="card-header">
        <div class="row">
          <div class="col-md-8 card_title_part">
            <i class="fab fa-gg-circle"></i>View expense Category Information
          </div>
          <div class="col-md-4 card_button_part">
            <a href="{{route('all-ex-cate')}}" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Category</a>
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
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8">
            <table class="table table-bordered table-striped table-hover custom_view_table">
              <tr>
                <td>Expense Category Name</td>
                <td>:</td>
                <td>{{$viewData->expense_cate_name }}</td>
              </tr>
              <tr>
                <td>Remarks</td>
                <td>:</td>
                <td>{{$viewData->expense_cate_remarks }}</td>
              </tr>
              <tr>
                <td>Creator</td>
                <td>:</td>
                <td>
                  {{$viewData->creatorInfo->name }}
                  <br>
                  {{$viewData->created_at->format('d-M-Y | h:m:s A') }}
                  <br>
                  {{$viewData->created_at->diffForHumans() }}
                </td>
              </tr>
              @if($viewData->expense_cate_editor != '')
              <tr>
                <td>Editor</td>
                <td>:</td>
                <td>
                  {{$viewData->editorInfo->name }}
                  <br>
                  {{$viewData->updated_at->format('d-M-Y | h:m:s A ') }}
                  <br>
                  {{$viewData->updated_at->diffForHumans() }}
                </td>
              </tr>
              @endif
            </table>
          </div>
          <div class="col-md-2"></div>
        </div>
      </div>
      <div class="card-footer">
        <div class="btn-group" role="group" aria-label="Button group">
          <button type="button" class="btn btn-sm btn-dark">Print</button>
          <button type="button" class="btn btn-sm btn-secondary">PDF</button>
          <button type="button" class="btn btn-sm btn-dark">Excel</button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection