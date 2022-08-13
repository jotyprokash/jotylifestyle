<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\OrderProducts;
use App\Shippinginfo;
use App\Campaign;
use App\Product;
use App\SubCategory;
use App\Category;
use App\Order;
use App\Payment;
use App\Settings;
use App\Mail\SendMail;
use PDF;
use Cart;
use Cache;
use Image;
use Session;
use Mail;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Haruncpi\LaravelIdGenerator\IdGenerator;


class PageController extends Controller
{
//...........................................................................................
//User Section

    public function show()
    {
        if (Auth::user())
        {
            $user = User::find(Auth::user()->id);

            if($user)
            {

                return view('user.update')->withUser($user);
            }
            else
            {
                return redirect()->back();
            }
        }
        else
        {
            return redirect()->back();
        
        }
    }

    public function showpassword()
    {
        if (Auth::user())
        {
            $user = User::find(Auth::user()->id);

            if($user)
            {

                return view('user.changepassword')->withUser($user);
            }
            else
            {
                return redirect()->back();
            }
        }
        else
        {
            return redirect()->back();
        
        }
    }

    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);

        if($user)
        {
            $this->validate($request, [
            'name'    =>  'required',
            'email'    =>  'required',
            'address'    =>  'required',
            'phonenumber'     =>  'required|min:11',

        ]);

            if($request->hasfile('userpic'))
            {
                $file=$request->file('userpic');
                $extention= $file->getClientOriginalExtension();
                $filename=time().'.'.$extention;
                Image::make($file)->resize(300, 300)->save( public_path('/userpic/' . $filename ) );
                $user->userpic=$filename;
            }



            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->address = $request->input('address');
            $user->phonenumber = $request->input('phonenumber');


            $user->save();
            session()->flash('notif','Profile Updated Successfully !');

            return redirect()->back();
            
        }
        else
        {
            return redirect()->back();
        }

    }

    public function changepassword(Request $request)
    {
        $user = User::find(Auth::user()->id);

        if($user)
        {
            $this->validate($request, [
            'oldpassword'     =>  'required',
            'newpassword'     =>  'required|min:6',


        ]);

            $data = $request->all();

            $user = User::find(auth()->user()->id);
 
                if(!\Hash::check($data['oldpassword'], $user->password)){
             
                     session()->flash('notif','Old Password does not match.');
                     return redirect()->back();
             
                }else{
             
                   $user->password = bcrypt($request->input('newpassword'));


                    $user->save();

                    session()->flash('notif','Password Changed Successfully');
                    return redirect()->back();
             
                }

        }
        else
        {
            return redirect()->back();
        }

    }

//...........................................................................................

//Admin Section


    //Users


    public function viewusers()
    {
        Paginator::useBootstrap();
        $allusers = User::where('is_admin','0')->paginate(10);
        return view('admin.users.viewusers', compact('allusers'))->with('no', 1);
    }


    public function viewuser(Request $request)
    {
        
        $allusers = User::all()->where('id',$request->id);

        return view('admin.users.viewuserinfo', compact('allusers'));

    }


    public function deleteuser(Request $request)
    {
        
        $ob = User::findOrFail($request->id);
        $ob->delete();

        session()->flash('notif','User Trash Successfully');

        return redirect()->back();

    }

   public function updateuser(Request $request)
    {

        $ob = User::findOrFail($request->id);

        $ob->update($request->all());
       
        session()->flash('notif','User Updated Successfully');

        return redirect()->back();
    }

    //.......................................................................................
    //Products


    public function viewaddproducts()
    {
        $allcategories = Category::get();
        return view('admin.products.addproducts', compact('allcategories'));
    }

    public function findsubcategories($catname)
    {
        $subcategories = SubCategory::where('catname', $catname)->get();
        return response()->json($subcategories);
    }


    public function addproducts(Request $request)
    {
        $ob = new Product;


        $this->validate($request, [
            'title'    =>  'required',
            'buyingprice'     =>  'required',
            'sellingprice'     =>  'required',
            'color'    =>  'required',
            'size'     =>  'required',
            'totalquantity'     =>  'required',
            'brand'     =>  'required',
            'fabric'     =>  'required',
            'catname'     =>  'required',
            'subcatname'     =>  'required',
            'description'     =>  'required',
            'picture'     =>  'required',


        ]);

        $ob->title=$request->title;
        $ob->buyingprice=$request->buyingprice;
        $ob->sellingprice=$request->sellingprice;
        $ob->color=$request->color;
        $ob->size=$request->size;
        $ob->totalquantity=$request->totalquantity;
        $ob->brand=$request->brand;
        $ob->fabric=$request->fabric;
        $ob->catname=$request->catname;
        $ob->subcatname=$request->subcatname;
        $ob->description=$request->description;
        
        
        $ob->postby=Auth::user()->name;

        if($request->hasfile('picture'))
        {
            $file1=$request->file('picture');
            $extention1= $file1->getClientOriginalExtension();
            $filename1=time().'.'.$extention1;
            Image::make($file1)->resize(450, 600)->save( public_path('/productpic/' . $filename1 ) );
            $ob->picture=$filename1;
        }

        $ob->save();

        session()->flash('notif','Product Added Successfully !');

        return redirect()->back();
    }

    public function viewproducts()
    {
        Paginator::useBootstrap();
        $allproducts = Product::orderBy('id', 'desc')->paginate(10);

        return view('admin.products.viewproducts', compact('allproducts'))->with('no', 1);
    }



    public function deleteproducts(Request $request)
    {
        
        $ob = Product::findOrFail($request->id);
        $ob->delete();

        session()->flash('notif','Product Trashed Successfully');

        return redirect()->back();

    }


    public function viewproductsinfo(Request $request)
    {
        $allproducts = Product::all()->where('id', $request->id);

        return view('admin.products.viewproductsinfo', compact('allproducts'));
    }


    public function viewupdateproducts(Request $request)
    {

        $allproducts = Product::all()->where('id', $request->id);
        
        return view('admin.products.updateproducts', compact('allproducts'));
    }


    public function updateproducts(Request $request, $id)
    {
        $ob = Product::find($id);
        $this->validate($request, [
            'title'    =>  'required',
            'buyingprice'     =>  'required',
            'sellingprice'     =>  'required',
            'color'    =>  'required',
            'size'     =>  'required',
            'totalquantity'     =>  'required',
            'brand'     =>  'required',
            'fabric'     =>  'required',
            'catname'     =>  'required',
            'subcatname'     =>  'required',
            'description'     =>  'required',

        ]);
        
        $ob->title = $request->input('title');
        $ob->buyingprice = $request->input('buyingprice');
        $ob->sellingprice = $request->input('sellingprice');
        $ob->color = $request->input('color');
        $ob->size = $request->input('size');
        $ob->totalquantity = $request->input('totalquantity');
        $ob->brand = $request->input('brand');
        $ob->fabric = $request->input('fabric');
        $ob->catname = $request->input('catname');
        $ob->subcatname = $request->input('subcatname');
        $ob->description = $request->input('description');

        if($request->hasfile('picture'))
        {
            $file1=$request->file('picture');
            $extention1= $file1->getClientOriginalExtension();
            $filename1=time().'.'.$extention1;
            Image::make($file1)->resize(450, 600)->save( public_path('/productpic/' . $filename1 ) );
            $ob->picture=$filename1;
        }

        $ob->save();

        session()->flash('notif','Product Updated Successfully !');

        return redirect()->back();
    }

    //.......................................................................................


    //Campaign Products

    public function viewaddcamproducts()
    {
        return view('admin.campaign.addcamproducts');
    }

    public function addcamproducts(Request $request)
    {
        $ob = new Campaign;


        $this->validate($request, [
            'title'    =>  'required',
            'sellingprice'     =>  'required',
            'campaignprice'     =>  'required',
            'color'    =>  'required',
            'size'     =>  'required',
            'totalquantity'     =>  'required',
            'brand'     =>  'required',
            'fabric'     =>  'required',
            'description'     =>  'required',
            'picture'     =>  'required',


        ]);

        $ob->title=$request->title;
        $ob->campaignprice=$request->campaignprice;
        $ob->sellingprice=$request->sellingprice;
        $ob->color=$request->color;
        $ob->size=$request->size;
        $ob->totalquantity=$request->totalquantity;
        $ob->brand=$request->brand;
        $ob->fabric=$request->fabric;
        $ob->description=$request->description;

        if($request->hasfile('picture'))
        {
            $file1=$request->file('picture');
            $extention1= $file1->getClientOriginalExtension();
            $filename1=time().'.'.$extention1;
            Image::make($file1)->resize(450, 600)->save( public_path('/productpic/' . $filename1 ) );
            $ob->picture=$filename1;
        }

        $ob->save();

        session()->flash('notif','Campaign Product Added Successfully !');

        return redirect()->back();
    }

    public function viewcamproducts()
    {
        Paginator::useBootstrap();
        $allproducts = Campaign::orderBy('id', 'desc')->paginate(10);

        return view('admin.campaign.viewcamproducts', compact('allproducts'))->with('no', 1);
    }



    public function deletecamproducts(Request $request)
    {
        
        $ob = Campaign::findOrFail($request->id);
        $ob->delete();

        session()->flash('notif','Campaign Product Trashed Successfully');

        return redirect()->back();

    }


    public function viewcamproductsinfo(Request $request)
    {
        $allproducts = Campaign::all()->where('id', $request->id);

        return view('admin.campaign.viewcamproductsinfo', compact('allproducts'));
    }


    public function viewupdatecamproducts(Request $request)
    {

        $allproducts = Campaign::all()->where('id', $request->id);
        
        return view('admin.campaign.updatecamproducts', compact('allproducts'));
    }


    public function updatecamproducts(Request $request, $id)
    {
        $ob = Campaign::find($id);
        $this->validate($request, [
            'title'    =>  'required',
            'campaignprice'     =>  'required',
            'sellingprice'     =>  'required',
            'color'    =>  'required',
            'size'     =>  'required',
            'totalquantity'     =>  'required',
            'brand'     =>  'required',
            'fabric'     =>  'required',
            'description'     =>  'required',

        ]);
        
        $ob->title = $request->input('title');
        $ob->campaignprice = $request->input('campaignprice');
        $ob->sellingprice = $request->input('sellingprice');
        $ob->color = $request->input('color');
        $ob->size = $request->input('size');
        $ob->totalquantity = $request->input('totalquantity');
        $ob->brand = $request->input('brand');
        $ob->fabric = $request->input('fabric');
        $ob->description = $request->input('description');

        if($request->hasfile('picture'))
        {
            $file1=$request->file('picture');
            $extention1= $file1->getClientOriginalExtension();
            $filename1=time().'.'.$extention1;
            Image::make($file1)->resize(450, 600)->save( public_path('/productpic/' . $filename1 ) );
            $ob->picture=$filename1;
        }

        $ob->save();

        session()->flash('notif','Campaign Product Updated Successfully !');

        return redirect()->back();
    }

    //.......................................................................................

    //Trash Box

    public function viewalltrash() 
    {
        Paginator::useBootstrap();
        $alladmins = User::onlyTrashed()->where('is_admin','1')->paginate(10);
        $alladminscount = User::onlyTrashed()->where('is_admin','1')->count();
        $allusers = User::onlyTrashed()->where('is_admin','0')->paginate(10);
        $alluserscount = User::onlyTrashed()->where('is_admin','0')->count();
        $allcategories = Category::onlyTrashed()->paginate(10);
        $allcategoriescount = Category::onlyTrashed()->count();
        $allsubcategories = SubCategory::onlyTrashed()->paginate(10);
        $allsubcategoriescount = SubCategory::onlyTrashed()->count();
        $allproducts = Product::onlyTrashed()->paginate(10);
        $allproductscount = Product::onlyTrashed()->count();
        $allcamproducts = Campaign::onlyTrashed()->paginate(10);
        $allcamproductscount = Campaign::onlyTrashed()->count();

        return view('admin.trashbox.trashbox', compact('alladmins','alladminscount','allusers','alluserscount','allcategories','allcategoriescount','allsubcategories','allsubcategoriescount','allproducts','allproductscount','allcamproductscount','allcamproducts'))->with('no',1);
    }


    //.......................................................................................
    //kill

    public function killproducts(Request $request)
    {
        $allproducts = Product::onlyTrashed()->findOrFail($request->id)->forceDelete();

        session()->flash('notif','Product Permanently Deleted Successfully');

        return redirect()->back();
    }

    public function killcm(Request $request)
    {
        $allproducts = Campaign::onlyTrashed()->findOrFail($request->id)->forceDelete();

        session()->flash('notif','Campaign Product Permanently Deleted Successfully');

        return redirect()->back();
    }

    public function killcategories(Request $request)
    {
        $allcategories = Category::onlyTrashed()->findOrFail($request->id)->forceDelete();

        session()->flash('notif','Category Permanently Deleted Successfully');

        return redirect()->back();
    }


    public function killsubcategories(Request $request)
    {
        $allsubcategories = SubCategory::onlyTrashed()->findOrFail($request->id)->forceDelete();

        session()->flash('notif','SubCategory Permanently Deleted Successfully');

        return redirect()->back();
    }


    public function killadmins(Request $request)
    {
        $alladmins = Category::onlyTrashed()->where('is_admin', 1)->findOrFail($request->id)->forceDelete();

        session()->flash('notif','Admin Permanently Deleted Successfully');

        return redirect()->back();
    }


    public function killusers(Request $request)
    {
        $allusers = Category::onlyTrashed()->where('is_admin', 0)->findOrFail($request->id)->forceDelete();

        session()->flash('notif','User Permanently Deleted Successfully');

        return redirect()->back();
    }

    //.......................................................................................
    //restore

    public function restoreproducts(Request $request)
    {
        $allproducts = Product::onlyTrashed()->findOrFail($request->id)->restore();

        session()->flash('notif','Product Restored Successfully !');

        return redirect()->back();
    }

    public function restorecm(Request $request)
    {
        $allproducts = Campaign::onlyTrashed()->findOrFail($request->id)->restore();

        session()->flash('notif','Campaign Product Restored Successfully !');

        return redirect()->back();
    }

    public function restorecategories(Request $request)
    {
        $allcategories = Category::onlyTrashed()->findOrFail($request->id)->restore();

        session()->flash('notif','Category Restored Successfully !');

        return redirect()->back();
    }


    public function restoresubcategories(Request $request)
    {
        $allsubcategories = SubCategory::onlyTrashed()->findOrFail($request->id)->restore();

        session()->flash('notif','SubCategory Restored Successfully !');

        return redirect()->back();
    }


    public function restoreadmins(Request $request)
    {
        $alladmins = Category::onlyTrashed()->where('is_admin', 1)->findOrFail($request->id)->restore();

        session()->flash('notif','Admin Restored Successfully !');

        return redirect()->back();
    }


    public function restoreusers(Request $request)
    {
        $allusers = Category::onlyTrashed()->where('is_admin', 0)->findOrFail($request->id)->restore();

        session()->flash('notif','User Restored Successfully !');

        return redirect()->back();
    }


    //admins


    public function viewadmins()
    {
        Paginator::useBootstrap();
        $allusers = User::where('is_admin','1')->paginate(10);
        return view('admin.admins.viewadmins', compact('allusers'))->with('no', 1);
    }

    //.......................................................................................
    //categories
   

   public function addcategories(Request $request)
    {
        $ob= new Category;
        $ob->catname=$request->catname;
        $ob->save();

        session()->flash('notif','Category Added Successfully !');

        return redirect()->back();
    }


    public function viewcategories()
    {
        Paginator::useBootstrap();
        $allcategories = Category::paginate(10);
        return view('admin.categories.categories', compact('allcategories'))->with('no', 1);
    }


    public function deletecategories(Request $request)
    {
        
        $ob = Category::findOrFail($request->id);
        $ob->delete();

        session()->flash('notif','Category Trashed Successfully !');

        return redirect()->back();

    }

    public function viewupdatecategories(Request $request)
    {

        $allcategories = Category::all()->where('id', $request->id);
        
        return view('admin.categories.updatecategories', compact('allcategories'));
    }

    public function updatecategories(Request $request, $id)
    {
        $ob = Category::find($id);
        $this->validate($request, [
            'catname'    =>  'required',

        ]);
        
        $ob->catname = $request->input('catname');

        $ob->save();

        session()->flash('notif','Category Updated Successfully !');

        return redirect()->back();
    }

    //.......................................................................................
    //subcategories

    public function viewaddsubcategories()
    {
        $allcategories = Category::get();
        return view('admin.subcategories.addsubcategories', compact('allcategories'));
    }


    public function addsubcategories(Request $request)
    {
        $ob= new SubCategory;
        $ob->catname=$request->catname;
        $ob->subcatname=$request->subcatname;
        $ob->save();

        session()->flash('notif','SubCategory Added Successfully !');

        return redirect()->back();
    }


    public function viewsubcategories()
    {
        Paginator::useBootstrap();
        $allsubcategories = SubCategory::paginate(10);
        return view('admin.subcategories.subcategories', compact('allsubcategories'))->with('no', 1);
    }


    public function deletesubcategories(Request $request)
    {
        
        $ob = SubCategory::findOrFail($request->id);
        $ob->delete();

        session()->flash('notif','SubCategory Trashed Successfully !');

        return redirect()->back();

    }

    public function viewupdatesubcategories(Request $request)
    {

        $allsubcategories = SubCategory::all()->where('id', $request->id);
        $allcategories = Category::all();
        
        return view('admin.subcategories.updatesubcategories', compact('allcategories','allsubcategories'));
    }

    public function updatesubcategories(Request $request, $id)
    {
        $ob = SubCategory::find($id);
        $this->validate($request, [
            'subcatname'    =>  'required',

        ]);
        
        $ob->subcatname = $request->input('subcatname');

        $ob->save();

        session()->flash('notif','SubCategory Updated Successfully !');

        return redirect()->back();
    }

    //.......................................................................................
    //Dashboard Count

    public function counts() {

        $users = User::where('is_admin','0')->count();
        $admins = User::where('is_admin','1')->count();
        $categories = Category::count();
        $subcategories = SubCategory::count();
        $products = Product::count();
        $trashbox = Product::onlyTrashed()->get()->count()+Category::onlyTrashed()->get()->count()+SubCategory::onlyTrashed()->get()->count()+User::onlyTrashed()->where('is_admin','0')->get()->count()+Campaign::onlyTrashed()->get()->count()+User::onlyTrashed()->where('is_admin','1')->get()->count();
        $orders = Order::count();
        $camproducts = Campaign::count();
        $totalsales = Order::all()->sum('paymentamount');

        return view('admin.admins.admin', compact('users','admins','products','categories','subcategories','trashbox','orders','totalsales','camproducts'));
    }

    //.......................................................................................


    //Index


    public function index()
    {
        $allsettings = Settings::all()->where('id', '1');
        $allpopularproducts = Product::get()->sortByDesc('view_count')->take(12);
        $alltshirts = Product::get()->where('subcatname','T-Shirt')->take(12);
        $allpanjabis = Product::get()->where('subcatname','Panjabi')->take(12);
        $allpants = Product::get()->where('subcatname','Pant')->take(12);
        $allcampaigns = Campaign::get()->take(12);

        return view('index.index', compact('allsettings','allpopularproducts','alltshirts','allpanjabis','allpants','allcampaigns')); 
    }

    public function popular()
    {
        $allpopularproducts = Product::get()->sortByDesc('view_count');

        return view('others.popular', compact('allpopularproducts')); 
    }

    //.......................................................................................

    //Product

    public function product(Request $request)
    {
        $allproducts = Product::all()->where('id', $request->id);

        $allviews = Product::all()->where('id', $request->id)->first();

        $productkey = 'product' . $allviews->id;

        if(!Session::has($productkey))
        {
            $allviews->increment('view_count');
            Session::put($productkey,1);
        }
        
        return view('product.product', compact('allproducts'));
    }


    //.......................................................................................
    //cart

    public function cart()
    {        
        return view('cart.cart');
    }

    public function deletetocart($id)
    {
        Cart::remove($id);

        session()->flash('notif','Product Removed !');

        return redirect()->back();
    }


    public function incr($id)
    {    
        $ob = Product::find($id);

        $ob1 = Cart::get($id);
            

        if($ob->totalquantity > $ob1->quantity)
        {
            Cart::update($id, array(
                'quantity' => +1,
                ));
            session()->flash('notif','Product Quantity Updated !');
            return redirect()->back();
        }
        else
        {
            session()->flash('notif','Not Enough Quantity !');
            return redirect()->back();
        }
    }
    public function decr($id)
    {
        $ob = Product::find($id);

        $ob1 = Cart::get($id);

        if($ob1->quantity > 1)
        {
            Cart::update($id, array(
                'quantity' => -1,
                ));
            session()->flash('notif','Product Qunatity Updated !');
                return redirect()->back();
        }
        else
        {
            Cart::remove($id);

            session()->flash('notif','Product Removed !');
            return redirect()->back();
        }
    }



    public function addtocart(Request $request, $id)
    {
        $pdt = Product::find($id);

        $cartItem = Cart::add([
            'id' => $pdt->id,
            'name' => $pdt->title,
            'quantity' => 1,
            'price' => $pdt->sellingprice,
            'image' => $pdt->picture,
            'color' => $pdt->color,
            'size' => $request->size,
        ]);

        session()->flash('notif','Product Added To Cart !');

        return redirect()->back();
    }


    public function buynow(Request $request, $id)
    {
        $pdt = Product::find($id);

        $cartItem = Cart::add([
            'id' => $pdt->id,
            'name' => $pdt->title,
            'quantity' => 1,
            'price' => $pdt->sellingprice,
            'image' => $pdt->picture,
            'color' => $pdt->color,
            'size' => $request->size,
        ]);

        return view('cart.shippinginfo');
    }

    //.......................................................................................

    //checkout

    public function viewshippinginfo()
    {    
        return view('cart.shippinginfo');
    }

    public function viewpayment()
    {    
        $allorders = OrderProducts::all();

        return view('cart.payment', compact('allorders'));
    }

    public function vieworderreview()
    {    
        return view('cart.orderreview');
    }



    public function shippinginfo(Request $request)
    {

        $ob = new Shippinginfo;

        $this->validate($request, [
            'username'    =>  'required',
            'address'    =>  'required',
            'phonenumber'     =>  'required',
        ]);
        
        $ob->userid=$request->userid;
        $ob->username=$request->username;
        $ob->address=$request->address;
        $ob->phonenumber=$request->phonenumber;

        $ob->save();

        $allorders = Shippinginfo::all();

        $latestOrder = Shippinginfo::orderBy('created_at','DESC')->first();

        return view('cart.payment', compact('allorders','latestOrder'));
    }


    public function payment(Request $request)
    {

        $ob = new Payment;

        $this->validate($request, [
            'paymentmethod'    =>  'required',
        ]);

        $ob->shippingid=$request->shippingid;
        $ob->trxid=$request->trxid;
        $ob->paymentmethod=$request->paymentmethod;
        $ob->senderphonenumber=$request->senderphonenumber;

        $ob->save();
       
        $allorders = Shippinginfo::all()->where('id', $request->shippingid);
        $allpayments = Payment::all();

        $obpaymentmethod = $request->paymentmethod;
        $obsenderphonenumber = $request->senderphonenumber;
        $obtrxid = $request->trxid;

        
        return view('cart.orderreview', compact('allorders','allpayments','obpaymentmethod','obsenderphonenumber','obtrxid'));

    }



    public function checkout(Request $request)
    {
        $items = Cart::getContent();
         
         foreach($items as $item)
         {
      
             OrderProducts::create([
                 'productid' => $item->id,
                 'producttitle' => $item->name,
                 'quantity' => $item->quantity,
                 'picture' => $item->image,
                 'productprice' => $item->price,
                 'color' => $item->color,
                 'size' => $item->size,
                 'total' => $item->getPriceSum(),
                 'shippingid' => $request->shippingid,
                 'paymentid' => $request->paymentid,
                 
             ]);

            $ob = Product::find($item->id);
            $ob->update(['totalquantity' => $ob->totalquantity - $item->quantity]);

        }


        $ob = new Order;

        $ob->shippingid=$request->shippingid;
        $ob->userid=$request->userid;
        $ob->username=$request->username;
        $ob->address=$request->address;
        $ob->phonenumber=$request->phonenumber;
        $ob->senderphonenumber=$request->senderphonenumber;
        $ob->email=Auth::user()->email;
        $ob->paymentid=$request->paymentid;
        $ob->trxid=$request->trxid;
        $ob->totalamount= Cart::getTotal();
        $ob->paymentmethod=$request->paymentmethod;
        $ob->save();

        $latestOrder = Order::orderBy('created_at','DESC')->first();
        $ob->invoice = '#RL-'.str_pad($latestOrder->id , 8, "0", STR_PAD_LEFT);
        $ob->save();


        $order_data = array(
            'invoice' => $ob->invoice,
            'username' => $request->username,
            'email' => Auth::user()->email,
            'paymentmethod' => $request->paymentmethod,
            'phonenumber' => $request->phonenumber,
            'trxid' => $request->trxid,
            'senderphonenumber' => $request->senderphonenumber,
            'address' => $request->address,
        );



        Mail::send('others.ordermail', $order_data, function ($message) use ($order_data) {
            $message->to($order_data['email'], $order_data['username'])
                ->subject('Order Information')
                ->from('admin@rezalifestyle.com', 'REZA Lifestyle');
        });

        Cart::clear();

        return view('cart.thankyou');

    }


    //.......................................................................................
    //orders


    public function pending()
    {
        Paginator::useBootstrap();
        $allpendingorders = Order::orderBy('id', 'desc')->where('status','Pending')->paginate(10);
        return view('admin.orders.pending', compact('allpendingorders'))->with('no',1);
    }

    public function cancelled()
    {
        Paginator::useBootstrap();
        $allcancelledorders = Order::orderBy('id', 'desc')->where('status','Cancelled')->paginate(10);
        return view('admin.orders.cancelled', compact('allcancelledorders'))->with('no',1);
    }

    public function delivered()
    {
        Paginator::useBootstrap();
        $alldeliveredorders = Order::orderBy('id', 'desc')->where('status','Delivered')->paginate(10);
        return view('admin.orders.delivered', compact('alldeliveredorders'))->with('no',1);
    }


    public function picked()
    {
        Paginator::useBootstrap();
        $allpickedorders = Order::orderBy('id', 'desc')->where('status','Picked')->paginate(10);
        return view('admin.orders.picked', compact('allpickedorders'))->with('no',1);
    }

    public function processing()
    {
        Paginator::useBootstrap();
        $allprocessingorders = Order::orderBy('id', 'desc')->where('status','Processing')->paginate(10);
        return view('admin.orders.processing', compact('allprocessingorders'))->with('no',1);
    }



    public function updatependingorder(Request $request, $id)
    {
        $ob = Order::find($id);
        $this->validate($request, [
            'status'    =>  'required',
            'paymentamount'    =>  'required',

        ]);
        
        $ob->paymentamount = $request->input('paymentamount');
        $ob->status = $request->input('status');

        $ob->save();

        session()->flash('notif','Status Updated Successfully !');

        return redirect()->back();
    }


    public function viewordersinfo(Request $request)
    {
        $allordersproductinfo = OrderProducts::join('orders','orders.paymentid', '=', 'order_products.paymentid')->where('orders.id', $request->id)->get(['order_products.*']);
        $allordersinfo = Order::all()->where('id',$request->id);
        return view('admin.orders.ordersinfo', compact('allordersproductinfo','allordersinfo'));
    }

    public function updateorder(Request $request, $id)
    {
        $ob = Order::find($id);
        $this->validate($request, [
            'status'    =>  'required',

        ]);

        $ob->status = $request->input('status');

        $ob->save();

        session()->flash('notif','Status Updated Successfully !');

        return redirect()->back();
    }



    //User Orders

    public function orders()
    {
        Paginator::useBootstrap();
        $allorders = Order::orderBy('id', 'desc')->where('userid', Auth::user()->id)->paginate(10);
        return view('user.orders', compact('allorders'))->with('no',1);
    }


    public function orderinformation(Request $request)
    {
        $allordersproductinfo = OrderProducts::join('orders','orders.paymentid', '=', 'order_products.paymentid')->where('orders.id', $request->id)->get(['order_products.*']);
        $allordersinfo = Order::all()->where('id',$request->id);
        return view('user.orderinformation', compact('allordersproductinfo','allordersinfo'));
    }

    //........................................................................................
    //Settings

    public function viewsettings()
    {
        $allsettings = Settings::all();
        
        return view('admin.settings.settings', compact('allsettings'));
    }

    public function updatesettings(Request $request)
    {
        $ob = Settings::find(1);


        if($request->hasfile('logo'))
        {
            $file=$request->file('logo');
            $extention= $file->getClientOriginalExtension();
            $filename=time().'.'.$extention;
            Image::make($file)->resize(190, 45)->save( public_path('/img/' . $filename ) );
            $ob->logo=$filename;
        }


        if($request->hasfile('cover1'))
        {
            $file=$request->file('cover1');
            $extention= $file->getClientOriginalExtension();
            $filename=time().'.'.$extention;
            Image::make($file)->resize(1100, 250)->save( public_path('/img/' . $filename ) );
            $ob->cover1=$filename;
        }


        if($request->hasfile('cover2'))
        {
            $file=$request->file('cover2');
            $extention= $file->getClientOriginalExtension();
            $filename=time().'.'.$extention;
            Image::make($file)->resize(1100, 250)->save( public_path('/img/' . $filename ) );
            $ob->cover2=$filename;
        }


        if($request->hasfile('cover3'))
        {
            $file=$request->file('cover3');
            $extention= $file->getClientOriginalExtension();
            $filename=time().'.'.$extention;
            Image::make($file)->resize(1100, 250)->save( public_path('/img/' . $filename ) );
            $ob->cover3=$filename;
        }



        $ob->title = $request->input('title');
        $ob->email = $request->input('email');
        $ob->phonenumber = $request->input('phonenumber');
        $ob->address = $request->input('address');

        $ob->save();

            
        session()->flash('notif','Settings Update Successfully');

        return redirect()->back();

    }

    public function contact(Request $request)
    {
        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        );

        Mail::to('khaledbubt@gmail.com')->send(new SendMail($data));


        session()->flash('notif','We received your message.Thank you !');

        return redirect()->back();
    }

    //.......................................................................................
    //PDF

    //public function pdf(Request $request)
    //{
    //    $order = Order::find($request->id);

    //    $orderproducts = OrderProducts::join('orders','orders.paymentid', '=', 'order_products.paymentid')->where('orders.id', $request->id)->get(['order_products.*']);

     //   $pdf = PDF::loadView('others.pdf', compact('order','orderproducts'));
        //return $pdf->download('invoice.pdf'); 
    //    return $pdf->stream('invoice.pdf');
        //return PDF::setOptions(['isHtml5ParserEnabled' => true])->loadView('others.pdf', compact('order','orderproducts'))->stream();
    //}

    //.......................................................................................

    //Track Order

    public function track(Request $request)
    {
        $orderinfo = Order::where('invoice','like',  '%' . request('track') . '%')->get();
        return view('admin.orders.trackresult', compact('orderinfo'));
    }

    //Search Users

    public function searchusers(Request $request)
    {
        $userinfo = User::where('name','like',  '%' . request('searchusers') . '%')->orwhere('email','like',  '%' . request('searchusers') . '%')->orwhere('phonenumber','like',  '%' . request('searchusers') . '%')->get();
        return view('admin.users.searchresults', compact('userinfo'));
    }

    //Search
    
    public function search(Request $request)
    {
        Paginator::useBootstrap();
        $allproducts = Product::where('title','like',  '%' . request('query') . '%')->paginate(10);

        return view('others.search', compact('allproducts'));
    }

    //.......................................................................................
    
    
    
}
