<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('isadmin');
    }

    public function index()
    {
        Paginator::useBootstrap();
        $allcategories = Category::paginate(10);
        return view('admin.categories.categories', compact('allcategories'))->with('no', 1);
    }

    public function create()
    {
        return view('admin.categories.addcategories');
    }

    public function store(Request $request)
    {
        $request->validate([
            'catname' => 'required|string|max:255|unique:categories,catname',
        ]);

        $category = new Category;
        $category->catname = $request->catname;
        $category->save();

        session()->flash('notif', 'Category Added Successfully!');

        return redirect()->back();
    }

    public function edit($id)
    {
        $allcategories = Category::where('id', $id)->get();
        return view('admin.categories.updatecategories', compact('allcategories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'catname' => 'required|string|max:255|unique:categories,catname,' . $id,
        ]);

        $category = Category::findOrFail($id);
        $category->catname = $request->catname;
        $category->save();

        session()->flash('notif', 'Category Updated Successfully!');

        return redirect()->back();
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        session()->flash('notif', 'Category Trashed Successfully!');

        return redirect()->back();
    }
}
