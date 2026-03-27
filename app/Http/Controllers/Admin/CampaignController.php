<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Campaign;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class CampaignController extends Controller
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
        $allproducts = Campaign::orderBy('id', 'desc')->paginate(10);

        return view('admin.campaign.viewcamproducts', compact('allproducts'))->with('no', 1);
    }

    public function create()
    {
        return view('admin.campaign.addcamproducts');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required|string|max:255',
            'sellingprice'  => 'required|numeric|min:0',
            'campaignprice' => 'required|numeric|min:0',
            'color'         => 'required|string|max:100',
            'size'          => 'required|string|max:100',
            'totalquantity' => 'required|integer|min:0',
            'brand'         => 'required|string|max:255',
            'fabric'        => 'required|string|max:255',
            'description'   => 'required|string',
            'picture'       => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $campaign = new Campaign;
        $campaign->title = $request->title;
        $campaign->campaignprice = $request->campaignprice;
        $campaign->sellingprice = $request->sellingprice;
        $campaign->color = $request->color;
        $campaign->size = $request->size;
        $campaign->totalquantity = $request->totalquantity;
        $campaign->brand = $request->brand;
        $campaign->fabric = $request->fabric;
        $campaign->description = $request->description;

        if ($request->hasFile('picture')) {
            $campaign->picture = $this->imageService->upload($request->file('picture'), 'productpic', 450, 600);
        }

        $campaign->save();

        session()->flash('notif', 'Campaign Product Added Successfully!');

        return redirect()->back();
    }

    public function show($id)
    {
        $allproducts = Campaign::where('id', $id)->get();
        return view('admin.campaign.viewcamproductsinfo', compact('allproducts'));
    }

    public function edit($id)
    {
        $allproducts = Campaign::where('id', $id)->get();
        return view('admin.campaign.updatecamproducts', compact('allproducts'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'         => 'required|string|max:255',
            'campaignprice' => 'required|numeric|min:0',
            'sellingprice'  => 'required|numeric|min:0',
            'color'         => 'required|string|max:100',
            'size'          => 'required|string|max:100',
            'totalquantity' => 'required|integer|min:0',
            'brand'         => 'required|string|max:255',
            'fabric'        => 'required|string|max:255',
            'description'   => 'required|string',
            'picture'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $campaign = Campaign::findOrFail($id);
        $campaign->title = $request->title;
        $campaign->campaignprice = $request->campaignprice;
        $campaign->sellingprice = $request->sellingprice;
        $campaign->color = $request->color;
        $campaign->size = $request->size;
        $campaign->totalquantity = $request->totalquantity;
        $campaign->brand = $request->brand;
        $campaign->fabric = $request->fabric;
        $campaign->description = $request->description;

        if ($request->hasFile('picture')) {
            $campaign->picture = $this->imageService->upload(
                $request->file('picture'), 
                'productpic', 
                450, 600, 
                $campaign->picture
            );
        }

        $campaign->save();

        session()->flash('notif', 'Campaign Product Updated Successfully!');

        return redirect()->back();
    }

    public function destroy($id)
    {
        $campaign = Campaign::findOrFail($id);
        $campaign->delete();

        session()->flash('notif', 'Campaign Product Trashed Successfully');

        return redirect()->back();
    }
}
