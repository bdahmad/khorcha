@extends('layouts/admin')
@section('content')
@php
$all = App\Models\ExpenseCategory::where('expense_cate_status',0)->orderBy('expense_cate_id','DESC')->get();
@endphp
<div class="row">
  <div class="col-md-12">
    <div class="card mb-3">
      <div class="card-header">
        <div class="row">
          <div class="col-md-8 card_title_part">
            <i class="fab fa-gg-circle"></i>Recycle Expense Category Information
          </div>
          <div class="col-md-4 card_button_part">
            <a href="{{route('recycleBin')}}" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>Recycle Bin</a>
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
        <table id="myTable" class="table table-bordered table-striped table-hover custom_table">
          <thead class="table-dark">
            <tr>
              <th>Name</th>
              <th>Remarks</th>
              <th>Manage</th>
            </tr>
          </thead>
          <tbody>

            @foreach($all as $data)
            <tr>
              <td>{{ $data->expense_cate_name }}</td>
              <td>{{ $data->expense_cate_remarks }}</td>
              <td>

                <a href="#" class="fs-5" id="restore" data-bs-toggle="modal" data-new="{{$data->expense_cate_id}}" data-bs-target="#restoreModal"><i class="fas fa-recycle mx-2 text-success"></i> </a>

                <a href="#" class="fs-5" id="delete" data-bs-toggle="modal" data-new="{{$data->expense_cate_id}}" data-bs-target="#deleteModal"><i class="fas fa-trash text-danger"></i></a>

              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
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
<!--restore Modal -->
<div class="modal fade" id="restoreModal" tabindex="-1" aria-labelledby="restoreModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{route('restore-ex-cate') }}" method="post">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="restoreModalLabel">Confirm Message</h1>
        </div>
        <div class="modal-body restore_body">
          Are you sure to restore data?
          <input type="hidden" name="restore_id" id="restore_id">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-sm btn-success">Confirm</button>
        </div>
      </div>
    </form>
  </div>
</div>
<!--delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{route('delete-ex-cate') }}" method="post">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="deleteModalLabel">Confirm Message</h1>
        </div>
        <div class="modal-body delete_body">
          Are you sure to delete parmanently?
          <input type="hidden" name="delete_id" id="delete_id">
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