@extends('layouts.app')
@section('title', 'My Cart')
@section('content')
<div id="page-content">
  <div class="cart-page">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="section-title">
            <span class="theme-secondary-color">Shopping</span> Cart
          </div>
        </div>
      </div>

      @if( Cart::getContent()->count() > 0)

      <div class="row">
        <form action="/shippinginfo">
          {{ csrf_field() }}
        <div class="col s12">
          @if(session()->has('notif'))
          <div class="checkout-payable">{{ session()->get('notif') }}</div>
          @endif
          <div class="cart-box">
            <!-- item-->
            @foreach(Cart::getContent() as $pdt)
            <div class="cart-item">
              <div class="ci-img">
                <div class="ci-img-product" style="background-image: url(/productpic/{{ $pdt->image }});">
                </div>
              </div>
              <div class="ci-name">
                <div class="cin-top">
                  <div class="cin-title">{{ $pdt->name }}</div>
                  <div class="cin-price">৳ {{ $pdt->price }}</div>
                  <div class="cin-details">{{ $pdt->color }}, {{ $pdt->size }}</div>
                </div>
              </div>
              <input type="hidden" value="{{ $pdt->id}}" id="id" name="id">
              <div class="ci-price">
                <div class="qty-total-price">
                  <div class="qty-prc">
                    <div class="quantity">
                      <a href="{{ route('cartdecr', ['id' => $pdt->id ]) }}" class="quantity-button quantity-down">-</a>
                      <center><b>{{ $pdt->quantity }}</b></center>
                      <a href="{{ route('cartincr', ['id' => $pdt->id ]) }}" class="quantity-button quantity-up">+</a>                    
                    </div>
                  </div>
                </div>
              </div>
              <div class="wi-remove">
                <a href="{{ route('cartdelete', ['id' => $pdt->id ]) }}"><i class="far fa-times-circle"></i></a>
              </div>
              <div style="clear: both"></div>
            </div>
            <!-- end item-->
            @endforeach
          </div>
          <div class="checkout-payable">
            <div class="cart-cp cart-total">
              <div class="cp-left">Total</div>
              <div class="cp-right">৳ {{ Cart::getTotal() }}</div>
            </div>
            <div class="cart-cp cart-delivery">
              <div class="cp-left">Delivery</div>
              <div class="cp-right">৳ 0</div>
            </div>
            <div class="cart-cp cart-total-payable">
              <div class="cp-left">Total payable</div>
              <div class="cp-right">৳ {{ Cart::getTotal() }}</div>
            </div>
          </div>
          <button class="btn button-add-cart checkout-button">Checkout <i class="fas fa-arrow-circle-right"></i></button>
        </div>
       </form>
      </div>

      @else

      <div class="section populer-search">
        <div class="container">
          <div class="row row-title">
            <div class="col s12">
              <div class="section-title">
                <img src="/img/emptycart.png" alt="EmptyCart"><br>
                <span class="theme-secondary-color">Your Cart</span> is Empty !
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <div class="list-tag-word">
                <a href="/" class="tag-word">Continue Shopping</a>
              </div>
            </div>
          </div>
        </div>
      </div>

      @endif

    </div>
  </div>
</div>
@endsection