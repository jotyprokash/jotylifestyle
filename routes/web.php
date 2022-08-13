<?php

use Illuminate\Support\Facades\Route;

/*
 --------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Index

Route::get('/', [
"uses"=>"PageController@index"
]);

Route::get('/popular', [
"uses"=>"PageController@popular"
]);

Auth::routes();
//Admin
Route::get('/admin', function () {
    return view('admin.admins.admin');
})->middleware('isadmin');
//User
Route::get('/user', function () {
    return view('user.user');
})->middleware('auth');

//guest
Route::get('/contact', function () {
    return view('others.contact');
});

Route::post('/contact/send', [
        'uses' => 'PageController@contact',
        'as' => 'contact'
    ]);

Route::get('/aboutus', function () {
    return view('others.aboutus');
});

Route::get('/guide', function () {
    return view('others.guide');
});

Route::get('/terms', function () {
    return view('others.terms');
});

Route::get('/policy', function () {
    return view('others.policy');
});

//User Saction

Route::get('/update', [
"uses"=>"PageController@show"
])->name('update')->middleware('auth');

Route::post('/update', [
"uses"=>"PageController@update"
])->name('update')->middleware('auth');

Route::get('/changepassword', [
"uses"=>"PageController@showpassword"
])->name('changepassword')->middleware('auth');

Route::post('/changepassword', [
"uses"=>"PageController@changepassword"
])->name('changepassword')->middleware('auth');


//Admin Saction
//User Views
Route::get('/viewusers', [
"uses"=>"PageController@viewusers"
])->middleware('isadmin');

Route::get('/deleteuser/{id}', [
"uses"=>"PageController@deleteuser"
])->middleware('isadmin');

Route::get('/viewuser/{id}', [
"uses"=>"PageController@viewuser"
])->middleware('isadmin');

//Count

Route::get('/admin','PageController@counts')->middleware('isadmin');

//Admin Views

Route::get('/viewadmins', [
"uses"=>"PageController@viewadmins"
])->middleware('isadmin');


//categories

Route::get('/addcategories', function () {
    return view('admin.categories.addcategories');
})->middleware('isadmin');

Route::get('/categories', [
"uses"=>"PageController@viewcategories"
])->middleware('isadmin');

Route::post('/addcategories', [
"uses"=>"PageController@addcategories"
])->middleware('isadmin');

Route::get('/deletecategories/{id}', [
        'uses' => 'PageController@deletecategories'
    ])->middleware('isadmin');

Route::get('/updatecategories/{id}', [
        'uses' => 'PageController@viewupdatecategories'
    ])->middleware('isadmin');

Route::post('/updatecategories/{id}', [
        'uses' => 'PageController@updatecategories',
        'as' => 'updatecategories'
    ])->middleware('isadmin');



//subcategories

Route::get('/addsubcategories', [
    "uses"=> "PageController@viewaddsubcategories"
])->middleware('isadmin');

Route::get('/subcategories', [
"uses"=>"PageController@viewsubcategories"
])->middleware('isadmin');

Route::post('/addsubcategories', [
"uses"=>"PageController@addsubcategories"
])->middleware('isadmin');

Route::get('/deletesubcategories/{id}', [
        'uses' => 'PageController@deletesubcategories'
    ])->middleware('isadmin');

Route::get('/updatesubcategories/{id}', [
        'uses' => 'PageController@viewupdatesubcategories'
    ])->middleware('isadmin');

Route::post('/updatesubcategories/{id}', [
        'uses' => 'PageController@updatesubcategories',
        'as' => 'updatesubcategories'
    ])->middleware('isadmin');



//products

Route::get('/addproducts', [
    "uses"=> "PageController@viewaddproducts"
])->middleware('isadmin');

Route::get('/addproducts/{catname}', [
"uses"=>"PageController@findsubcategories"
])->middleware('isadmin');

Route::post('/addproducts', [
    "uses"=> "PageController@addproducts"
])->middleware('isadmin');

Route::get('/viewproducts', [
    "uses"=> "PageController@viewproducts"
])->middleware('isadmin');

Route::get('/deleteproducts/{id}', [
        'uses' => 'PageController@deleteproducts'
    ])->middleware('isadmin');

Route::get('/viewproductsinfo/{id}', [
        'uses' => 'PageController@viewproductsinfo'
    ])->middleware('isadmin');

Route::get('/updateproducts/{id}', [
        'uses' => 'PageController@viewupdateproducts'
    ])->middleware('isadmin');

Route::post('/updateproducts/{id}', [
        'uses' => 'PageController@updateproducts',
        'as' => 'updateproducts'
    ])->middleware('isadmin');

//Campaign

Route::get('/addcamproducts', [
    "uses"=> "PageController@viewaddcamproducts"
])->middleware('isadmin');

Route::post('/addcamproducts', [
    "uses"=> "PageController@addcamproducts"
])->middleware('isadmin');

Route::get('/viewcamproducts', [
    "uses"=> "PageController@viewcamproducts"
])->middleware('isadmin');

Route::get('/deletecamproducts/{id}', [
        'uses' => 'PageController@deletecamproducts'
    ])->middleware('isadmin');

Route::get('/viewcamproductsinfo/{id}', [
        'uses' => 'PageController@viewcamproductsinfo'
    ])->middleware('isadmin');

Route::get('/updatecamproducts/{id}', [
        'uses' => 'PageController@viewupdatecamproducts'
    ])->middleware('isadmin');

Route::post('/updatecamproducts/{id}', [
        'uses' => 'PageController@updatecamproducts',
        'as' => 'updatecamproducts'
    ])->middleware('isadmin');



//Trash
Route::get('/trashbox', [
"uses"=>"PageController@viewalltrash"
])->middleware('isadmin');

//Kill

Route::get('/killproducts/{id}', [
        'uses' => 'PageController@killproducts'
    ])->middleware('isadmin');

Route::get('/killcm/{id}', [
        'uses' => 'PageController@killcm'
    ])->middleware('isadmin');

Route::get('/killcategories/{id}', [
        'uses' => 'PageController@killcategories'
    ])->middleware('isadmin');

Route::get('/killsubcategories/{id}', [
        'uses' => 'PageController@killsubcategories'
    ])->middleware('isadmin');

Route::get('/killadmins/{id}', [
        'uses' => 'PageController@killadmins'
    ])->middleware('isadmin');

Route::get('/killusers/{id}', [
        'uses' => 'PageController@killusers'
    ])->middleware('isadmin');

//restore

Route::get('/restoreproducts/{id}', [
        'uses' => 'PageController@restoreproducts'
    ])->middleware('isadmin');

Route::get('/restorecm/{id}', [
        'uses' => 'PageController@restorecm'
    ])->middleware('isadmin');

Route::get('/restorecategories/{id}', [
        'uses' => 'PageController@restorecategories'
    ])->middleware('isadmin');

Route::get('/restoresubcategories/{id}', [
        'uses' => 'PageController@restoresubcategories'
    ])->middleware('isadmin');

Route::get('/restoreadmins/{id}', [
        'uses' => 'PageController@restoreadmins'
    ])->middleware('isadmin');

Route::get('/restoreusers/{id}', [
        'uses' => 'PageController@restoreusers'
    ])->middleware('isadmin');

//product

Route::get('/product/{id}', [
        'uses' => 'PageController@product',
    ]);

//Orders

Route::get('/pending', [
        'uses' => 'PageController@pending',
    ])->middleware('isadmin');

Route::get('/cancelled', [
        'uses' => 'PageController@cancelled',
    ])->middleware('isadmin');

Route::get('/delivered', [
        'uses' => 'PageController@delivered',
    ])->middleware('isadmin');

Route::get('/picked', [
        'uses' => 'PageController@picked',
    ])->middleware('isadmin');

Route::get('/processing', [
        'uses' => 'PageController@processing',
    ])->middleware('isadmin');


Route::post('/viewpendingorder/{id}', [
        'uses' => 'PageController@updatependingorder',
        'as' => 'updatependingorder'
    ])->middleware('isadmin');


Route::get('/vieworder/{id}', [
        'uses' => 'PageController@viewordersinfo',
    ])->middleware('isadmin');


Route::post('/vieworder/{id}', [
        'uses' => 'PageController@updateorder',
        'as' => 'updateorder'
    ])->middleware('isadmin');


//User Orders

Route::get('/orders', [
        'uses' => 'PageController@orders',
    ])->middleware('auth');

Route::get('/orderinformation/{id}', [
        'uses' => 'PageController@orderinformation',
    ])->middleware('auth');

//loading

Route::get('/loading', function () {
    return view('others.loading');
});

//cart

Route::get('/cart', [
    'uses' => 'PageController@cart',
    'as' => 'cart'
])->middleware('auth');

Route::get('/cart/delete/{id}', [
    'uses' => 'PageController@deletetocart',
    'as' => 'cartdelete'
])->middleware('auth');

Route::get('cart/incr/{id}', [
    'uses' => 'PageController@incr',
    'as' => 'cartincr'
])->middleware('auth');

Route::get('cart/decr/{id}', [
    'uses' => 'PageController@decr',
    'as' => 'cartdecr'
])->middleware('auth');

Route::get('/cart/add/{id}', [
    'uses' => 'PageController@addtocart',
    'as' => 'cartadd'
])->middleware('auth');

Route::get('/buy/now/{id}', [
    'uses' => 'PageController@buynow',
    'as' => 'buynow'
])->middleware('auth');

//PDF

//Route::get('/invoice/{id}', [
//"uses"=>"PageController@pdf"
//])->middleware('auth');

//Track

Route::get('/track', function () {
    return view('admin.orders.track');
})->middleware('isadmin');

Route::get('/track/results', [
    'uses' => 'PageController@track',
    'as' => 'track'
])->middleware('auth');

//Users Search

Route::get('/searchusers', function () {
    return view('admin.users.searchusers');
})->middleware('isadmin');

Route::get('/searchusers/results', [
    'uses' => 'PageController@searchusers',
    'as' => 'searchusers'
])->middleware('auth');


Route::get('/search', [
        'uses' => 'PageController@search',
        'as' => 'search'
    ]);

//.....................................................................................................

















//checkout
Route::get('/shippinginfo', [
    'uses' => 'PageController@viewshippinginfo',
])->middleware('auth');

Route::get('/payment', [
    'uses' => 'PageController@viewpayment',
])->middleware('auth');


Route::get('/orderreview', [
    'uses' => 'PageController@vieworderreview',
])->middleware('auth');

Route::post('/payment', [
    'uses' => 'PageController@shippinginfo',
    'as' => 'shippinginfo'
])->middleware('auth');


Route::post('/orderreview', [
    'uses' => 'PageController@payment',
    'as' => 'payment'
])->middleware('auth');

Route::post('/thankyou', [
    'uses' => 'PageController@checkout',
    'as' => 'orderreview'
])->middleware('auth');



Route::get('/thankyou', function () {
    return view('cart.thankyou');
})->middleware('auth');

//settings

Route::get('/settings', [
"uses"=>"PageController@viewsettings"
])->middleware('isadmin');

Route::post('/settings', [
"uses"=>"PageController@updatesettings"
])->name('updatesettings')->middleware('isadmin');




//








Route::get('/users/search', [
        'uses' => 'PageController@searchusers',
        'as' => 'searchusers'
    ])->middleware('isadmin');





Route::get('/book/search', [
        'uses' => 'PageController@searchbooks',
        'as' => 'searchbooks'
    ])->middleware('isadmin');



Route::get('/orders/search', [
        'uses' => 'PageController@searchorders',
        'as' => 'searchorders'
    ])->middleware('isadmin');





