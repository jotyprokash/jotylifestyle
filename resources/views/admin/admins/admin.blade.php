@extends('layouts.app')
@section('title', 'Admin Panel')

@section('content')
<div class="section home-category">
  <div class="container">
    <div class="row">
      <div class="col s12">
        <div class="section-title">
          <span class="theme-secondary-color">Dash</span>board
        </div>
      </div>
    </div>
    <div class="row icon-service">
      <div class="col s4 m4 l2">
        <div class="content">
          <div class="in-content">
            <div class="in-in-content" style="background-color:#48CCCD;">
              <img src="/img/admins.png" alt="admins">
              <h5>Admins<br><br>{{ $admins }}</h5>
            </div>
          </div>
        </div>
      </div>
      <div class="col s4 m4 l2">
        <div class="content">
          <div class="in-content">
            <div class="in-in-content" style="background-color:MediumSeaGreen;">
              <img src="/img/users.png" alt="users">
              <h5>Users<br><br>{{ $users }}</h5>
            </div>
          </div>
        </div>
      </div>
      <div class="col s4 m4 l2">
        <div class="content">
          <div class="in-content">
            <div class="in-in-content" style="background-color:Tomato;">
              <img src="/img/categories.png" alt="categories">
              <h5>Categories<br><br>{{ $categories }}</h5>
            </div>
          </div>
        </div>
      </div>
      <div class="col s4 m4 l2">
        <div class="content">
          <div class="in-content">
            <div class="in-in-content" style="background-color:DodgerBlue;">
              <img src="/img/subcategories.png" alt="subcategories">
              <h5>Sub Categories<br><br>{{ $subcategories }}</h5>
            </div>
          </div>
        </div>
      </div>
      <div class="col s4 m4 l2">
        <div class="content">
          <div class="in-content">
            <div class="in-in-content" style="background-color:#d9534f;">
              <img src="img/products.png" alt="products">
              <h5>Products<br><br>{{ $products }}</h5>
            </div>
          </div>
        </div>
      </div>
      <div class="col s4 m4 l2">
        <div class="content">
          <div class="in-content">
            <div class="in-in-content" style="background-color:Orange;">
              <img src="/img/orders.png" alt="orders">
              <h5>Orders<br><br>{{ $orders }}</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row icon-service">
      <div class="col s4 m4 l2">
        <div class="content">
          <div class="in-content">
            <div class="in-in-content" style="background-color:#DFFF00;">
              <img src="/img/trash.png" alt="trash">
              <h5>Campaign Products<br><br>{{ $camproducts }}</h5>
            </div>
          </div>
        </div>
      </div>
      <div class="col s4 m4 l2">
        <div class="content">
          <div class="in-content">
            <div class="in-in-content" style="background-color:#CCCCFF;">
              <img src="/img/trash.png" alt="trash">
              <h5>Total Sales<br><br>{{ $totalsales }}</h5>
            </div>
          </div>
        </div>
      </div>
      <div class="col s4 m4 l2">
        <div class="content">
          <div class="in-content">
            <div class="in-in-content" style="background-color:Gray;">
              <img src="/img/trash.png" alt="trash">
              <h5>Trash Box<br><br>{{ $trashbox }}</h5>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection