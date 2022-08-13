@extends('layouts.app')
@foreach(\App\Settings::all()->where('id', '1') as $als)
@section('title', $als->title)
@endforeach
@section('content') 
<div class="section promo">
  <div class="container">
    <div class="col s12">
      <div class="main-slider" data-indicators="true">
		<div class="carousel carousel-slider " data-indicators="true">
			@foreach($allsettings as $als)
		   <a class="carousel-item"><img src="/img/{{$als->cover1}}" alt="slider"></a>
		   <a class="carousel-item"><img src="/img/{{$als->cover2}}" alt="slider"></a>
		   <a class="carousel-item"><img src="/img/{{$als->cover3}}" alt="slider"></a>
		  @endforeach
		</div>
	  </div>
    </div>
  </div>
</div>


@if($allcampaigns->count() > 0)
  <div class="section product-item">
    <div class="container">
      <div class="row row-title">
        <div class="col s12">
          <div class="section-title">
            <span class="theme-secondary-color">Campaign</span> Products
          </div>
        </div>
      </div>
      <div class="row row-no-margin">
        @foreach($allcampaigns as $alc)
        <div>
          <div class="col s6 m4 l3 col-produc">
            <div class="box-product">
              <div class="bp-top">
                <div class="product-list-img">
                  <div class="pli-one">
                    <div class="pli-two">
                      <img src="/productpic/{{ $alc->picture }}" alt="Product Image">
                    </div>
                  </div>
                </div>
                <h5><a href="/product/{{ $alc->id }}">{{ $alc->title }}</a></h5>
                <div class="price"><s>৳ {{ $alc->sellingprice}}</s></div>
                <div class="price">৳ {{ $alc->campaignprice}}</div>
                  @if( $alc->totalquantity > 0)
                  <div class="stock-item" style="color:green">Available</div>
                  @else
                  <div class="stock-item" style="color:red">Not Available</div>
                  @endif
              </div>
                  @if( $alc->totalquantity > 0)
                  <div class="bp-bottom">
                  <a href="/product/{{ $alc->id }}" class="btn button-add-cart">VIEW</a>
                  </div>
                  @else
                  <div class="bp-bottom">
                  <a href="/product/{{ $alc->id }}" class="btn button-add-cart">VIEW</a>
                  </div>
                  @endif
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
  @else
  @endif

  @if($allpopularproducts->count() > 0)
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
      @if($allpopularproducts->count() > 12)
      <div class="more-product-list">
          <a class="more-btn" href="/popular">See More ></a>
      </div>
      @else
      @endif
    </div>
  </div>
  @else
  @endif




  @if($alltshirts->count() > 0)
  <div class="section product-item">
    <div class="container">
      <div class="row row-title">
        <div class="col s12">
          <div class="section-title">
            <span class="theme-secondary-color">T-Shirt</span> Collection
          </div>
        </div>
      </div>
      <div class="row row-no-margin">
        @foreach($alltshirts as $alts)
        <div>
          <div class="col s6 m4 l3 col-produc">
            <div class="box-product">
              <div class="bp-top">
                <div class="product-list-img">
                  <div class="pli-one">
                    <div class="pli-two">
                      <img src="/productpic/{{ $alts->picture }}" alt="Product Image">
                    </div>
                  </div>
                </div>
                <h5><a href="/product/{{ $alts->id }}">{{ $alts->title }}</a></h5>
                <div class="price">৳ {{ $alts->sellingprice}}</div>
                  @if( $alts->totalquantity > 0)
                  <div class="stock-item" style="color:green">Available</div>
                  @else
                  <div class="stock-item" style="color:red">Not Available</div>
                  @endif
              </div>
                  @if( $alts->totalquantity > 0)
                  <div class="bp-bottom">
                  <a href="/product/{{ $alts->id }}" class="btn button-add-cart">VIEW</a>
                  </div>
                  @else
                  <div class="bp-bottom">
                  <a href="/product/{{ $alts->id }}" class="btn button-add-cart">VIEW</a>
                  </div>
                  @endif
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
  @else
  @endif



  @if($allpanjabis->count() > 0)
  <div class="section product-item">
    <div class="container">
      <div class="row row-title">
        <div class="col s12">
          <div class="section-title">
            <span class="theme-secondary-color">Panjabi</span> Collection
          </div>
        </div>
      </div>
      <div class="row row-no-margin">
        @foreach($allpanjabis as $alp)
        <div>
          <div class="col s6 m4 l3 col-produc">
            <div class="box-product">
              <div class="bp-top">
                <div class="product-list-img">
                  <div class="pli-one">
                    <div class="pli-two">
                      <img src="/productpic/{{ $alp->picture }}" alt="Product Image">
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
    </div>
  </div>
  @else
  @endif



  @if($allpants->count() > 0)
  <div class="section product-item">
    <div class="container">
      <div class="row row-title">
        <div class="col s12">
          <div class="section-title">
            <span class="theme-secondary-color">Pant</span> Collection
          </div>
        </div>
      </div>
      <div class="row row-no-margin">
        @foreach($allpants as $alp)
        <div>
          <div class="col s6 m4 l3 col-produc">
            <div class="box-product">
              <div class="bp-top">
                <div class="product-list-img">
                  <div class="pli-one">
                    <div class="pli-two">
                      <img src="/productpic/{{ $alp->picture }}" alt="Product Image">
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
    </div>
  </div>
  @else
  @endif


  <div class="qty-total-price">
    <div class="container">
      <div class="row">
        <div class="col s5">
          <div class="qty-prc"><i class="fa fa-phone"></i> Help Line <br><p>24 Hours a Day, 7 Days a Week</p></div>
        </div>
        <div class="col s4">
          <div class="qty-prc"><i class="fa fa-truck"></i> Service<br><p>All Bangladesh</p></div>
        </div>
        <div class="col s3">
          <div class="qty-prc"><i class="fa fa-thumbs-up"></i> Satisfaction<br><p>100% Satisfaction Guaranteed</p>
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection