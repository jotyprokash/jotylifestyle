@extends('layouts.app')
@section('title', 'User Profile')
@section('content')
<div id="page-content">
  <div class="login-form">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="section-title">
            <span class="theme-secondary-color">My</span> Profile
          </div>
        </div>
      </div>
        <div class="content-wrap page-cart">
          <div class="subsite">
            <div class="row">
              <div class="col-md-12">
                <div class="chart-box">
                  <div class="cart-car-box">
                    <div class="chart-car"><img src="/userpic/{{ Auth::user()->userpic }}" style="width:150px; height:150px; border-radius:50%;"></div>
                  </div>
                  <div class="cart-box-detail">
                    <ul>
                      <li><label>Name</label> : {{ Auth::user()->name }}</li>
                      <li><label>Email</label> : {{ Auth::user()->email }}</li>
                      <li><label>Phone Number</label> : {{ Auth::user()->phonenumber }}</li>
                      <li><label>Address</label> : {{ Auth::user()->address }}</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection