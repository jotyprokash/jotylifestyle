@extends('layouts.app')
@foreach($allproducts as $alp)
@section('title', $alp->title)
@endforeach
@section('content')
@foreach($allproducts as $alp)
<div id="page-content" class="product-page">
	<div class="container">
		<div class="row">
      		<div class="col s12">
				@if(session()->has('notif'))
			        <div class="checkout-payable">{{ session()->get('notif') }}</div>
			    @endif
			</div>
		</div>
	</div>
	<form method="get" enctype="multipart/form-data">
  <div id="product-image" class="pg-product-image">
    <div>
      <div class="pgp-wrap-img">
        <div class="pgp-wrap-img-in">
          <div class="pgp-img" style="background-image: url(/productpic/{{ $alp->picture }});">
          </div>
        </div>
      </div>
    </div>
   </div>
  <div class="container">
    <div class="row">
      <div class="col s12">
        <div class="name-price">
          <div class="pg-product-name">{{ $alp->title }}</div>
          <div class="pg-product-price">৳ {{ $alp->sellingprice }}</div>
          <div style="clear:both;"></div>
        </div>
      </div>
    </div>
  </div>
    <div class="desciption-product">
    <div class="container">
      <div class="row">
        <div class="col s12">
	        <div class="content-wrap page-cart">
	          <div class="subsite">
	            <div class="row">
	              <div class="col-md-12">
	                <div class="chart-box">
	                  <div class="cb-box">
	                    <div class="extraservice">
	                      
	                      <div class="service-row">
	                        <div class="es"><label>Color</label> : {{ $alp->color }}</div>
	                        <div class="clear"></div>
	                      </div>

	                      <div class="service-row">
	                        <div class="es"><label>Size</label> : <input class="with-gap" name="size" type="radio" id="test1" value="S" required="size" />
				                  <label for="test1">S</label>
				                
				                  <input class="with-gap" name="size" type="radio" id="test2" value="L" required="size" />
				                  <label for="test2">L</label>
				                
				                  <input class="with-gap" name="size" type="radio" id="test3" value="XL" required="size" />
				                  <label for="test3">XL</label>

				                  <input class="with-gap" name="size" type="radio" id="test4" value="XXL" required="size" />
				                  <label for="test4">XXL</label></div>
	                        <div class="clear"></div>
	                      </div>

	                      <div class="service-row">
	                        <div class="es"><label>Fabric</label> : {{ $alp->fabric }}</div>
	                        <div class="clear"></div>
	                      </div>

	                      <div class="service-row">
	                        <div class="es"><label>Description</label> : {{ $alp->description }}</div>
	                        <div class="clear"></div>
	                      </div>

	                      <div class="service-row">
	                        <div class="es"><label style="color:red">Note</label> : Depending on your computer or mobile screen resolution, product color may vary slightly.</div>
	                        <div class="clear"></div>
	                      </div>
	                      
	                    </div>
	                  </div>
	                </div>
	              </div>
	            </div>
	          </div>
	        </div>
        </div>
      </div>
    </div>
  </div>

  <div class="qty-total-price">
    <div class="container">
      <div class="row">
      	<div class="col s6">
          <div class="qty-buy">
          	@if( $alp->totalquantity > 0)
            <button type="submit" formaction="{{ route('cartadd', ['id' => $alp->id ]) }}" class="btn button-add-cart">ADD TO CART</button>
            @else
            <button class="btn button-add-cart" disabled>ADD TO CART</button>
            @endif
          </div>
        </div>
        <div class="col s6">
          <div class="qty-buy">
          	@if( $alp->totalquantity > 0)
            <button type="submit" formaction="{{ route('buynow', ['id' => $alp->id ]) }}" class="btn button-add-cart">BUY NOW</button>
            @else
            <button class="btn button-add-cart" disabled>BUY NOW</button>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
</div>
@endforeach
@endsection