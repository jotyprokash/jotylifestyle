@extends('layouts.app')
@section('title', 'Search Results')
@section('content')
<div id="page-content">
  <div class="section product-item">
    <div class="container">
      <div class="row row-title">
        <div class="col s12">
          <div class="section-title">
            <span class="theme-secondary-color">Search</span> Results
          </div>
        </div>
      </div>
      @if($allproducts->count() > 0)
      <div class="row row-no-margin">
        @foreach($allproducts as $alp)
        <div>
          <div class="col s6 m4 l3 col-produc">
            <div class="box-product">
              <div class="bp-top">
                <div class="product-list-img">
                  <div class="pli-one">
                    <div class="pli-two">
                      <img src="/productpic/{{ $alp->picture }}" alt="product img">
                    </div>
                  </div>
                </div>
                <h5><a href="/product/{{ $alp->id }}">{{ $alp->title }}</a></h5>
                <div class="price">৳ {{ $alp->sellingprice}}</div>
                @if( $alp->totalquantity > 0)
                  <div class="stock-item" style="color:green">Available</div>
                  @else
                  <div class="stock-item" style="color:red">Not Available</div>
                  @endif
                </div>
                  @if( $alp->totalquantity > 0)
                  <div class="bp-bottom">
                    <!-- {{ route('cartadd', ['id' => $alp->id ]) }} -->
                  <a href="/product/{{ $alp->id }}" class="btn button-add-cart">VIEW</a>
                  </div>
                  @else
                  <div class="bp-bottom">
                  <a href="/product/{{ $alp->id }}" class="btn button-add-cart">VIEW</a>
                  </div>
                  @endif
              </div>
            </div>
          </div>
          @endforeach
        </div>
        @else
        <div class="checkout-payable">No Results Found !</div>
        @endif
      </div>
    </div>
  </div>

  @if($allproducts->count() > 10)
  <div class="container">
    <div class="row">
      <div class="col s12">
        <li class="waves-effect">
            <a href="{{$allproducts->previousPageUrl()}}"><i class="material-icons">chevron_left</i></a>
          </li>
          <li class="waves-effect">
            <a href="{{$allproducts->nextPageUrl()}}"><i class="material-icons">chevron_right</i></a>
          </li>
      </div>
    </div>
  </div>
  @else
  @endif
</div>
@endsection