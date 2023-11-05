@extends('layouts/admin')
@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card mb-3">
      <div class="card-header">
        <div class="row">
          <div class="col-md-8 card_title_part">
            <i class="fab fa-gg-circle"></i>All User Information
          </div>
          <div class="col-md-4 card_button_part">
            <a href="{{route('add-user')}}" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i>Add User</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-striped table-hover custom_table">
          <thead class="table-dark">
            <tr>
              <th>Name</th>
              <th>Phone</th>
              <th>Email</th>
              <th>Username</th>
              <th>Role</th>
              <th>Photo</th>
              <th>Manage</th>
            </tr>
          </thead>
          <tbody>
            @foreach($all as $data)
            <tr>
              <td>{{$data->name}}</td>
              <td>{{$data->phone}}</td>
              <td>{{$data->email}}</td>
              <td>{{$data->username}}</td>
              <td>{{$data->roleInfo->role_name}}</td>
              <td>
                @if($data->photo)
                <img height="30px" src="{{asset('uploads/users/'.$data->photo)}}" alt="user" />
                @else
                <img height="30px" src="{{asset('assets/admin')}}/images/avatar.png" alt="avatar" />
                @endif
              </td>
              <td>
                <div class="btn-group btn_group_manage" role="group">
                  <button type="button" class="btn btn-sm btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Manage</button>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{route('view-user',$data->slug)}}">View</a></li>
                    <li><a class="dropdown-item" href="{{route('edit-user',$data->slug)}}">Edit</a></li>
                    <li><a class="dropdown-item" href="#" id="softDelete" data-bs-toggle="modal" data-new="{{$data->id}}" data-bs-target="#softDeleteModal" >Delete</a></li>
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
    <form action="{{route('softDelete-user') }}" method="post">
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