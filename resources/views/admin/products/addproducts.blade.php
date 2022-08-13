@extends('layouts.app')
@section('title', 'Add Products')
@section('content')
<div id="page-content">
  <div class="wishlist-page">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="section-title">
            <span class="theme-secondary-color">Add</span> Products
          </div>
        </div>
      </div>
      @if(session()->has('notif'))
        <div class="checkout-payable">{{ session()->get('notif') }}</div>
      @endif
      <div class="row">
        <form action="/addproducts" method="post" enctype="multipart/form-data" class="col s12">
          @csrf
          <div class="row">
            <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
              <input id="title" type="text" name="title" class="form-control @error('title') is-invalid @enderror" required autocomplete="title" placeholder="Enter Your Product Title" class="validate" required="title">
                @error('title')
                                      
                  <p style="color:red;">{{ $message }}</p>
                                      
                @enderror
              <label for="title">Title</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
              <input id="buyingprice" type="text" name="buyingprice" class="form-control @error('buyingprice') is-invalid @enderror" required autocomplete="buyingprice" placeholder="Enter Your Product Buying Price" class="validate" required="buyingprice">
                @error('buyingprice')
                                      
                  <p style="color:red;">{{ $message }}</p>
                                      
                @enderror
              <label for="buyingprice">Buy Price</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
              <input id="sellingprice" type="text" name="sellingprice" class="form-control @error('sellingprice') is-invalid @enderror" required autocomplete="sellingprice" placeholder="Enter Your Product Selling Price" class="validate" required="sellingprice">
                @error('sellingprice')
                                      
                  <p style="color:red;">{{ $message }}</p>
                                      
                @enderror
              <label for="sellingprice">Sell Price</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
              <input id="color" type="text" name="color" class="form-control @error('color') is-invalid @enderror" required autocomplete="color" placeholder="Enter Product Your Color" class="validate" required="color">
                @error('color')
                                      
                  <p style="color:red;">{{ $message }}</p>
                                      
                @enderror
              <label for="color">Color</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
              <input id="size" type="text" name="size" class="form-control @error('size') is-invalid @enderror" required autocomplete="size" placeholder="Enter Your Product Size" class="validate" required="size">
                @error('size')
                                      
                  <p style="color:red;">{{ $message }}</p>
                                      
                @enderror
              <label for="size">Size</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
              <input id="totalquantity" type="text" name="totalquantity" class="form-control @error('totalquantity') is-invalid @enderror" required autocomplete="totalquantity" placeholder="Enter Your Product Quantity" class="validate" required="totalquantity">
                @error('totalquantity')
                                      
                  <p style="color:red;">{{ $message }}</p>
                                      
                @enderror
              <label for="totalquantity">Quantity</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
              <input id="brand" type="text" name="brand" class="form-control @error('brand') is-invalid @enderror" required autocomplete="brand" placeholder="Enter Your Product Brand" class="validate" required="brand">
                @error('brand')
                                      
                  <p style="color:red;">{{ $message }}</p>
                                      
                @enderror
              <label for="brand">Brand</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
              <input id="fabric" type="text" name="fabric" class="form-control @error('fabric') is-invalid @enderror" required autocomplete="fabric" placeholder="Enter Your Product Fabric" class="validate" required="fabric">
                @error('fabric')
                                      
                  <p style="color:red;">{{ $message }}</p>
                                      
                @enderror
              <label for="fabric">Fabric</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
              <input id="description" type="text" name="description" class="form-control @error('description') is-invalid @enderror" required autocomplete="description" placeholder="Enter Your Product Description" class="validate" required="description">
                @error('description')
                                      
                  <p style="color:red;">{{ $message }}</p>
                                      
                @enderror
              <label for="description">Description</label>
            </div>
          </div>
          <div class="row">
            <div class="col s12 m6 l4 offset-m3 offset-l4">
              <label for="catname">Category Name</label>
              <select id="catname" type="text" name="catname" class="form-control @error('catname') is-invalid @enderror" required autocomplete="catname" placeholder="Enter Your Product Category" class="validate" required="catname" style="display: block;">
                <option value="">Select Category</option>
                  @foreach($allcategories as $alc)
                  <option value="{{$alc->catname}}">{{ ucfirst($alc->catname) }}</option>
                  @endforeach 
              </select>
              @error('catname')
                                      
                  <p style="color:red;">{{ $message }}</p>
                                      
                @enderror
            </div>
          </div>
          <div class="row">
            <div class="col s12 m6 l4 offset-m3 offset-l4">
              <label for="subcatname">SubCategory Name</label>
              <select id="subcatname" type="text" name="subcatname" class="form-control @error('subcatname') is-invalid @enderror" required autocomplete="subcatname" placeholder="Enter Your Product SubCategory" class="validate" required="subcatname" style="display: block;"> 
              </select>
              @error('subcatname')
                                      
                  <p style="color:red;">{{ $message }}</p>
                                      
                @enderror
            </div>
          </div>
          <div class="file-field input-field col s12 m4 offset-m3 offset-l4">
            <div class="btn">
              <span>File</span>
              <input id="picture" type="file" name="picture"></div>
            <div class="file-path-wrapper">
              <input id="picture" class="file-path validate" type="text" name="picture" placeholder="Upload Product Photo" required="picture"></div>    
          </div>
          <div class="row">
            <div class="input-field col s12 m6 l4 offset-m3 offset-l4 center">
              <input class="waves-effect waves-light btn" value="ADD" type="submit"></div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="{{ asset('/js/jquery.min.js') }}"></script>
  <script>
         $(document).ready(function() {
        $('#catname').on('change', function() {
            var catname = $(this).val();
            if(catname) {
                $.ajax({
                    url: '/addproducts/'+catname,
                    type: "GET",
                    data : {"_token":"{{ csrf_token() }}"},
                    dataType: "json",
                    success:function(data) {
                        //console.log(data);
                      if(data){
                        $('#subcatname').empty();
                        $('#subcatname').focus;
                        $('#subcatname').append('<option value="">Select SubCategory</option>'); 
                        $.each(data, function(key, value){
                        $('select[name="subcatname"]').append('<option value="'+ value.subcatname +'">' + value.subcatname+ '</option>');
                    });
                  }else{
                    $('#subcatname').empty();
                  }
                  }
                });
            }else{
              $('#subcatname').empty();
            }
        });
    });
    </script>

@endsection