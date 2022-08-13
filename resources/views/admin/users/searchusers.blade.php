@extends('layouts.app')
@section('title', 'Search Users')
@section('content')
<div id="page-content">
  <div class="wishlist-page">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="section-title">
            <span class="theme-secondary-color">Search</span> Users
          </div>
        </div>
      </div>


      <div class="row">
        <form action="{{ route('searchusers') }}" method="get" enctype="multipart/form-data" class="col s12">
          {{csrf_field()}}
          <div class="row">
            <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
              <input id="searchusers" type="text" name="searchusers" class="form-control @error('searchusers') is-invalid @enderror" required autocomplete="searchusers" placeholder="Enter User Information" class="validate">
                @error('searchusers')
                                      
                  <p style="color:red;">{{ $message }}</p>
                                      
                @enderror
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m6 l4 offset-m3 offset-l4 center">
              <input class="waves-effect waves-light btn" value="SEARCH" type="submit"></div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
