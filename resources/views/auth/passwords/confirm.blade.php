@extends('layouts.app')
@section('title', 'Confirm Password')
@section('content')
<div id="page-content">
  <div class="login-form">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="section-title">
            <span class="theme-secondary-color">Confirm</span> Password
          </div>
        </div>
      </div>
      <div class="row">
        @if(session()->has('notif'))
          <div class="checkout-payable">{{ session()->get('notif') }}</div>
        @endif
        <form action="{{ route('password.confirm') }}" method="post" class="col s12">
          @csrf
          <div class="row">
            <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
              <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password" placeholder="Enter Your Password" class="validate" required="password">
                @error('password')
                                      
                  <p style="color:red;">{{ $message }}</p>
                                      
                @enderror
              <label for="password">Password</label>
            </div>
          </div>
          <div class="forgot-password-link">
          @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
          @endif
          </div>
          <div class="row">
            <div class="input-field col s12 m6 l4 offset-m3 offset-l4 center">
              <input class="waves-effect waves-light btn" value="CONFIRM" type="submit"></div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
