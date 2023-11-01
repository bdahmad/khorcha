@extends('layouts/admin')
@section('content')
<div class="row">
  <div class="col-md-12 ">
    <form method="post" action="{{route('insert.user')}}" enctype="multipart/form-data">
      @csrf
      <div class="card mb-3">
        <div class="card-header">
          <div class="row">
            <div class="col-md-8 card_title_part">
              <i class="fab fa-gg-circle"></i>User Registration
            </div>
            <div class="col-md-4 card_button_part">
              <a href="{{route('all-user') }}" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All User</a>
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
          <div class="row mb-3 {{ $errors->has('name')?'has-error':'' }}">
            <label class="col-sm-3 col-form-label col_form_label">Name<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control form_control" id="" name="name">
              @if($errors->has('name'))
              <span class="invalid-feedback " role="alert">
                <strong>{{$errors->first('name')}}</strong>
              </span>
              @endif
            </div>
          </div>
          <div class="row mb-3 {{ $errors->has('phone')?'has-error':'' }}">
            <label class="col-sm-3 col-form-label col_form_label">Phone:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control form_control" id="" name="phone">
              @if($errors->has('phone'))
              <span class="invalid-feedback " role="alert">
                <strong>{{$errors->first('phone')}}</strong>
              </span>
              @endif
            </div>
          </div>
          <div class="row mb-3 {{ $errors->has('email')?'has-error':'' }}">
            <label class="col-sm-3 col-form-label col_form_label">Email<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input type="email" class="form-control form_control" id="" name="email">
              @if($errors->has('email'))
              <span class="invalid-feedback " role="alert">
                <strong>{{$errors->first('email')}}</strong>
              </span>
              @endif
            </div>
          </div>
          <div class="row mb-3 {{ $errors->has('username')?'has-error':'' }}">
            <label class="col-sm-3 col-form-label col_form_label">Username<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control form_control" id="" name="username">
              @if($errors->has('username'))
              <span class="invalid-feedback " role="alert">
                <strong>{{$errors->first('username')}}</strong>
              </span>
              @endif
            </div>
          </div>
          <div class="row mb-3 {{ $errors->has('password')?'has-error':'' }}">
            <label class="col-sm-3 col-form-label col_form_label">Password<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input type="password" class="form-control form_control" id="" name="password">
              @if($errors->has('password'))
              <span class="invalid-feedback " role="alert">
                <strong>{{$errors->first('password')}}</strong>
              </span>
              @endif
            </div>
          </div>
          <div class="row mb-3 {{ $errors->has('confirmPassword')?'has-error':'' }}">
            <label class="col-sm-3 col-form-label col_form_label">Confirm-Password<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input type="password" class="form-control form_control" id="" name="confirmPassword">
              @if($errors->has('confirmPassword'))
              <span class="invalid-feedback " role="alert">
                <strong>{{$errors->first('confirmPassword')}}</strong>
              </span>
              @endif
            </div>
          </div>
          <div class="row mb-3 {{ $errors->has('role')?'has-error':'' }}">
            <label class="col-sm-3 col-form-label col_form_label">User Role<span class="req_star">*</span>:</label>
            <div class="col-sm-4">
              <select class="form-control form_control" id="" name="role">
                <option value="">Select Role</option>
                @php
                $allRole = App\Models\Role::where('role_status',1)->get();
                @endphp
                @foreach($allRole as $all)
                <option value="{{ $all->role_id }}">{{ $all->role_name }}</option>
                @endforeach
              </select>
              @if($errors->has('role'))
              <span class="invalid-feedback " role="alert">
                <strong>{{$errors->first('role')}}</strong>
              </span>
              @endif
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label col_form_label">Photo:</label>
            <div class="col-sm-4">
              <input type="file" class="form-control form_control" id="" name="photo">
            </div>
          </div>
        </div>
        <div class="card-footer text-center">
          <button type="submit" class="btn btn-sm btn-dark">REGISTRATION</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection