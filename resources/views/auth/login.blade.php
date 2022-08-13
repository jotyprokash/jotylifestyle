@extends('layouts.app')
@section('title', 'Sign In')
@section('content')
<div id="page-content">
  <div class="login-form">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="section-title">
            <span class="theme-secondary-color">Sign In</span> Account
          </div>
        </div>
      </div>
      <div class="row">
        <form action="{{ route('login') }}" method="post" class="col s12">
          @csrf
          <div class="row">
            <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
              <input id="phonenumber" type="tel" name="phonenumber" class="form-control @error('phonenumber') is-invalid @enderror" pattern="01[3-9][0-9]{8}" required autocomplete="phonenumber" placeholder="Enter Your Phone Number" class="validate" required="phonenumber">
                @error('phonenumber')
                                      
                  <p style="color:red;">{{ $message }}</p>
                                      
                @enderror
              <label for="phonenumber">Phone Number</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
              <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter Your Password" required autocomplete="current-password" class="validate" required="password">
                @error('password')
                                      
                  <p style="color:red;">{{ $message }}</p>
                                      
                @enderror
              <label for="password">Password</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m6 l4 offset-m3 offset-l4 center">
              <input class="waves-effect waves-light btn" value="SIGN IN" type="submit"></div>
          </div>
        </form>
      </div>
      <div class="row fp-text">
        <div class="col s12">
          <div class="forgot-password-link">
            @if (Route::has('password.request'))
              <a href="{{ route('password.request') }}">Forgot Password</a>
            @endif 
          </div>
        </div>
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
           Don't have an Account ? <a href="/register">Sign Up Now</a> !
        </div>
      </div>
    </div>
  </div>
</div>
@endsection