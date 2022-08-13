@extends('layouts.app')
@section('title', 'SubCategories')
@section('content')
<div id="page-content">
  <div class="wishlist-page">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="section-title">
            <span class="theme-secondary-color">SubCategory</span> List
          </div>
        </div>
      </div>
      @if(session()->has('notif'))
        <div class="checkout-payable">{{ session()->get('notif') }}</div>
      @endif
      <div class="box-wish-list">
        @if(\App\SubCategory::count() > 0)
        <div class="content-wrap page-cart">
          <div class="subsite">
            <div class="row">
              <div class="col-md-12">
                <div class="chart-box">
                  <div class="cb-box">
                    <div class="extraservice">
                      @foreach($allsubcategories as $alc)
                      <div class="service-row">
                        <div class="es-left">{{$no++}}. {{$alc->subcatname}} ➩ {{$alc->catname}}</div>
                        <div class="es-right"> <a href="/updatesubcategories/{{ $alc->id }}"><i class="fas fa-cog"></i></a> | <a href="/deletesubcategories/{{ $alc->id }}"><i class="far fa-times-circle"></i></a></div>
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
        <div class="checkout-payable">No SubCategories !</div>
        @endif
      </div>
    </div>

    @if(\App\SubCategory::count() > 10)
    <div class="container">
      <div class="row">
        <div class="col s12">
          <ul class="pagination">
            <li class="waves-effect">
            <a href="{{$allsubcategories->previousPageUrl()}}"><i class="material-icons">chevron_left</i></a>
          </li>
          <li class="waves-effect">
            <a href="{{$allsubcategories->nextPageUrl()}}"><i class="material-icons">chevron_right</i></a>
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