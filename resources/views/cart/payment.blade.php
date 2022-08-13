@extends('layouts.app')
@section('title', 'Payment Method')
@section('content')
<div id="page-content" class="shipping-checkout-page">
  <div class="cart-page">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="section-title">
            <span class="theme-secondary-color">Payment</span> Method
          </div>
        </div>
      </div>
        <div class="row">
        <form method="post" action="{{ route('payment') }}" class="col s12">
            {{csrf_field()}}
            @foreach($allorders as $alo)
              <input type="hidden" name="shippingid" id="shippingid" value="{{ $alo->id }}">
            @endforeach
        <div class="payment-method-wrap ck-box">
            <div class="row">
              <div class="input-field col s12 m12 l12 ">
                <div class="payment-method-text">
                  <i class="far fa-credit-card"></i> Payment Method
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col s12 m12 l12 ">
                <p>
                  <input class="with-gap" name="paymentmethod" type="radio" id="test1" value="bKash" />
                  <label for="test1">bKash</label>
                </p>
              </div>
            </div>
            <div class="row">
              <div class="col s12 m12 l12 ">
                <p>
                  <input class="with-gap" name="paymentmethod" type="radio" id="test2" value="Rocket" />
                  <label for="test2">Rocket</label>
                </p>
              </div>
            </div>
            <div class="row">
              <div class="col s12 m12 l12 ">
                <p>
                  <input class="with-gap" name="paymentmethod" type="radio" id="test3" value="Nagad" />
                  <label for="test3">Nagad</label>
                </p>
              </div>
            </div>
            <div class="row">
              <div class="col s12 m12 l12 ">
                <p>
                  <input class="with-gap" name="paymentmethod" type="radio" id="test4" value="COD" />
                  <label for="test4">Cash On Delivery</label>
                </p>
              </div>
            </div>
          </div>
          <br>
          <div id="payment" class="billing-detail-wrap ck-box">
            <div class="row">
              <div class="input-field col s12 m12 l12 ">
                <div class="payment-method-text">
                  <i class="fab fa-wpforms"></i> Order Payment
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col s12">
                <div style="margin: 0px 0px 10px">Account No :  <b>01733000689</b></div>
                <div style="margin: 0px 0px 10px">Account Type : <b>Personal</b></div>
                <div style="margin: 0px 0px 10px">Reference : <b>{{$latestOrder->id}}</b></div>
                <div style="margin: 0px 0px 10px">Please send the above money to this <b>Account Number</b> with <b>Reference</b> and write <b>Sender Phone Number</b> & <b>Transaction ID</b> below there.</div>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12 m12 l12 ">
                <input id="senderphonenumber" name="senderphonenumber" type="text" class="form-control @error('senderphonenumber') is-invalid @enderror" placeholder="Enter Sender Phone Number" class="validate">
                @error('senderphonenumber')
                                      
                  <p style="color:red;">{{ $message }}</p>
                                      
                @enderror
                <label for="senderphonenumber">Sender Phone Number</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12 m12 l12 ">
                <input id="trxid" name="trxid" type="text" class="form-control @error('trxid') is-invalid @enderror" placeholder="Enter TrxID" class="validate">
                @error('trxid')
                                      
                  <p style="color:red;">{{ $message }}</p>
                                      
                @enderror
                <label for="trxid">TrxID</label>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<script type="text/javascript">
$('input[type="radio"]').click(function(e) {
  if(e.target.value == 'bKash') 
  {
    $('#payment').show();
  } 
  else if(e.target.value == 'Rocket')
  {
    $('#payment').show();
  }
  else if(e.target.value == 'Nagad')
  {
    $('#payment').show();
  }
  else if(e.target.value == 'COD')
  {
    $('#payment').hide();
  }
  else {
    $('#payment').hide();
  }
})
$('#payment').hide();
    </script>
@endsection