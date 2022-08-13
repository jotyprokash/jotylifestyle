@extends('layouts.app')
@section('title', 'Settings Information')
@section('content')
<div id="page-content">
  <div class="wishlist-page">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="section-title">
            <span class="theme-secondary-color">Settings</span> Information
          </div>
        </div>
      </div>
      @if(session()->has('notif'))
        <div class="checkout-payable">{{ session()->get('notif') }}</div>
      @endif
      @foreach($allsettings as $als)
      <div class="row">
        <form action="{{ route('updatesettings') }}" method="post" enctype="multipart/form-data" class="col s12">
          @csrf
          <div class="row">
            <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
              <input id="title" type="text" name="title" class="form-control @error('title') is-invalid @enderror" required autocomplete="title" value="{{ $als->title }}" placeholder="Enter Your Title" class="validate" required="title">
                @error('title')
                                      
                  <p style="color:red;">{{ $message }}</p>
                                      
                @enderror
              <label for="title">Title</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
              <input id="email" type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $als->email }}" required autocomplete="email" placeholder="Enter Your Email" class="validate" required="email">
                @error('email')
                                      
                  <p style="color:red;">{{ $message }}</p>
                                      
                @enderror
              <label for="email">Email</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
              <input id="phonenumber" type="tel" name="phonenumber" class="form-control @error('phonenumber') is-invalid @enderror" value="{{ $als->phonenumber }}" required autocomplete="phonenumber" pattern="01[3-9][0-9]{8}" placeholder="Enter Your Phone Number" class="validate" required="phonenumber">
                @error('phonenumber')
                                      
                  <p style="color:red;">{{ $message }}</p>
                                      
                @enderror
              <label for="phonenumber">Phone Number</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
              <input id="address" type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ $als->address }}" required autocomplete="address" placeholder="Enter Your Address" class="validate" required="address">
                @error('address')
                                      
                  <p style="color:red;">{{ $message }}</p>
                                      
                @enderror
              <label for="address">Address</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
              <input id="facebook" type="text" name="facebook" class="form-control @error('facebook') is-invalid @enderror" value="{{ $als->facebook }}" required autocomplete="facebook" placeholder="Enter Your Facebook Link" class="validate" required="facebook">
                @error('facebook')
                                      
                  <p style="color:red;">{{ $message }}</p>
                                      
                @enderror
              <label for="facebook">Facebook Link</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
              <input id="twitter" type="text" name="twitter" class="form-control @error('twitter') is-invalid @enderror" value="{{ $als->twitter }}" required autocomplete="twitter" placeholder="Enter Your Twitter Link" class="validate" required="twitter">
                @error('twitter')
                                      
                  <p style="color:red;">{{ $message }}</p>
                                      
                @enderror
              <label for="twitter">Twitter Link</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
              <input id="instagram" type="text" name="instagram" class="form-control @error('instagram') is-invalid @enderror" value="{{ $als->instagram }}" required autocomplete="instagram" placeholder="Enter Your Instagram Link" class="validate" required="instagram">
                @error('instagram')
                                      
                  <p style="color:red;">{{ $message }}</p>
                                      
                @enderror
              <label for="instagram">Instagram Link</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
              <input id="linkedin" type="text" name="linkedin" class="form-control @error('linkedin') is-invalid @enderror" value="{{ $als->linkedin }}" required autocomplete="linkedin" placeholder="Enter Your Linkedin Link" class="validate" required="linkedin">
                @error('linkedin')
                                      
                  <p style="color:red;">{{ $message }}</p>
                                      
                @enderror
              <label for="linkedin">Linkedin Link</label>
            </div>
          </div>
          <div class="file-field input-field col s12 m4 offset-m3 offset-l4">
            <div class="btn">
              <span>File</span>
              <input id="logo" type="file" value="{{ $als->logo }}" name="logo"></div>
            <div class="file-path-wrapper">
              <input id="logo" class="file-path validate" type="text" name="logo" placeholder="Upload Site Logo"></div>    
          </div>
          <div class="file-field input-field col s12 m4 offset-m3 offset-l4">
            <div class="btn">
              <span>File</span>
              <input id="cover1" type="file" value="{{ $als->cover1 }}" name="cover1"></div>
            <div class="file-path-wrapper">
              <input id="cover1" class="file-path validate" type="text" name="cover1" placeholder="Upload Cover 1"></div>    
          </div>
          <div class="file-field input-field col s12 m4 offset-m3 offset-l4">
            <div class="btn">
              <span>File</span>
              <input id="cover2" type="file" value="{{ $als->cover2 }}" name="cover2"></div>
            <div class="file-path-wrapper">
              <input id="cover2" class="file-path validate" type="text" name="cover2" placeholder="Upload Cover 2"></div>    
          </div>
          <div class="file-field input-field col s12 m4 offset-m3 offset-l4">
            <div class="btn">
              <span>File</span>
              <input id="cover3" type="file" value="{{ $als->cover3 }}" name="cover3"></div>
            <div class="file-path-wrapper">
              <input id="cover3" class="file-path validate" type="text" name="cover3" placeholder="Upload Cover 3"></div>    
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
