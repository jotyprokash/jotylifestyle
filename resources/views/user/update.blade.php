@extends('layouts.app')
@section('title', 'Update Account')
@section('content')
<div id="page-content">
  <div class="login-form">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="section-title">
            <span class="theme-secondary-color">Update</span> Profile
          </div>
        </div>
      </div>
      <div class="row">
        @if(session()->has('notif'))
          <div class="checkout-payable">{{ session()->get('notif') }}</div>
        @endif
        <form action="{{ route('update') }}" method="post" enctype="multipart/form-data" class="col s12">
          {{csrf_field()}}
          <div class="row">
            <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
              <input id="name" type="text" name="name" class="form-control @error('name') is-invalid @enderror" required autocomplete="name" placeholder="Enter Your Name" value="{{ $user['name'] }}" class="validate">
                @error('name')
                                      
                  <p style="color:red;">{{ $message }}</p>
                                      
                @enderror
              <label for="name">Name</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
              <input id="email" type="text" name="email" class="form-control @error('email') is-invalid @enderror" required autocomplete="email" placeholder="Enter Your Email" value="{{ $user['email'] }}" class="validate">
                @error('email')
                                      
                  <p style="color:red;">{{ $message }}</p>
                                      
                @enderror
              <label for="email">Email</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
              <input id="phonenumber" type="tel" name="phonenumber" class="form-control @error('phonenumber') is-invalid @enderror" required autocomplete="phonenumber" pattern="01[3-9][0-9]{8}" value="{{ $user['phonenumber'] }}" placeholder="Enter Your Phone Number" class="validate">
                @error('phonenumber')
                                      
                  <p style="color:red;">{{ $message }}</p>
                                      
                @enderror
              <label for="phonenumber">Phone Number</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
              <input id="address" type="text" name="address" class="form-control @error('address') is-invalid @enderror" required autocomplete="address" placeholder="Enter Your Address" value="{{ $user['address'] }}" class="validate">
                @error('address')
                                      
                  <p style="color:red;">{{ $message }}</p>
                                      
                @enderror
              <label for="address">Address</label>
            </div>
          </div>
          <div class="row">
          <div class="file-field input-field col s12 m4 offset-m3 offset-l4">
            <div class="btn">
              <span>File</span>
              <input id="userpic" type="file" name="userpic"></div>
            <div class="file-path-wrapper">
              <input id="userpic" class="file-path validate" type="text" name="userpic" placeholder="Upload Your Photo"></div>    
          </div>
        </div>
          <div class="row">
            <div class="input-field col s12 m6 l4 offset-m3 offset-l4 center">
              <input class="waves-effect waves-light btn" value="UPDATE" type="submit"></div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
