<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderProducts;
use App\Shippinginfo;
use App\Payment;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Cart;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function shippingForm()
    {
        return view('cart.shippinginfo');
    }

    public function storeShipping(Request $request)
    {
        $request->validate([
            'username'    => 'required',
            'address'     => 'required',
            'phonenumber' => 'required',
        ]);

        $shipping = Shippinginfo::create([
            'userid'      => Auth::id(),
            'username'    => $request->username,
            'address'     => $request->address,
            'phonenumber' => $request->phonenumber,
        ]);

        return redirect()->route('checkout.payment', ['shipping_id' => $shipping->id]);
    }

    public function paymentForm(Request $request)
    {
        $shipping_id = $request->get('shipping_id');
        $latestOrder = Shippinginfo::findOrFail($shipping_id);
        return view('cart.payment', compact('latestOrder'));
    }

    public function storePayment(Request $request)
    {
        $request->validate(['paymentmethod' => 'required']);

        $payment = Payment::create([
            'shippingid'          => $request->shippingid,
            'trxid'               => $request->trxid,
            'paymentmethod'       => $request->paymentmethod,
            'senderphonenumber'   => $request->senderphonenumber,
        ]);

        return redirect()->route('checkout.review', ['payment_id' => $payment->id]);
    }

    public function review(Request $request)
    {
        $payment = Payment::findOrFail($request->payment_id);
        $allorders = Shippinginfo::where('id', $payment->shippingid)->get();
        $allpayments = [$payment];
        
        $obpaymentmethod = $payment->paymentmethod;
        $obsenderphonenumber = $payment->senderphonenumber;
        $obtrxid = $payment->trxid;

        return view('cart.orderreview', compact(
            'allorders', 'allpayments', 'obpaymentmethod', 
            'obsenderphonenumber', 'obtrxid'
        ));
    }

    public function process(Request $request)
    {
        $items = Cart::getContent();
        
        foreach ($items as $item) {
            OrderProducts::create([
                'productid'    => $item->id,
                'producttitle' => $item->name,
                'quantity'     => $item->quantity,
                'picture'      => $item->attributes->image ?? '',
                'productprice' => $item->price,
                'color'        => $item->attributes->color ?? '',
                'size'         => $item->attributes->size ?? '',
                'total'        => $item->getPriceSum(),
                'shippingid'   => $request->shippingid,
                'paymentid'    => $request->paymentid,
            ]);

            $product = Product::find($item->id);
            $product->decrement('totalquantity', $item->quantity);
        }

        $order = Order::create([
            'shippingid'        => $request->shippingid,
            'userid'            => Auth::id(),
            'username'          => $request->username,
            'address'           => $request->address,
            'phonenumber'       => $request->phonenumber,
            'senderphonenumber' => $request->senderphonenumber,
            'email'             => Auth::user()->email,
            'paymentid'         => $request->paymentid,
            'trxid'             => $request->trxid,
            'totalamount'       => Cart::getTotal(),
            'paymentmethod'     => $request->paymentmethod,
            'status'            => 'Pending',
        ]);

        $order->invoice = '#RT-' . str_pad($order->id, 8, "0", STR_PAD_LEFT);
        $order->save();

        // Send Mail
        $this->sendOrderMail($order);

        Cart::clear();

        return view('cart.thankyou');
    }

    protected function sendOrderMail($order)
    {
        $data = [
            'invoice'           => $order->invoice,
            'username'          => $order->username,
            'email'             => $order->email,
            'paymentmethod'     => $order->paymentmethod,
            'phonenumber'       => $order->phonenumber,
            'trxid'             => $order->trxid,
            'senderphonenumber' => $order->senderphonenumber,
            'address'           => $order->address,
        ];

        Mail::send('others.ordermail', $data, function ($message) use ($data) {
            $message->to($data['email'], $data['username'])
                ->subject('Order Information - RedThread')
                ->from('admin@redthread.com', 'RedThread');
        });
    }
}
