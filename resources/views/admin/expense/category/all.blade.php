@extends('layouts/admin')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card mb-3">
      <div class="card-header">
        <div class="row">
          <div class="col-md-8 card_title_part">
            <i class="fab fa-gg-circle"></i>All Expense Category Information
          </div>
          <div class="col-md-4 card_button_part">
            <a href="{{route('add-ex-cate')}}" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i>Add Category</a>
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
        <table id="allTableInfo" class="table table-bordered table-striped table-hover custom_table">
          <thead class="table-dark">
            <tr>
              <th>Name</th>
              <th>Remarks</th>
              <th>Transction</th>
              <th>Amount</th>
              <th>Manage</th>
            </tr>
          </thead>
          <tbody>

            @foreach($allData as $data)
            <tr>
              @php
                $total_expense = App\Models\Expense::where('expense_status',1)->where('expense_cate_id',$data->expense_cate_id)->sum('expense_amount');
                $count = App\Models\expense::where('expense_status',1)->where('expense_cate_id',$data->expense_cate_id)->count();
              @endphp
              <td>{{ $data->expense_cate_name }}</td>
              <td>{{ Str::words($data->expense_cate_remarks,3) }}</td>
              <td>{{$count}}</td>
              <td>{{$total_expense}}</td>
              <td>
                <div class="btn-group btn_group_manage" role="group">
                  <button type="button" class="btn btn-sm btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Manage</button>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{route('view-ex-cate',$data->expense_cate_slug)}}">View</a></li>
                    <li><a class="dropdown-item" href="{{route('edit-ex-cate',$data->expense_cate_slug)}}">Edit</a></li>
                    @if($count==0)
                    <li><a class="dropdown-item" href="#" id="softDelete" data-bs-toggle="modal" data-new="{{$data->expense_cate_id}}" data-bs-target="#softDeleteModal">Delete</a></li>
                    @endif
                  </ul>
                </div>
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
<!-- Modal -->
<div class="modal fade" id="softDeleteModal" tabindex="-1" aria-labelledby="softDeleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{route('softDelete-ex-cate') }}" method="post">
      @csrf
      <div class="modal-content">
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