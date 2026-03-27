<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('isadmin');
    }

    public function index()
    {
        Paginator::useBootstrap();
        $allsubcategories = SubCategory::paginate(10);
        return view('admin.subcategories.subcategories', compact('allsubcategories'))->with('no', 1);
    }

    public function create()
    {
        $allcategories = Category::get();
        return view('admin.subcategories.addsubcategories', compact('allcategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'catname'    => 'required|string|exists:categories,catname',
            'subcatname' => 'required|string|max:255',
        ]);

        $subCategory = new SubCategory;
        $subCategory->catname = $request->catname;
        $subCategory->subcatname = $request->subcatname;
        $subCategory->save();

        session()->flash('notif', 'SubCategory Added Successfully!');

        return redirect()->back();
    }

    public function edit($id)
    {
        $allsubcategories = SubCategory::where('id', $id)->get();
        $allcategories = Category::all();
        
        return view('admin.subcategories.updatesubcategories', compact('allcategories', 'allsubcategories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'subcatname' => 'required|string|max:255',
        ]);

        $subCategory = SubCategory::findOrFail($id);
        $subCategory->subcatname = $request->subcatname;
        $subCategory->save();

        session()->flash('notif', 'SubCategory Updated Successfully!');

        return redirect()->back();
    }

    public function destroy($id)
    {
        $subCategory = SubCategory::findOrFail($id);
        $subCategory->delete();

        session()->flash('notif', 'SubCategory Trashed Successfully!');

        return redirect()->back();
    }
}
