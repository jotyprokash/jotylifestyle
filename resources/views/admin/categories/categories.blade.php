@extends('layouts.app')
@section('title', 'Categories')
@section('content')
<div id="page-content">
  <div class="wishlist-page">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="section-title">
            <span class="theme-secondary-color">Category</span> List
          </div>
        </div>
      </div>
      @if(session()->has('notif'))
        <div class="checkout-payable">{{ session()->get('notif') }}</div>
      @endif
      <div class="box-wish-list">
        @if(\App\Category::count() > 0)
        <div class="content-wrap page-cart">
          <div class="subsite">
            <div class="row">
              <div class="col-md-12">
                <div class="chart-box">
                  <div class="cb-box">
                    <div class="extraservice">
                      @foreach($allcategories as $alc)
                      <div class="service-row">
                        <div class="es-left">{{$no++}}. {{$alc->catname}}</div>
                        <div class="es-right"> <a href="/updatecategories/{{ $alc->id }}"><i class="fas fa-cog"></i></a> | <a href="/deletecategories/{{ $alc->id }}"><i class="far fa-times-circle"></i></a></div>
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
        <div class="checkout-payable">No Categories !</div>
        @endif
      </div>
    </div>

    @if(\App\Category::count() > 10)
    <div class="container">
      <div class="row">
        <div class="col s12">
          <ul class="pagination">
          <li class="waves-effect">
            <a href="{{$allcategories->previousPageUrl()}}"><i class="material-icons">chevron_left</i></a>
          </li>
          <li class="waves-effect">
            <a href="{{$allcategories->nextPageUrl()}}"><i class="material-icons">chevron_right</i></a>
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
