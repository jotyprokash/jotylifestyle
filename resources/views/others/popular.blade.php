@extends('layouts.app')
@section('title', 'Popular Products')
@section('content')
<div id="page-content">
  <div class="section product-item">
    <div class="container">
      <div class="row row-title">
        <div class="col s12">
          <div class="section-title">
            <span class="theme-secondary-color">POPULAR</span> PRODUCTS
          </div>
        </div>
      </div>
      <div class="row row-no-margin">
        @foreach($allpopularproducts as $alpp)
        <div>
          <div class="col s6 m4 l3 col-produc">
            <div class="box-product">
              <div class="bp-top">
                <div class="product-list-img">
                  <div class="pli-one">
                    <div class="pli-two">
                      <img src="/productpic/{{ $alpp->picture }}" alt="Product Image">
                    </div>
                  </div>
                </div>
                <h5><a href="/product/{{ $alpp->id }}">{{ $alpp->title }}</a></h5>
                <div class="price">৳ {{ $alpp->sellingprice}}</div>
                  @if( $alpp->totalquantity > 0)
                  <div class="stock-item" style="color:green">Available</div>
                  @else
                  <div class="stock-item" style="color:red">Not Available</div>
                  @endif
              </div>
                  @if( $alpp->totalquantity > 0)
                  <div class="bp-bottom">
                  <a href="/product/{{ $alpp->id }}" class="btn button-add-cart">VIEW</a>
                  </div>
                  @else
                  <div class="bp-bottom">
                  <a href="/product/{{ $alpp->id }}" class="btn button-add-cart">VIEW</a>
                  </div>
                  @endif
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
  @if($allpopularproducts->count() > 16)
    <div class="container">
      <div class="row">
        <div class="col s12">
          <ul class="pagination">
            <li class="waves-effect">
            <a href="{{$allpopularproducts->previousPageUrl()}}"><i class="material-icons">chevron_left</i></a>
          </li>
          <li class="waves-effect">
            <a href="{{$allpopularproducts->nextPageUrl()}}"><i class="material-icons">chevron_right</i></a>
          </li>
          </ul>
        </div>
      </div>
    </div>
    @else
    @endif
</div>
@endsection