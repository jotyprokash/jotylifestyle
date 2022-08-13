@extends('layouts.app')
@section('title', 'Track Results')
@section('content')
<div id="page-content">
  <div class="wishlist-page">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="section-title">
            <span class="theme-secondary-color">Track</span> Results
          </div>
        </div>
      </div>

      <div class="box-wish-list">
        @if($orderinfo->count() > 0)
        <div class="content-wrap page-cart">
          <div class="subsite">
            <div class="row">
              <div class="col-md-12">
                <div class="chart-box">
                  <div class="cb-box">
                    <div class="extraservice">
                      @foreach($orderinfo as $oi)
                      <div class="service-row">
                        <div class="es-left">{{$oi->invoice}}</div>
                        <div class="es-right"> <a href="/vieworder/{{ $oi->id }}"><i class="fa fa-eye"></i></a></div>
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
        <div class="checkout-payable">No Results Found !</div>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection
