@extends('layouts.app')
@section('title', 'Update SubCategories')
@section('content')
<div id="page-content">
  <div class="wishlist-page">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="section-title">
            <span class="theme-secondary-color">Update</span> SubCategories
          </div>
        </div>
      </div>
      @if(session()->has('notif'))
        <div class="checkout-payable">{{ session()->get('notif') }}</div>
      @endif
      @foreach($allsubcategories as $alc)
      <div class="row">
        <form action="{{ route('updatesubcategories', ['id' => $alc->id]) }}" method="post" enctype="multipart/form-data" class="col s12">
          {{csrf_field()}}
          <div class="row">
              <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
              <input id="catname" type="text" name="catname" class="form-control @error('catname') is-invalid @enderror" required autocomplete="catname" placeholder="Enter Your Category Name" value="{{ $alc->catname }}" class="validate" required="catname" readonly="catname">
                @error('catname')
                                      
                  <p style="color:red;">{{ $message }}</p>
                                      
                @enderror
              <label for="catname">Category Name</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
              <input id="subcatname" type="text" name="subcatname" class="form-control @error('subcatname') is-invalid @enderror" required autocomplete="subcatname" placeholder="Enter Your SubCategory Name" value="{{ $alc->subcatname }}" class="validate" required="subcatname">
                @error('subcatname')
                                      
                  <p style="color:red;">{{ $message }}</p>
                                      
                @enderror
              <label for="subcatname">SubCategory Name</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m6 l4 offset-m3 offset-l4 center">
              <input class="waves-effect waves-light btn" value="CREATE" type="submit"></div>
          </div>
        </form>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection