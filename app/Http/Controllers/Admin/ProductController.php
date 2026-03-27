<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\SubCategory;
use App\Http\Requests\Admin\StoreProductRequest;
use App\Http\Requests\Admin\UpdateProductRequest;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;

class ProductController extends Controller
{
    protected $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->middleware('isadmin');
        $this->imageService = $imageService;
    }

    public function index()
    {
        Paginator::useBootstrap();
        $allproducts = Product::orderBy('id', 'desc')->paginate(10);

        return view('admin.products.viewproducts', compact('allproducts'))->with('no', 1);
    }

    public function create()
    {
        $allcategories = Category::get();
        return view('admin.products.addproducts', compact('allcategories'));
    }

    public function findSubcategories($catname)
    {
        $subcategories = SubCategory::where('catname', $catname)->get();
        return response()->json($subcategories);
    }

    public function store(StoreProductRequest $request)
    {
        $product = new Product;
        $product->title = $request->title;
        $product->buyingprice = $request->buyingprice;
        $product->sellingprice = $request->sellingprice;
        $product->color = $request->color;
        $product->size = $request->size;
        $product->totalquantity = $request->totalquantity;
        $product->brand = $request->brand;
        $product->fabric = $request->fabric;
        $product->catname = $request->catname;
        $product->subcatname = $request->subcatname;
        $product->description = $request->description;
        $product->postby = Auth::user()->name;

        if ($request->hasFile('picture')) {
            $product->picture = $this->imageService->upload($request->file('picture'), 'productpic', 450, 600);
        }

        $product->save();

        session()->flash('notif', 'Product Added Successfully!');

        return redirect()->back();
    }

    public function show($id)
    {
        $allproducts = Product::where('id', $id)->get();
        return view('admin.products.viewproductsinfo', compact('allproducts'));
    }

    public function edit($id)
    {
        $allproducts = Product::where('id', $id)->get();
        return view('admin.products.updateproducts', compact('allproducts'));
    }

    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        
        $product->title = $request->title;
        $product->buyingprice = $request->buyingprice;
        $product->sellingprice = $request->sellingprice;
        $product->color = $request->color;
        $product->size = $request->size;
        $product->totalquantity = $request->totalquantity;
        $product->brand = $request->brand;
        $product->fabric = $request->fabric;
        $product->catname = $request->catname;
        $product->subcatname = $request->subcatname;
        $product->description = $request->description;

        if ($request->hasFile('picture')) {
            $product->picture = $this->imageService->upload($request->file('picture'), 'productpic', 450, 600, $product->picture);
        }

        $product->save();

        session()->flash('notif', 'Product Updated Successfully!');

        return redirect()->back();
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        session()->flash('notif', 'Product Trashed Successfully');

        return redirect()->back();
    }
}
