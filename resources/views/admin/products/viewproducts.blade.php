@extends('layouts.app')
@section('title', 'View Products')
@section('content')
<div id="page-content">
  <div class="wishlist-page">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="section-title">
            <span class="theme-secondary-color">Products</span> List
          </div>
        </div>
      </div>
      @if(session()->has('notif'))
        <div class="checkout-payable">{{ session()->get('notif') }}</div>
      @endif
      <div class="box-wish-list">
        @if(\App\Product::count() > 0)
        <div class="content-wrap page-cart">
          <div class="subsite">
            <div class="row">
              <div class="col-md-12">
                <div class="chart-box">
                  <div class="cb-box">
                    <div class="extraservice">
                      @foreach($allproducts as $alp)
                      <div class="service-row">
                        <div class="es-left">{{$no++}}. {{$alp->title}}</div>
                        <div class="es-right"> <a href="/viewproductsinfo/{{ $alp->id }}"><i class="fa fa-eye"></i></a> | <a href="/updateproducts/{{ $alp->id }}"><i class="fas fa-cog"></i></a> | <a href="/deleteproducts/{{ $alp->id }}"><i class="far fa-times-circle"></i></a></div>
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
        <div class="checkout-payable">No Products !</div>
        @endif
      </div>
    </div>

    @if(\App\Product::count() > 10)
    <div class="container">
      <div class="row">
        <div class="col s12">
          <ul class="pagination">
            <li class="waves-effect">
            <a href="{{$allproducts->previousPageUrl()}}"><i class="material-icons">chevron_left</i></a>
          </li>
          <li class="waves-effect">
            <a href="{{$allproducts->nextPageUrl()}}"><i class="material-icons">chevron_right</i></a>
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
