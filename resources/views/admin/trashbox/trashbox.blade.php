@extends('layouts.app')
@section('title', 'Trash Box')
@section('content')
<div id="page-content">
  <div class="wishlist-page">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="section-title">
            <span class="theme-secondary-color">Trash</span> Box
          </div>
        </div>
      </div>
      @if(session()->has('notif'))
        <div class="checkout-payable">{{ session()->get('notif') }}</div>
      @endif
    </div>
  </div>
  
  <div class="wishlist-page">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="section-title">
            <span class="theme-secondary-color">Admins</span> List
          </div>
        </div>
      </div>
      <div class="box-wish-list">
        @if($alladminscount > 0)
        <div class="content-wrap page-cart">
          <div class="subsite">
            <div class="row">
              <div class="col-md-12">
                <div class="chart-box">
                  <div class="cb-box">
                    <div class="extraservice">
                      @foreach($alladmins as $ala)
                      <div class="service-row">
                        <div class="es-left">{{$no++}}. {{$ala->name}}</div>
                        <div class="es-right"> <a href="/restoreadmins/{{ $ala->id }}"><i class="fas fa-check"></i></a> | <a href="/killadmins/{{ $ala->id }}"><i class="far fa-times-circle"></i></a></div>
                        <div class="clear"></div>
                      </div>
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @else
        <div class="checkout-payable">No Admins !</div>
        @endif
      </div>
    </div>

    @if($alladminscount > 10)
    <div class="container">
      <div class="row">
        <div class="col s12">
          <ul class="pagination">
            <li class="waves-effect">
            <a href="{{$alladmins->previousPageUrl()}}"><i class="material-icons">chevron_left</i></a>
          </li>
          <li class="waves-effect">
            <a href="{{$alladmins->nextPageUrl()}}"><i class="material-icons">chevron_right</i></a>
          </li>
          </ul>
        </div>
      </div>
    </div>
    @else
    @endif
  </div>


  <div class="wishlist-page">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="section-title">
            <span class="theme-secondary-color">Users</span> List
          </div>
        </div>
      </div>
      <div class="box-wish-list">
        @if($alluserscount > 0)
        <div class="content-wrap page-cart">
          <div class="subsite">
            <div class="row">
              <div class="col-md-12">
                <div class="chart-box">
                  <div class="cb-box">
                    <div class="extraservice">
                      @foreach($allusers as $alu)
                      <div class="service-row">
                        <div class="es-left">{{$no++}}. {{$alu->name}}</div>
                        <div class="es-right"> <a href="/restoreusers/{{ $alu->id }}"><i class="fas fa-check"></i></a> | <a href="/killusers/{{ $alu->id }}"><i class="far fa-times-circle"></i></a></div>
                        <div class="clear"></div>
                      </div>
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @else
        <div class="checkout-payable">No Users !</div>
        @endif
      </div>
    </div>

    @if($alluserscount > 10)
    <div class="container">
      <div class="row">
        <div class="col s12">
          <ul class="pagination">
            <li class="waves-effect">
            <a href="{{$allusers->previousPageUrl()}}"><i class="material-icons">chevron_left</i></a>
          </li>
          <li class="waves-effect">
            <a href="{{$allusers->nextPageUrl()}}"><i class="material-icons">chevron_right</i></a>
          </li>
          </ul>
        </div>
      </div>
    </div>
    @else
    @endif
  </div>


  <div class="wishlist-page">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="section-title">
            <span class="theme-secondary-color">Categories</span> List
          </div>
        </div>
      </div>
      <div class="box-wish-list">
        @if($allcategoriescount > 0)
        <div class="content-wrap page-cart">
          <div class="subsite">
            <div class="row">
              <div class="col-md-12">
                <div class="chart-box">
                  <div class="cb-box">
                    <div class="extraservice">
                      @foreach($allcategories as $alc)
                      <div class="service-row">
                        <div class="es-left">{{$no++}}. {{$alc->catname}}</div>
                        <div class="es-right"> <a href="/restorecategories/{{ $alc->id }}"><i class="fas fa-check"></i></a> | <a href="/killcategories/{{ $alc->id }}"><i class="far fa-times-circle"></i></a></div>
                        <div class="clear"></div>
                      </div>
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @else
        <div class="checkout-payable">No Categories !</div>
        @endif
      </div>
    </div>

    @if($allcategoriescount > 10)
    <div class="container">
      <div class="row">
        <div class="col s12">
          <ul class="pagination">
            <li class="waves-effect">
            <a href="{{$allcategories->previousPageUrl()}}"><i class="material-icons">chevron_left</i></a>
          </li>
          <li class="waves-effect">
            <a href="{{$allcategories->nextPageUrl()}}"><i class="material-icons">chevron_right</i></a>
          </li>
          </ul>
        </div>
      </div>
    </div>
    @else
    @endif
  </div>



  <div class="wishlist-page">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="section-title">
            <span class="theme-secondary-color">SubCategories</span> List
          </div>
        </div>
      </div>
      <div class="box-wish-list">
        @if($allsubcategoriescount > 0)
        <div class="content-wrap page-cart">
          <div class="subsite">
            <div class="row">
              <div class="col-md-12">
                <div class="chart-box">
                  <div class="cb-box">
                    <div class="extraservice">
                      @foreach($allsubcategories as $alc)
                      <div class="service-row">
                        <div class="es-left">{{$no++}}. {{$alc->catname}}</div>
                        <div class="es-right"> <a href="/restoresubcategories/{{ $alc->id }}"><i class="fas fa-check"></i></a> | <a href="/killsubcategories/{{ $alc->id }}"><i class="far fa-times-circle"></i></a></div>
                        <div class="clear"></div>
                      </div>
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @else
        <div class="checkout-payable">No SubCategories !</div>
        @endif
      </div>
    </div>

    @if($allsubcategoriescount > 10)
    <div class="container">
      <div class="row">
        <div class="col s12">
          <ul class="pagination">
            <li class="waves-effect">
            <a href="{{$allsubcategories->previousPageUrl()}}"><i class="material-icons">chevron_left</i></a>
          </li>
          <li class="waves-effect">
            <a href="{{$allsubcategories->nextPageUrl()}}"><i class="material-icons">chevron_right</i></a>
          </li>
          </ul>
        </div>
      </div>
    </div>
    @else
    @endif
  </div>



  <div class="wishlist-page">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="section-title">
            <span class="theme-secondary-color">Products</span> List
          </div>
        </div>
      </div>
      <div class="box-wish-list">
        @if($allproductscount > 0)
        <div class="content-wrap page-cart">
          <div class="subsite">
            <div class="row">
              <div class="col-md-12">
                <div class="chart-box">
                  <div class="cb-box">
                    <div class="extraservice">
                      @foreach($allproducts as $alp)
                      <div class="service-row">
                        <div class="es-left">{{$no++}}. {{$alp->title}}</div>
                        <div class="es-right"> <a href="/restoreproducts/{{ $alp->id }}"><i class="fas fa-check"></i></a> | <a href="/killproducts/{{ $alp->id }}"><i class="far fa-times-circle"></i></a></div>
                        <div class="clear"></div>
                      </div>
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @else
        <div class="checkout-payable">No Products !</div>
        @endif
      </div>
    </div>

    @if($allproductscount > 10)
    <div class="container">
      <div class="row">
        <div class="col s12">
          <ul class="pagination">
            <li class="waves-effect">
            <a href="{{$allproducts->previousPageUrl()}}"><i class="material-icons">chevron_left</i></a>
          </li>
          <li class="waves-effect">
            <a href="{{$allproducts->nextPageUrl()}}"><i class="material-icons">chevron_right</i></a>
          </li>
          </ul>
        </div>
      </div>
    </div>
    @else
    @endif
  </div>



  <div class="wishlist-page">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="section-title">
            <span class="theme-secondary-color">Campaign Product</span> List
          </div>
        </div>
      </div>
      <div class="box-wish-list">
        @if($allcamproductscount > 0)
        <div class="content-wrap page-cart">
          <div class="subsite">
            <div class="row">
              <div class="col-md-12">
                <div class="chart-box">
                  <div class="cb-box">
                    <div class="extraservice">
                      @foreach($allcamproducts as $alcp)
                      <div class="service-row">
                        <div class="es-left">{{$no++}}. {{$alcp->title}}</div>
                        <div class="es-right"> <a href="/restorecm/{{ $alcp->id }}"><i class="fas fa-check"></i></a> | <a href="/killcm/{{ $alcp->id }}"><i class="far fa-times-circle"></i></a></div>
                        <div class="clear"></div>
                      </div>
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @else
        <div class="checkout-payable">No Campaign Products !</div>
        @endif
      </div>
    </div>

    @if($allcamproductscount > 10)
    <div class="container">
      <div class="row">
        <div class="col s12">
          <ul class="pagination">
            <li class="waves-effect">
            <a href="{{$allcamproducts->previousPageUrl()}}"><i class="material-icons">chevron_left</i></a>
          </li>
          <li class="waves-effect">
            <a href="{{$allcamproducts->nextPageUrl()}}"><i class="material-icons">chevron_right</i></a>
          </li>
          </ul>
        </div>
      </div>
    </div>
    @else
    @endif
    
  </div>
</div>
@endsection
