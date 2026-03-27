<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use App\OrderProducts;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('isadmin');
    }

    public function index($status = null)
    {
        Paginator::useBootstrap();
        $query = Order::orderBy('id', 'desc');
        
        if ($status) {
            $query->where('status', ucfirst($status));
        }

        $allorders = $query->paginate(10);
        
        $view = 'admin.orders.' . ($status ?: 'all'); // fallback or handle specific views
        // Mapping to original views
        $views = [
            'pending' => 'admin.orders.pending',
            'cancelled' => 'admin.orders.cancelled',
            'delivered' => 'admin.orders.delivered',
            'picked' => 'admin.orders.picked',
            'processing' => 'admin.orders.processing',
        ];
        
        $targetView = $views[strtolower($status)] ?? 'admin.orders.pending'; // default

        return view($targetView, [
            'allpendingorders' => $allorders,
            'allcancelledorders' => $allorders,
            'alldeliveredorders' => $allorders,
            'allpickedorders' => $allorders,
            'allprocessingorders' => $allorders,
        ])->with('no', 1);
    }

    public function show($id)
    {
        $allordersproductinfo = OrderProducts::join('orders', 'orders.paymentid', '=', 'order_products.paymentid')
            ->where('orders.id', $id)
            ->get(['order_products.*']);
            
        $allordersinfo = Order::where('id', $id)->get();
        
        return view('admin.orders.ordersinfo', compact('allordersproductinfo', 'allordersinfo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
            'paymentamount' => 'nullable|numeric|min:0',
        ]);

        $order = Order::findOrFail($id);
        
        if ($request->has('paymentamount')) {
            $order->paymentamount = $request->input('paymentamount');
        }
        
        $order->status = $request->input('status');
        $order->save();

        session()->flash('notif', 'Order Updated Successfully!');
        return redirect()->back();
    }

    public function track(Request $request)
    {
        $invoice = $request->input('track');
        $orderinfo = Order::where('invoice', 'like', '%' . $invoice . '%')->get();
        return view('admin.orders.trackresult', compact('orderinfo'));
    }
}
