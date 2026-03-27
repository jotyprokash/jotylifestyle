<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Category;
use App\SubCategory;
use App\Product;
use App\Order;
use App\Campaign;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('isadmin');
    }

    public function index()
    {
        $users = User::where('is_admin', '0')->count();
        $admins = User::where('is_admin', '1')->count();
        $categories = Category::count();
        $subcategories = SubCategory::count();
        $products = Product::count();
        
        $trashbox = Product::onlyTrashed()->count() + 
                    Category::onlyTrashed()->count() + 
                    SubCategory::onlyTrashed()->count() + 
                    User::onlyTrashed()->count() + 
                    Campaign::onlyTrashed()->count();
        
        $orders = Order::count();
        $camproducts = Campaign::count();
        $totalsales = Order::sum('paymentamount');

        return view('admin.admins.admin', compact(
            'users', 'admins', 'products', 'categories', 
            'subcategories', 'trashbox', 'orders', 'totalsales', 'camproducts'
        ));
    }
}
