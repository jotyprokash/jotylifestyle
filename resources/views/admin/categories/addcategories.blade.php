@extends('layouts.app')
@section('title', 'Add Categories')
@section('content')
<div id="page-content">
  <div class="wishlist-page">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="section-title">
            <span class="theme-secondary-color">Add</span> Categories
          </div>
        </div>
      </div>
      @if(session()->has('notif'))
        <div class="checkout-payable">{{ session()->get('notif') }}</div>
      @endif
      <div class="row">
        <form action="/addcategories" method="post" enctype="multipart/form-data" class="col s12">
          {{csrf_field()}}
          <div class="row">
            <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
              <input id="catname" type="text" name="catname" class="form-control @error('catname') is-invalid @enderror" required autocomplete="catname" placeholder="Enter Your Category Name" class="validate">
                @error('catname')
                                      
                  <p style="color:red;">{{ $message }}</p>
                                      
                @enderror
              <label for="catname">Category Name</label>
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