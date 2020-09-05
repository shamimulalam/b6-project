<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $data['title'] = 'Order list';
        $data['orders'] = Order::orderBy('id','desc')->paginate(10);
        return view('admin.order.index',$data);
    }
    public function show($id)
    {
        $data['title'] = 'Order details';
        $data['order'] = Order::with(['order_details' => function ($query) {
            return $query->with(['product' => function ($product) {
                return $product->with(['category']);
            }]);
        }])->findOrFail($id);
        return view('admin.order.show', $data);
    }
    public function change_status($order_id,$order_status){
        $order = Order::findOrFail($order_id);
        $order->status = $order_status;
        $order->save();
        session()->flash('message','Order status changed successfully');
        return redirect()->back();
    }

}
