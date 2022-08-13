@extends('layouts.app')
@section('title', 'Loading')
@section('content')
<div id="page-content">
  <div class="cart-page">
    <div class="container">
      <br>
      <br>
      <div class="section populer-search">
        <div class="container">
          <div class="row row-title">
            <div class="col s12">
              <div class="section-title">
                <span class="theme-secondary-color">Registration</span> Successfully !
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col s12">
              <div class="list-tag-word">
                <a href="/" class="tag-word">Go to Homepage</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    function autoRefreshPage()
    {
        window.location.href = '/';
    }
    setInterval('autoRefreshPage()', 5000);
</script>
@endsection