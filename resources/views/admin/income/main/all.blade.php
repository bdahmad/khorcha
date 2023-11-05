@extends('layouts/admin')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card mb-3">
      <div class="card-header">
        <div class="row">
          <div class="col-md-8 card_title_part">
            <i class="fab fa-gg-circle"></i>All Income Information
          </div>
          <div class="col-md-4 card_button_part">
            <a href="{{route('add-income')}}" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i>Add Income</a>
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
        <table id="allTableInfo"  class="table table-bordered table-striped table-hover custom_table">
          <thead class="table-dark">
            <tr>
              <th>Date</th>
              <th>Title</th>
              <th>Category</th>
              <th>Amount</th>
              <th>Manage</th>
            </tr>
          </thead>
          <tbody>

            @foreach($allData as $data)
            <tr>
              <td>{{ date('d-m-Y',strtotime($data->income_date))  }}</td>
              <td>{{ $data->income_title }}</td>
              <td>{{ $data->categoryInfo->income_cate_name }}</td>
              <td>{{ number_format($data->income_amount,2)  }}</td>
              <td>
                <div class="btn-group btn_group_manage" role="group">
                  <button type="button" class="btn btn-sm btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Manage</button>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{route('view-income',$data->income_slug)}}">View</a></li>
                    <li><a class="dropdown-item" href="{{route('edit-income',$data->income_slug)}}">Edit</a></li>
                    <li><a class="dropdown-item" href="#" id="softDelete" data-bs-toggle="modal" data-new="{{$data->income_id}}" data-bs-target="#softDeleteModal">Delete</a></li>
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
          <a href="{{route('pdf-income')}}" class="btn btn-sm btn-secondary">PDF</a>
          <button type="button" class="btn btn-sm btn-dark">Excel</button>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="softDeleteModal" tabindex="-1" aria-labelledby="softDeleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{route('softDelete-income') }}" method="post">
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