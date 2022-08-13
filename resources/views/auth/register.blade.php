@extends('layouts.app')
@section('title', 'Sign Up')
@section('content')
<div id="page-content">
  <div class="login-form">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="section-title">
            <span class="theme-secondary-color">Sign Up</span> Account
          </div>
        </div>
      </div>
      <div class="row">
        <form action="{{ route('register') }}" method="post" class="col s12">
          @csrf
          <div class="row">
            <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
              <input id="name" type="text" name="name" class="form-control @error('name') is-invalid @enderror" required autocomplete="name" placeholder="Enter Your Name" value="{{ old('name') }}" class="validate" required="name">
                @error('name')
                                      
                  <p style="color:red;">{{ $message }}</p>
                                      
                @enderror
              <label for="name">Name</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
              <input id="email" type="text" name="email" class="form-control @error('email') is-invalid @enderror" required autocomplete="email" placeholder="Enter Your Email" value="{{ old('email') }}" class="validate" required="email">
                @error('email')
                                      
                  <p style="color:red;">{{ $message }}</p>
                                      
                @enderror
              <label for="email">Email</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
              <input id="phonenumber" type="tel" name="phonenumber" class="form-control @error('phonenumber') is-invalid @enderror" required autocomplete="phonenumber" pattern="01[3-9][0-9]{8}" value="{{ old('phonenumber') }}" placeholder="Enter Your Phone Number" class="validate" required="phonenumber">
                @error('phonenumber')
                                      
                  <p style="color:red;">{{ $message }}</p>
                                      
                @enderror
              <label for="phonenumber">Phone Number</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
              <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter Your Password" required autocomplete="new-password" class="validate" required="password">
                @error('password')
                                      
                  <p style="color:red;">{{ $message }}</p>
                                      
                @enderror
              <label for="password">Password</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
              <input id="password-confirm" type="password" class="validate" class="form-control @error('password') is-invalid @enderror" placeholder="Enter Confirm Password" name="password_confirmation" required autocomplete="new-password" required="password_confirmation">
                @error('password')
                                      
                  <p style="color:red;">{{ $message }}</p>
                                      
                @enderror
              <label for="confirmpassword">Confirm Password</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
              <input id="address" type="text" name="address" class="form-control @error('address') is-invalid @enderror" required autocomplete="address" placeholder="Enter Your Address" value="{{ old('address') }}" class="validate" required="address">
                @error('address')
                                      
                  <p style="color:red;">{{ $message }}</p>
                                      
                @enderror
              <label for="address">Address</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m6 l4 offset-m3 offset-l4 center">
              <input class="waves-effect waves-light btn" value="SIGN UP" type="submit"></div>
          </div>
        </form>
      </div>
      <div class="row">
        <div class="col s12">
          <div class="or-line">
            <div class="ol-or">OR</div>
            <div class="ol-line"></div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col s12 center">
           Already registered ? <a href="/login">Sign In Now</a> !
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
