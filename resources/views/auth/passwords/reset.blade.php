@extends('layouts.app')
@section('title', 'Password Reset')
@section('content')
<div id="page-content">
  <div class="login-form">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="section-title">
            <span class="theme-secondary-color">Password</span> Reset
          </div>
        </div>
      </div>
      @if(session()->has('notif'))
          <div class="checkout-payable">{{ session()->get('notif') }}</div>
      @endif
      <div class="row">
        <form action="{{ route('password.update') }}" method="post" class="col s12">
          @csrf
          <input type="hidden" name="token" value="{{ $token }}">
          <div class="row">
            <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
              <input id="email" type="tel" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $email ?? old('email') }}" required autocomplete="email" placeholder="Enter Your Email" class="validate" required="email">
                @error('email')
                                      
                  <p style="color:red;">{{ $message }}</p>
                                      
                @enderror
              <label for="email">Email</label>
            </div>
            <div class="row">
            <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
              <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password" placeholder="Enter Your New Password" class="validate" required="password">
                @error('password')
                                      
                  <p style="color:red;">{{ $message }}</p>
                                      
                @enderror
              <label for="password">New Password</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
              <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Enter Your Confirm Password" class="validate">
              <label for="password">Confirm Password</label>
            </div>
          </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m6 l4 offset-m3 offset-l4 center">
              <input class="waves-effect waves-light btn" value="RESET PASSWORD" type="submit"></div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
