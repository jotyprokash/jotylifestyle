@extends('layouts.app')
@section('title', 'Update Campaign Product Information')
@section('content')
<div id="page-content">
  <div class="wishlist-page">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="section-title">
            <span class="theme-secondary-color">Update Campaign Product</span> Information
          </div>
        </div>
      </div>
      @if(session()->has('notif'))
        <div class="checkout-payable">{{ session()->get('notif') }}</div>
      @endif
      @foreach($allproducts as $alp)
      <div class="row">
        <form action="{{ route('updatecamproducts', ['id' => $alp->id]) }}" method="post" enctype="multipart/form-data" class="col s12">
          @csrf
          <div class="row">
            <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
              <input id="title" type="text" name="title" class="form-control @error('title') is-invalid @enderror" required autocomplete="title" value="{{ $alp->title }}" placeholder="Enter Your Product Title" class="validate" required="title">
                @error('title')
                                      
                  <p style="color:red;">{{ $message }}</p>
                                      
                @enderror
              <label for="title">Title</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
              <input id="sellingprice" type="text" name="sellingprice" class="form-control @error('sellingprice') is-invalid @enderror" value="{{ $alp->sellingprice }}" required autocomplete="sellingprice" placeholder="Enter Your Product Selling Price" class="validate" required="sellingprice">
                @error('sellingprice')
                                      
                  <p style="color:red;">{{ $message }}</p>
                                      
                @enderror
              <label for="sellingprice">Sell Price</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
              <input id="campaignprice" type="text" name="campaignprice" class="form-control @error('campaignprice') is-invalid @enderror" value="{{ $alp->campaignprice }}" required autocomplete="campaignprice" placeholder="Enter Your Product Campaign Price" class="validate" required="campaignprice">
                @error('campaignprice')
                                      
                  <p style="color:red;">{{ $message }}</p>
                                      
                @enderror
              <label for="campaignprice">Campaign Price</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
              <input id="color" type="text" name="color" class="form-control @error('color') is-invalid @enderror" value="{{ $alp->color }}" required autocomplete="color" placeholder="Enter Product Your Color" class="validate" required="color">
                @error('color')
                                      
                  <p style="color:red;">{{ $message }}</p>
                                      
                @enderror
              <label for="color">Color</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
              <input id="size" type="text" name="size" class="form-control @error('size') is-invalid @enderror" value="{{ $alp->size }}" required autocomplete="size" placeholder="Enter Your Product Size" class="validate" required="size">
                @error('size')
                                      
                  <p style="color:red;">{{ $message }}</p>
                                      
                @enderror
              <label for="size">Size</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
              <input id="totalquantity" type="text" name="totalquantity" class="form-control @error('totalquantity') is-invalid @enderror" value="{{ $alp->totalquantity }}" required autocomplete="totalquantity" placeholder="Enter Your Product Quantity" class="validate" required="totalquantity">
                @error('totalquantity')
                                      
                  <p style="color:red;">{{ $message }}</p>
                                      
                @enderror
              <label for="totalquantity">Quantity</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
              <input id="brand" type="text" name="brand" class="form-control @error('brand') is-invalid @enderror" value="{{ $alp->brand }}" required autocomplete="brand" placeholder="Enter Your Product Brand" class="validate" required="brand">
                @error('brand')
                                      
                  <p style="color:red;">{{ $message }}</p>
                                      
                @enderror
              <label for="brand">Brand</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
              <input id="fabric" type="text" name="fabric" class="form-control @error('fabric') is-invalid @enderror" value="{{ $alp->fabric }}" required autocomplete="fabric" placeholder="Enter Your Product Fabric" class="validate" required="fabric">
                @error('fabric')
                                      
                  <p style="color:red;">{{ $message }}</p>
                                      
                @enderror
              <label for="fabric">Fabric</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
              <input id="description" type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{ $alp->description }}" required autocomplete="description" placeholder="Enter Your Product Description" class="validate" required="description">
                @error('description')
                                      
                  <p style="color:red;">{{ $message }}</p>
                                      
                @enderror
              <label for="description">Description</label>
            </div>
          </div>
          <div class="file-field input-field col s12 m4 offset-m3 offset-l4">
            <div class="btn">
              <span>File</span>
              <input id="picture" type="file" value="{{ $alp->picture }}" name="picture"></div>
            <div class="file-path-wrapper">
              <input id="picture" class="file-path validate" type="text" name="picture" placeholder="Upload Product Photo"></div>    
          </div>
          <div class="row">
            <div class="input-field col s12 m6 l4 offset-m3 offset-l4 center">
              <input class="waves-effect waves-light btn" value="UPDATE" type="submit"></div>
          </div>
        </form>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection