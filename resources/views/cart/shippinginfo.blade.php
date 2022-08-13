@extends('layouts.app')
@section('title', 'Shipping Information')
@section('content')
<div id="page-content" class="shipping-checkout-page">
  <div class="cart-page">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="section-title">
            <span class="theme-secondary-color">Shipping</span> Information
          </div>
        </div>
      </div>
          <div class="shipping-info-wrap ck-box">
            <div class="row">
              <form method="post" action="{{ route('shippinginfo') }}">
                {{csrf_field()}}
              <input type="hidden" name="userid" id="userid" value="{{Auth::user()->id }}">
              <div class="input-field col s12 m12 l12 ">
                <div class="payment-method-text">
                  <i class="fab fa-wpforms"></i> Shipping Information
                </div>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12 m12 l12 ">
                <input id="name" name="username" value="{{Auth::user()->name }}" type="text" class="form-control @error('name') is-invalid @enderror" required autocomplete="name" placeholder="Enter Your Name" class="validate">
                @error('name')
                                      
                  <p style="color:red;">{{ $message }}</p>
                                      
                @enderror
                <label for="name">Name</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12 m12 l12 ">
                <input id="address" name="address" value="{{Auth::user()->address }}" type="text" class="form-control @error('address') is-invalid @enderror" required autocomplete="address" placeholder="Enter Your Address" class="validate">
                @error('address')
                                      
                  <p style="color:red;">{{ $message }}</p>
                                      
                @enderror
                <label for="address">Address</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12 m12 l12 ">
                <input id="phonenumber" name="phonenumber" value="{{Auth::user()->phonenumber }}" type="text" class="form-control @error('phonenumber') is-invalid @enderror" required autocomplete="phonenumber" placeholder="Enter Your Contact Number" class="validate">
                @error('phonenumber')
                                      
                  <p style="color:red;">{{ $message }}</p>
                                      
                @enderror
                <label for="phonenumber">Contact number</label>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m12 l12 center">
              <button class="btn theme-btn-rounded ">NEXT</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection