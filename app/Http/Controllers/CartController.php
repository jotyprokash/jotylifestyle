<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('cart.cart');
    }

    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        Cart::add([
            'id'       => $product->id,
            'name'     => $product->title,
            'quantity' => 1,
            'price'    => $product->sellingprice,
            'attributes' => [
                'image' => $product->picture,
                'color' => $product->color,
                'size'  => $request->size,
            ]
        ]);

        session()->flash('notif', 'Product Added To Cart!');
        return redirect()->back();
    }

    public function remove($id)
    {
        Cart::remove($id);
        session()->flash('notif', 'Product Removed!');
        return redirect()->back();
    }

    public function increment($id)
    {
        $product = Product::findOrFail($id);
        $cartItem = Cart::get($id);

        if ($product->totalquantity > $cartItem->quantity) {
            Cart::update($id, ['quantity' => 1]);
            session()->flash('notif', 'Quantity Incremented!');
        } else {
            session()->flash('notif', 'Not Enough Stock!');
        }

        return redirect()->back();
    }

    public function decrement($id)
    {
        $cartItem = Cart::get($id);

        if ($cartItem->quantity > 1) {
            Cart::update($id, ['quantity' => -1]);
            session()->flash('notif', 'Quantity Decremented!');
        } else {
            Cart::remove($id);
            session()->flash('notif', 'Product Removed!');
        }

        return redirect()->back();
    }

    public function buyNow(Request $request, $id)
    {
        $this->add($request, $id);
        return redirect()->route('checkout.shipping');
    }
}
