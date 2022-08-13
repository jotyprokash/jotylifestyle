@extends('layouts.app')
@section('title', 'Search Results')
@section('content')
<div id="page-content">
  <div class="wishlist-page">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="section-title">
            <span class="theme-secondary-color">Search</span> Results
          </div>
        </div>
      </div>

      <div class="box-wish-list">
        @if($userinfo->count() > 0)
        <div class="content-wrap page-cart">
          <div class="subsite">
            <div class="row">
              <div class="col-md-12">
                <div class="chart-box">
                  <div class="cb-box">
                    <div class="extraservice">
                      @foreach($userinfo as $ui)
                      <div class="service-row">
                        <div class="es-left">{{$ui->name}}</div>
                        <div class="es-right"> <a href="/viewuser/{{ $ui->id }}"><i class="fa fa-eye"></i></a> | <a href="/deleteuser/{{$ui->id}}"><i class="far fa-times-circle"></i></a></div>
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
