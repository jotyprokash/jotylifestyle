@extends('layouts.app')
@section('title', 'Campaign Product Information')
@section('content')
<div id="page-content">
  <div class="login-form">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="section-title">
            <span class="theme-secondary-color">Campaign Product</span> Information
          </div>
        </div>
      </div>
        <div class="content-wrap page-cart">
          <div class="subsite">
            <div class="row">
              <div class="col-md-12">
                @foreach($allproducts as $alp)
                <div class="chart-box">
                  <div class="cart-car-box">
                    <div class="chart-car"><img src="/productpic/{{ $alp->picture }}"></div>
                  </div>
                  <div class="cart-box-detail">
                    <ul>
                      <li><label>Product Title</label> : {{ $alp->title }}</li>
                      <li><label>Sell Price</label> : {{ $alp->sellingprice }}</li>
                      <li><label>Campaign Price</label> : {{ $alp->campaignprice }}</li>
                      <li><label>Product Color</label> : {{ $alp->color }}</li>
                      <li><label>Product Size</label> : {{ $alp->size }}</li>
                      <li><label>Product Brand</label> : {{ $alp->brand }}</li>
                      <li><label>Total Quantity</label> : {{ $alp->totalquantity }}</li>
                      <li><label>Product Fabric</label> : {{ $alp->fabric }}</li>
                      <li><label>Description</label> : {{ $alp->description }}</li>
                    </ul>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection