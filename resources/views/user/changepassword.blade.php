@extends('layouts.app')
@section('title', 'Change Password')

@section('content')
<div id="page-content">
  <div class="login-form">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="section-title">
            <span class="theme-secondary-color">Change</span> Password
          </div>
        </div>
      </div>
      <div class="row">
        @if(session()->has('notif'))
          <div class="checkout-payable">{{ session()->get('notif') }}</div>
        @endif
        <form action="{{ route('changepassword') }}" method="post" enctype="multipart/form-data" class="col s12">
          {{csrf_field()}}
          <div class="row">
            <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
              <input id="oldpassword" type="text" name="oldpassword" class="form-control @error('oldpassword') is-invalid @enderror" required autocomplete="oldpassword" placeholder="Enter Your Old Password" class="validate">
                @error('oldpassword')
                                      
                  <p style="color:red;">{{ $message }}</p>
                                      
                @enderror
              <label for="oldpassword">Old Password</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
              <input id="newpassword" type="tel" name="newpassword" class="form-control @error('newpassword') is-invalid @enderror" required autocomplete="newpassword" placeholder="Enter Your New Password" class="validate">
                @error('newpassword')
                                      
                  <p style="color:red;">{{ $message }}</p>
                                      
                @enderror
              <label for="newpassword">New Password</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m6 l4 offset-m3 offset-l4 center">
              <input class="waves-effect waves-light btn" value="CHANGE" type="submit"></div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
