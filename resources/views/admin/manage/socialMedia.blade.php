@extends('layouts/admin')
@section('content')
<div class="row">
  <div class="col-md-12 ">
    <form method="post" action="{{ route('update.socialMedia') }}">
      @csrf
      <div class="card mb-3">
        <div class="card-header">
          <div class="row">
            <div class="col-md-8 card_title_part">
              <i class="fab fa-gg-circle"></i>Social Media Information
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
                  <span class="input-group-text" id="basic-addon1"><i class="fab fa-facebook-f"></i></span>
                  <input type="text" class="form-control" placeholder="" name="socialMedia_facebook" value="{{$data->socialMedia_facebook}}">
               </div>
            </div>       
            <div class="col-md-6">
               <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1"><i class="fab fa-linkedin-in"></i></span>
                  <input type="text" class="form-control" placeholder="" name="socialMedia_linkedin" value="{{$data->socialMedia_linkedin}}">
               </div>
            </div>       
            <div class="col-md-6">
               <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1"><i class="fab fa-instagram"></i></span>
                  <input type="text" class="form-control" placeholder="" name="socialMedia_instagram" value="{{$data->socialMedia_instagram}}">
               </div>
            </div>       
            <div class="col-md-6">
               <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1"><i class="fab fa-telegram-plane"></i></span>
                  <input type="text" class="form-control" placeholder="" name="socialMedia_telegram" value="{{$data->socialMedia_telegram}}">
               </div>
            </div>       
            <div class="col-md-6">
               <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1"><i class="fab fa-twitter"></i></span>
                  <input type="text" class="form-control" placeholder="" name="socialMedia_twitter" value="{{$data->socialMedia_twitter}}">
               </div>
            </div>       
            <div class="col-md-6">
               <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1"><i class="fab fa-whatsapp"></i></span>
                  <input type="text" class="form-control" placeholder="" name="socialMedia_whatsapp" value="{{$data->socialMedia_whatsapp}}">
               </div>
            </div>       
            <div class="col-md-6">
               <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1"><i class="fab fa-reddit-alien"></i></span>
                  <input type="text" class="form-control" placeholder="" name="socialMedia_reddit" value="{{$data->socialMedia_reddit}}">
               </div>
            </div>       
            <div class="col-md-6">
               <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1"><i class="fab fa-weixin"></i></span>
                  <input type="text" class="form-control" placeholder="" name="socialMedia_weixin" value="{{$data->socialMedia_weixin}}">
               </div>
            </div>       
            <div class="col-md-6">
               <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1"><i class="fab fa-discord"></i></span>
                  <input type="text" class="form-control" placeholder="" name="socialMedia_discord" value="{{$data->socialMedia_discord}}">
               </div>
            </div>       
            <div class="col-md-6">
               <div class="input-group mb-3">
                  <span class="input-group-text" id="basic-addon1"><i class="fab fa-youtube"></i></span>
                  <input type="text" class="form-control" placeholder="" name="socialMedia_youtube" value="{{$data->socialMedia_youtube}}">
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