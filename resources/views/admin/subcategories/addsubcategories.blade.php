@extends('layouts.app')
@section('title', 'Add SubCategories')
@section('content')
<div id="page-content">
  <div class="wishlist-page">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="section-title">
            <span class="theme-secondary-color">Add</span> SubCategories
          </div>
        </div>
      </div>
      @if(session()->has('notif'))
        <div class="checkout-payable">{{ session()->get('notif') }}</div>
      @endif
      <div class="row">
        <form action="/addsubcategories" method="post" enctype="multipart/form-data" class="col s12">
          {{csrf_field()}}
          <div class="row">
            <div class="col s12 m6 l4 offset-m3 offset-l4">
              <label for="catname">Category Name</label>
              <select id="catname" type="text" name="catname" class="form-control @error('catname') is-invalid @enderror" required autocomplete="catname" class="validate" required="catname" style="display: block;">
                <option value="">Select Category</option>
                  @foreach($allcategories as $alc)
                  <option value="{{$alc->catname}}">{{$alc->catname}}</option>
                  @endforeach 
              </select>
                @error('catname')
                                      
                  <p style="color:red;">{{ $message }}</p>
                                      
                @enderror
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
              <input id="subcatname" type="text" name="subcatname" class="form-control @error('subcatname') is-invalid @enderror" required autocomplete="subcatname" placeholder="Enter Your SubCategory Name" class="validate" required="subcatname">
                @error('subcatname')
                                      
                  <p style="color:red;">{{ $message }}</p>
                                      
                @enderror
              <label for="subcatname">SubCategory Name</label>
            </div>
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
@endsection