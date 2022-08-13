@extends('layouts.app')
@section('title', 'User Information')
@section('content')
<div id="page-content">
  <div class="login-form">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="section-title">
            <span class="theme-secondary-color">User</span> Information
          </div>
        </div>
      </div>
        <div class="content-wrap page-cart">
          <div class="subsite">
            <div class="row">
              <div class="col-md-12">
                @foreach($allusers as $alu)
                <div class="chart-box">
                  <div class="cart-car-box">
                    <div class="chart-car"><img src="/userpic/{{ $alu->userpic }}" style="width:150px; height:150px; border-radius:50%;"></div>
                  </div>
                  <div class="cart-box-detail">
                    <ul>
                      <li><label>Name</label> : {{ $alu->name }}</li>
                      <li><label>Email</label> : {{ $alu->email }}</li>
                      <li><label>Phone Number</label> : {{ $alu->phonenumber }}</li>
                      <li><label>Address</label> : {{ $alu->address }}</li>
                    </ul>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection