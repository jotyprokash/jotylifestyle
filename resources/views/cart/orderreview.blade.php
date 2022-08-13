@extends('layouts.app')
@section('title', 'Order Review')
@section('content')
<div id="page-content">
  <div class="cart-page">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="section-title">
            <span class="theme-secondary-color">Order</span> Review
          </div>
        </div>
      </div>

      <div class="row">
        <form action="{{ route('orderreview') }}" method="post">
          {{ csrf_field() }}
          @foreach($allorders as $alo)
            <input type="hidden" name="shippingid" id="shippingid" value="{{ $alo->id }}">

            <input type="hidden" name="userid" id="userid" value="{{ $alo->userid }}">

            <input type="hidden" name="username" id="username" value="{{ $alo->username }}">

            <input type="hidden" name="address" id="address" value="{{ $alo->address }}">

            <input type="hidden" name="phonenumber" id="phonenumber" value="{{ $alo->phonenumber }}">

            <input type="hidden" name="status" id="status" value="{{ $alo->status }}">

          @endforeach
                  
          @foreach($allpayments as $alp)

            <input type="hidden" name="paymentid" id="paymentid" value="{{ $alp->id }}">

            <input type="hidden" name="senderphonenumber" id="senderphonenumber" value="{{ $alp->senderphonenumber }}">

            <input type="hidden" name="trxid" id="trxid" value="{{ $alp->trxid }}">

            <input type="hidden" name="paymentmethod" id="paymentmethod" value="{{ $alp->paymentmethod }}">

            <input type="hidden" name="totalamount" id="totalamount" value="{{ $alp->totalamount }}">

            <input type="hidden" name="paymentamount" id="paymentamount" value="{{ $alp->paymentamount }}">
          @endforeach
        <div class="col s12">
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

                      <center><b>{{ $pdt->quantity }}</b></center>
              
                  </div>
                </div>
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
          </div>



          <div class="content-wrap page-cart">
          <div class="subsite">
          <div class="row">
              <div class="col s12">
                <div class="chart-box">
                  <div class="cb-box">
                    <div class="extraservice">
                      @foreach($allorders as $alo)
                      <div class="service-row">
                        <div class="es-left"><i class="fab fa-wpforms"></i> Shipping Information</div>
                        <div class="clear"></div>
                      </div>
                      <div class="service-row">
                        <div class="es-left">Name</div>
                        <div class="es-right"> {{ $alo->username }}</div>
                        <div class="clear"></div>
                      </div>
                      <div class="service-row">
                        <div class="es-left">Address</div>
                        <div class="es-right"> {{ $alo->address }}</div>
                        <div class="clear"></div>
                      </div>
                      <div class="service-row">
                        <div class="es-left">Phone Number</div>
                        <div class="es-right"> {{ $alo->phonenumber }}</div>
                        <div class="clear"></div>
                      </div>
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


        @if($obpaymentmethod == 'COD')
        <div class="content-wrap page-cart">
          <div class="subsite">
          <div class="row">
              <div class="col s12">
                <div class="chart-box">
                  <div class="cb-box">
                    <div class="extraservice">
                      <div class="service-row">
                        <div class="es-left"><i class="far fa-credit-card"></i> Payment Information</div>
                        <div class="clear"></div>
                      </div>
                      <div class="service-row">
                        <div class="es-left">Payment Method</div>
                        <div class="es-right"> {{$obpaymentmethod}}</div>
                        <div class="clear"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @else
        <div class="content-wrap page-cart">
          <div class="subsite">
          <div class="row">
              <div class="col s12">
                <div class="chart-box">
                  <div class="cb-box">
                    <div class="extraservice">
                      <div class="service-row">
                        <div class="es-left"><i class="far fa-credit-card"></i> Payment Information</div>
                        <div class="clear"></div>
                      </div>
                      <div class="service-row">
                        <div class="es-left">Payment Method</div>
                        <div class="es-right"> {{$obpaymentmethod}}</div>
                        <div class="clear"></div>
                      </div>
                      <div class="service-row">
                        <div class="es-left">Sender Phone Number</div>
                        <div class="es-right"> {{$obsenderphonenumber}}</div>
                        <div class="clear"></div>
                      </div>
                      <div class="service-row">
                        <div class="es-left">TrxID</div>
                        <div class="es-right"> {{$obtrxid}}</div>
                        <div class="clear"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endif

          <button class="btn button-add-cart checkout-button">Checkout <i class="fas fa-arrow-circle-right"></i></button>
        </div>
       </form>
      </div>
    </div>
  </div>
</div>
@endsection