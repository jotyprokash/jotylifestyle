@extends('layouts.app')
@section('title', 'My Orders')
@section('content')
<div id="page-content">
  <div class="wishlist-page">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="section-title">
            <span class="theme-secondary-color">My</span> Orders
          </div>
        </div>
      </div>
      @if(session()->has('notif'))
        <div class="checkout-payable">{{ session()->get('notif') }}</div>
      @endif
      <div class="box-wish-list">
        @if(\App\Order::where('userid', Auth::user()->id)->count() > 0)
        <div class="content-wrap page-cart">
          <div class="subsite">
            <div class="row">
              <div class="col-md-12">
                <div class="chart-box">
                  <div class="cb-box">
                    <div class="extraservice">
                      @foreach($allorders as $alo)
                      <div class="service-row">
                        <div class="es-left">{{$no++}}. {{$alo->invoice}}</div><div class="es-right"> <span>{{ $alo->status }}</span> | <a href="/orderinformation/{{ $alo->id }}"><i class="fa fa-eye"></i></a> 
                          <!--
                          <a href="/invoice/{{ $alo->id }}"><i class="fa fa-print"></i></a>
                          -->
                        </div>
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
        @else
        <div class="checkout-payable">No Orders !</div>
        @endif
      </div>
    </div>

    @if(\App\Order::where('userid', Auth::user()->id)->count() > 10)
    <div class="container">
      <div class="row">
        <div class="col s12">
          <ul class="pagination">
            <li class="waves-effect">
            <a href="{{$allorders->previousPageUrl()}}"><i class="material-icons">chevron_left</i></a>
          </li>
          <li class="waves-effect">
            <a href="{{$allorders->nextPageUrl()}}"><i class="material-icons">chevron_right</i></a>
          </li>
          </ul>
        </div>
      </div>
    </div>
    @else
    @endif
  </div>
</div>
@endsection