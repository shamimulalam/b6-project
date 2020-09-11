<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\OrderShipped;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index(Request $request){
        $data['title'] = 'Order list';
        $append = [];
        $order = new Order();
        if($request->client_information != null){
            $order = $order->where(function ($query) use ($request){
                $query->where('first_name','like','%'.$request->client_information.'%')
                    ->orWhere('last_name','like','%'.$request->client_information.'%')
                    ->orWhere('phone','like','%'.$request->client_information.'%')
                    ->orWhere('email','like','%'.$request->client_information.'%');
            });
            $append['client_information'] = $request->client_information;
        }
        if($request->order_id != null){
            $order = $order->where('order_id','like','%'.$request->order_id.'%');
            $append['order_id'] = $request->order_id;
        }
        if($request->status != null){
            $order = $order->where('status',$request->status);
            $append['status'] = $request->status;
        }
        $order = $order->orderBy('id','desc')->paginate(10);
        $data['orders'] = $order->appends($append);
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
        if($order_status==Order::STATUS_SHIPPED){
            Mail::to('admin@admin.com')->send(new OrderShipped($order));
        }
        session()->flash('message','Order status changed successfully');
        return redirect()->back();
    }

}
