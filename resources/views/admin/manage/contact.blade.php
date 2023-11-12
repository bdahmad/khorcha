@extends('layouts/admin')
@section('content')
<div class="row">
  <div class="col-md-12 ">
    <form method="post" action="{{ route('insert-income') }}">
      @csrf
      <div class="card mb-3">
        <div class="card-header">
          <div class="row">
            <div class="col-md-8 card_title_part">
              <i class="fab fa-gg-circle"></i>Contact Information
            </div>
            <div class="col-md-4 card_button_part">
              <a href="{{route('basic') }}" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>Basic Information</a>
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
            <div class="col-md-6">
               <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone-square-alt"></i></span>
                  <input type="text" class="form-control" placeholder="Phone No ..." value="{{$data->contact_phone1}}">
               </div>
            </div>       
            <div class="col-md-6">
               <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone-square-alt"></i></span>
                  <input type="text" class="form-control" placeholder="Phone No ..." value="{{$data->contact_phone2}}">
               </div>
            </div>       
            <div class="col-md-6">
               <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone-square-alt"></i></span>
                  <input type="text" class="form-control" placeholder="Phone No ..." value="{{$data->contact_phone3}}">
               </div>
            </div>       
            <div class="col-md-6">
               <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone-square-alt"></i></span>
                  <input type="text" class="form-control" placeholder="Phone No ..." value="{{$data->contact_phone4}}">
               </div>
            </div>       
            <div class="col-md-6">
               <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope"></i></span>
                  <input type="text" class="form-control" placeholder="Email Address..." value="{{$data->contact_email1}}">
               </div>
            </div>       
            <div class="col-md-6">
               <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope"></i></span>
                  <input type="text" class="form-control" placeholder="Email Address..." value="{{$data->contact_email2}}">
               </div>
            </div>       
            <div class="col-md-6">
               <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope"></i></span>
                  <input type="text" class="form-control" placeholder="Email Address..." value="{{$data->contact_email3}}">
               </div>
            </div>       
            <div class="col-md-6">
               <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope"></i></span>
                  <input type="text" class="form-control" placeholder="Email Address..." value="{{$data->contact_email4}}">
               </div>
            </div>       
            <div class="col-md-6">
               <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-map-marker-alt"></i></span>
                  <input type="text" class="form-control" placeholder="Address...." value="{{$data->contact_address1}}">
               </div>
            </div>       
            <div class="col-md-6">
               <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-map-marker-alt"></i></span>
                  <input type="text" class="form-control" placeholder="Address...." value="{{$data->contact_address2}}">
               </div>
            </div>       
            <div class="col-md-6">
               <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-map-marker-alt"></i></span>
                  <input type="text" class="form-control" placeholder="Address...." value="{{$data->contact_address3}}">
               </div>
            </div>       
            <div class="col-md-6">
               <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-map-marker-alt"></i></span>
                  <input type="text" class="form-control" placeholder="Address...." value="{{$data->contact_address4}}">
               </div>
            </div>       
             
          </div>     
        <div class="card-footer text-center">
          <button type="submit" class="btn btn-sm btn-dark">UPDATE</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection