<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Category;
use App\SubCategory;
use App\Product;
use App\Campaign;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class TrashController extends Controller
{
    public function __construct()
    {
        $this->middleware('isadmin');
    }

    public function index()
    {
        Paginator::useBootstrap();
        
        $alladmins = User::onlyTrashed()->where('is_admin', '1')->paginate(10);
        $alladminscount = User::onlyTrashed()->where('is_admin', '1')->count();
        
        $allusers = User::onlyTrashed()->where('is_admin', '0')->paginate(10);
        $alluserscount = User::onlyTrashed()->where('is_admin', '0')->count();
        
        $allcategories = Category::onlyTrashed()->paginate(10);
        $allcategoriescount = Category::onlyTrashed()->count();
        
        $allsubcategories = SubCategory::onlyTrashed()->paginate(10);
        $allsubcategoriescount = SubCategory::onlyTrashed()->count();
        
        $allproducts = Product::onlyTrashed()->paginate(10);
        $allproductscount = Product::onlyTrashed()->count();
        
        $allcamproducts = Campaign::onlyTrashed()->paginate(10);
        $allcamproductscount = Campaign::onlyTrashed()->count();

        return view('admin.trashbox.trashbox', compact(
            'alladmins', 'alladminscount', 
            'allusers', 'alluserscount', 
            'allcategories', 'allcategoriescount', 
            'allsubcategories', 'allsubcategoriescount', 
            'allproducts', 'allproductscount', 
            'allcamproductscount', 'allcamproducts'
        ))->with('no', 1);
    }

    // Product Kill/Restore
    public function killProducts($id)
    {
        Product::onlyTrashed()->findOrFail($id)->forceDelete();
        session()->flash('notif', 'Product Permanently Deleted Successfully');
        return redirect()->back();
    }

    public function restoreProducts($id)
    {
        Product::onlyTrashed()->findOrFail($id)->restore();
        session()->flash('notif', 'Product Restored Successfully!');
        return redirect()->back();
    }

    // Campaign Kill/Restore
    public function killCampaign($id)
    {
        Campaign::onlyTrashed()->findOrFail($id)->forceDelete();
        session()->flash('notif', 'Campaign Product Permanently Deleted Successfully');
        return redirect()->back();
    }

    public function restoreCampaign($id)
    {
        Campaign::onlyTrashed()->findOrFail($id)->restore();
        session()->flash('notif', 'Campaign Product Restored Successfully!');
        return redirect()->back();
    }

    // Category Kill/Restore
    public function killCategories($id)
    {
        Category::onlyTrashed()->findOrFail($id)->forceDelete();
        session()->flash('notif', 'Category Permanently Deleted Successfully');
        return redirect()->back();
    }

    public function restoreCategories($id)
    {
        Category::onlyTrashed()->findOrFail($id)->restore();
        session()->flash('notif', 'Category Restored Successfully!');
        return redirect()->back();
    }

    // SubCategory Kill/Restore
    public function killSubCategories($id)
    {
        SubCategory::onlyTrashed()->findOrFail($id)->forceDelete();
        session()->flash('notif', 'SubCategory Permanently Deleted Successfully');
        return redirect()->back();
    }

    public function restoreSubCategories($id)
    {
        SubCategory::onlyTrashed()->findOrFail($id)->restore();
        session()->flash('notif', 'SubCategory Restored Successfully!');
        return redirect()->back();
    }

    // Admin/User Kill/Restore (Note: fix model names in forceDelete if needed)
    public function killAdmins($id)
    {
        User::onlyTrashed()->where('is_admin', 1)->findOrFail($id)->forceDelete();
        session()->flash('notif', 'Admin Permanently Deleted Successfully');
        return redirect()->back();
    }

    public function restoreAdmins($id)
    {
        User::onlyTrashed()->where('is_admin', 1)->findOrFail($id)->restore();
        session()->flash('notif', 'Admin Restored Successfully!');
        return redirect()->back();
    }

    public function killUsers($id)
    {
        User::onlyTrashed()->where('is_admin', 0)->findOrFail($id)->forceDelete();
        session()->flash('notif', 'User Permanently Deleted Successfully');
        return redirect()->back();
    }

    public function restoreUsers($id)
    {
        User::onlyTrashed()->where('is_admin', 0)->findOrFail($id)->restore();
        session()->flash('notif', 'User Restored Successfully!');
        return redirect()->back();
    }
}
