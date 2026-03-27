<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Campaign;
use App\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\Paginator;

class CatalogController extends Controller
{
    public function index()
    {
        $allsettings = Settings::where('id', '1')->get();
        $allpopularproducts = Product::orderBy('view_count', 'desc')->take(12)->get();
        $alltshirts = Product::where('subcatname', 'T-Shirt')->take(12)->get();
        $allpanjabis = Product::where('subcatname', 'Panjabi')->take(12)->get();
        $allpants = Product::where('subcatname', 'Pant')->take(12)->get();
        $allcampaigns = Campaign::take(12)->get();

        return view('index.index', compact(
            'allsettings', 'allpopularproducts', 'alltshirts', 
            'allpanjabis', 'allpants', 'allcampaigns'
        ));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        $productKey = 'product_' . $product->id;

        if (!Session::has($productKey)) {
            $product->increment('view_count');
            Session::put($productKey, 1);
        }

        $allproducts = [$product]; // Blade expects a collection
        return view('product.product', compact('allproducts'));
    }

    public function popular()
    {
        $allpopularproducts = Product::orderBy('view_count', 'desc')->get();
        return view('others.popular', compact('allpopularproducts'));
    }

    public function search(Request $request)
    {
        Paginator::useBootstrap();
        $query = $request->input('query');
        $allproducts = Product::where('title', 'like', '%' . $query . '%')->paginate(12);

        return view('others.search', compact('allproducts'));
    }
}
