@extends('layouts.app')
@section('title', 'Contact')
@section('content')
<div id="page-content">
  <div class="contact-wrap theme-form">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="section-title">
             Contact <span class="theme-secondary-color">Us</span>
          </div>
        </div>
        <div class="col s12">
          <p class="center">we are ready 24/7 hours to support.</p>
        </div>
      </div>
      @if(session()->has('notif'))
        <div class="checkout-payable">{{ session()->get('notif') }}</div>
      @endif
      <div class="row">
        <form action="{{ route('contact') }}" method="post" class="col s12">
          <div class="row">
            <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
              <input id="name" name="name" type="text" class="validate">
              <label for="name">Your Name</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
              <input id="email" name="email" type="email" class="validate">
              <label for="email">Your Email</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
              <input id="subject" name="subject" type="text" class="validate">
              <label for="subject">Subject</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
              <textarea id="message" name="message" class="materialize-textarea"></textarea>
              <label for="message">Message</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12 m6 l4 offset-m3 offset-l4 center">
              <input class="waves-effect waves-light btn" value="Send" type="submit"></div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection