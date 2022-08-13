@extends('layouts.app')
@section('title', 'Orders Information')
@section('content')
<div id="page-content">
  <div class="cart-page">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="section-title">
            <span class="theme-secondary-color">Orders</span> Information
          </div>
        </div>
      </div>

      @if(session()->has('notif'))
        <div class="checkout-payable">{{ session()->get('notif') }}</div>
      @endif
      <div class="row">
        <div class="col s12">
          <div class="cart-box">
          	<div class="checkout-payable">
              @foreach($allordersinfo as $aloi)
            <div class="cart-cp cart-total">
              <div class="cp-left">Order No</div>
              <div class="cp-right">{{ $aloi->invoice }}</div>
            </div>
            <div class="cart-cp cart-total">
              <div class="cp-left">Order Date</div>
              <div class="cp-right">{{$aloi->created_at->timezone('Asia/Dhaka')->format('d M Y ')}}</div>
            </div>
            <div class="cart-cp cart-total">
              <div class="cp-left">Order Status</div>
              <div class="cp-right">{{$aloi->status}}</div>
            </div>
            @endforeach
          </div>
            <!-- item-->
            @foreach($allordersproductinfo as $alopi)
            <div class="cart-item">
              <div class="ci-img">
                <div class="ci-img-product" style="background-image: url(/productpic/{{ $alopi->picture  }});">
                </div>
              </div>
              <div class="ci-name">
                <div class="cin-top">
                  <div class="cin-title">{{ $alopi->producttitle }}</div>
                  <div class="cin-price">৳ {{ $alopi->productprice }}</div>
                  <div class="cin-details">{{ $alopi->color }}, {{ $alopi->size }}</div>
                </div>
              </div>
              <div class="ci-price">
                <div class="qty-total-price">
                  <div class="qty-prc">

                      <center><b>{{ $alopi->quantity }}</b></center>
              
                  </div>
                </div>
              </div>
              <div style="clear: both"></div>
            </div>
            <!-- end item-->
            @endforeach
          </div>
          @foreach($allordersinfo as $aloi)
          <div class="checkout-payable">
            <div class="cart-cp cart-total">
              <div class="cp-left">Total Amount</div>
              <div class="cp-right">৳ {{ $aloi->totalamount }}</div>
            </div>
            <div class="cart-cp cart-delivery">
              <div class="cp-left">Payment Amount</div>
              <div class="cp-right">৳ {{ $aloi->paymentamount }}</div>
            </div>
            <div class="cart-cp cart-total-payable">
              <div class="cp-left">Due Amount</div>
              <div class="cp-right">৳ {{ $aloi->totalamount - $aloi->paymentamount }}</div>
            </div>
          </div>
          <div class="content-wrap page-cart">
            <div class="subsite">
            <div class="row">
                <div class="col s12">
                  <div class="chart-box">
                    <div class="cb-box">
                      <div class="extraservice">
                        <div class="service-row">
                          <div class="es-left"><i class="fab fa-wpforms"></i> Shipping Information</div>
                          <div class="clear"></div>
                        </div>
                        <div class="service-row">
                          <div class="es-left">Name</div>
                          <div class="es-right"> {{ $aloi->username }}</div>
                          <div class="clear"></div>
                        </div>
                        <div class="service-row">
                          <div class="es-left">Address</div>
                          <div class="es-right"> {{ $aloi->address }}</div>
                          <div class="clear"></div>
                        </div>
                        <div class="service-row">
                          <div class="es-left">Phone Number</div>
                          <div class="es-right"> {{ $aloi->phonenumber }}</div>
                          <div class="clear"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


          @if($aloi->paymentmethod == 'COD')
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
                          <div class="es-right"> {{ $aloi->paymentmethod }}</div>
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
                          <div class="es-right"> {{ $aloi->paymentmethod }}</div>
                          <div class="clear"></div>
                        </div>
                        <div class="service-row">
                          <div class="es-left">Sender Phone Number</div>
                          <div class="es-right"> {{ $aloi->senderphonenumber }}</div>
                          <div class="clear"></div>
                        </div>
                        <div class="service-row">
                          <div class="es-left">TrxID</div>
                          <div class="es-right"> {{ $aloi->trxid }}</div>
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

          @if( $aloi->status == 'Pending')
              <div class="row">
            <form action="{{ route('updatependingorder', ['id' => $aloi->id]) }}" method="post" enctype="multipart/form-data" class="col s12">
              {{csrf_field()}}
              <div class="row">
                <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
                  <input id="paymentamount" type="text" name="paymentamount" class="form-control @error('paymentamount') is-invalid @enderror" required autocomplete="paymentamount" placeholder="Enter Your Payment Amount" class="validate">
                    @error('paymentamount')
                                          
                      <p style="color:red;">{{ $message }}</p>
                                          
                    @enderror
                  <label for="paymentamount">Payment Amonunt</label>
                </div>
              </div>
              <div class="row">
                <div class="col s12 m6 l4 offset-m3 offset-l4">
                  <label for="status">Status</label>
                  <select id="status" type="text" name="status" class="form-control @error('status') is-invalid @enderror" value="{{ $aloi->status }}" required autocomplete="status" class="validate" required="status" style="display: block;">
                    <option value="">Select Options</option>
                      <option value="Pending">Pending</option>
                      <option value="Processing">Processing</option>
                      <option value="Picked">Picked</option>
                      <option value="Delivered">Delivered</option>
                      <option value="Cancelled">Cancelled</option>
                  </select>
                    @error('status')
                                          
                      <p style="color:red;">{{ $message }}</p>
                                          
                    @enderror
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12 m6 l4 offset-m3 offset-l4 center">
                  <input class="waves-effect waves-light btn" value="UPDATE" type="submit"></div>
              </div>
            </form>
          </div>
          @elseif( $aloi->status == 'Picked')
              <div class="row">
            <form action="{{ route('updateorder', ['id' => $aloi->id]) }}" method="post" enctype="multipart/form-data" class="col s12">
              {{csrf_field()}}
              <div class="row">
                <div class="col s12 m6 l4 offset-m3 offset-l4">
                  <label for="status">Status</label>
                  <select id="status" type="text" name="status" class="form-control @error('status') is-invalid @enderror" value="{{ $aloi->status }}" required autocomplete="status" class="validate" required="status" style="display: block;">
                    <option value="">Select Options</option>
                      <option value="Pending">Pending</option>
                      <option value="Processing">Processing</option>
                      <option value="Picked">Picked</option>
                      <option value="Delivered">Delivered</option>
                      <option value="Cancelled">Cancelled</option>
                  </select>
                    @error('status')
                                          
                      <p style="color:red;">{{ $message }}</p>
                                          
                    @enderror
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12 m6 l4 offset-m3 offset-l4 center">
                  <input class="waves-effect waves-light btn" value="UPDATE" type="submit"></div>
              </div>
            </form>
          </div>
          @elseif( $aloi->status == 'Processing')
              <div class="row">
            <form action="{{ route('updateorder', ['id' => $aloi->id]) }}" method="post" enctype="multipart/form-data" class="col s12">
              {{csrf_field()}}
              <div class="row">
                <div class="col s12 m6 l4 offset-m3 offset-l4">
                  <label for="status">Status</label>
                  <select id="status" type="text" name="status" class="form-control @error('status') is-invalid @enderror" value="{{ $aloi->status }}" required autocomplete="status" class="validate" required="status" style="display: block;">
                    <option value="">Select Options</option>
                      <option value="Pending">Pending</option>
                      <option value="Processing">Processing</option>
                      <option value="Picked">Picked</option>
                      <option value="Delivered">Delivered</option>
                      <option value="Cancelled">Cancelled</option>
                  </select>
                    @error('status')
                                          
                      <p style="color:red;">{{ $message }}</p>
                                          
                    @enderror
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12 m6 l4 offset-m3 offset-l4 center">
                  <input class="waves-effect waves-light btn" value="UPDATE" type="submit"></div>
              </div>
            </form>
          </div>
          @else
          @endif
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
@endsection