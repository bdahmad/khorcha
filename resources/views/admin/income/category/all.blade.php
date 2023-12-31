@extends('layouts/admin')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card mb-3">
      <div class="card-header">
        <div class="row">
          <div class="col-md-8 card_title_part">
            <i class="fab fa-gg-circle"></i>All Income Category Information
          </div>
          <div class="col-md-4 card_button_part">
            <a href="{{route('add-in-cate')}}" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i>Add Category</a>
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
        <table class="table table-bordered table-striped table-hover custom_table">
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
                $total_income = App\Models\Income::where('income_status',1)->where('income_cate_id',$data->income_cate_id)->sum('income_amount');
                $count = App\Models\Income::where('income_status',1)->where('income_cate_id',$data->income_cate_id)->count();
              @endphp
              <td>{{ $data->income_cate_name }}</td>
              <td>{{ Str::words($data->income_cate_remarks,3 )}}</td>
              <td>{{$count}}</td>
              <td>{{$total_income}}</td>
              <td>
                <div class="btn-group btn_group_manage" role="group">
                  <button type="button" class="btn btn-sm btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Manage</button>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{route('view-in-cate',$data->income_cate_slug)}}">View</a></li>
                    <li><a class="dropdown-item" href="{{route('edit-in-cate',$data->income_cate_slug)}}">Edit</a></li>
                    @if($count == 0)
                    <li><a class="dropdown-item" href="#" id="softDelete" data-bs-toggle="modal" data-new="{{$data->income_cate_id}}" data-bs-target="#softDeleteModal">Delete</a></li>
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
    <form action="{{route('softDelete-in-cate') }}" method="post">
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