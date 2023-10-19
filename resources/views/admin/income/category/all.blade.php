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
        <table class="table table-bordered table-striped table-hover custom_table">
          <thead class="table-dark">
            <tr>
              <th>Name</th>
              <th>Remarks</th>
              <th>Manage</th>
            </tr>
          </thead>
          <tbody>
          
          @foreach($allData as $data)
          <tr>
              <td>{{ $data->income_cate_name }}</td>
              <td>{{ $data->income_cate_remarks }}</td>
              <td>
                <div class="btn-group btn_group_manage" role="group">
                  <button type="button" class="btn btn-sm btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Manage</button>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{route('view-in-cate',$data->income_cate_slug)}}">View</a></li>
                    <li><a class="dropdown-item" href="edit-user.html">Edit</a></li>
                    <li><a class="dropdown-item" href="#">Delete</a></li>
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
@endsection