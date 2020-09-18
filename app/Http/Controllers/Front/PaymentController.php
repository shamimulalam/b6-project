<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Library\SslCommerz\SslCommerzNotification;
use App\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index($order_id){
        $order = Order::with(['order_details'=>function($query){
            return $query->with(['product'=>function($query2){
                return $query2->with(['category']);
            }]);
        }])->findOrFail($order_id);

        if($order->payment_status == Order::PAYMENT_STATUS_PAID){
            return redirect()->route('front.order.status','success');
        }

        $post_data = array();
        $post_data['total_amount'] = $order->total_amount; # You cant not pay less than 10
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = uniqid(); // tran_id must be unique

        # CUSTOMER INFORMATION
        $post_data['cus_name'] = $order->first_name.' '.$order->last_name;
        $post_data['cus_email'] = $order->email;
        $post_data['cus_add1'] = $order->street_address;
        $post_data['cus_add2'] = "";
        $post_data['cus_city'] = $order->city;
        $post_data['cus_state'] = $order->country;
        $post_data['cus_postcode'] = $order->zip_code;
        $post_data['cus_country'] = $order->country;
        $post_data['cus_phone'] = $order->phone;

        # SHIPMENT INFORMATION
        $post_data['ship_name'] = $order->first_name.' '.$order->last_name;
        $post_data['ship_add1'] = $order->street_address;
        $post_data['ship_add2'] = "";
        $post_data['ship_city'] = $order->city;
        $post_data['ship_state'] = $order->country;
        $post_data['ship_postcode'] = $order->zip_code;
        $post_data['ship_phone'] = $order->phone;
        $post_data['ship_country'] = $order->country;

        $post_data['shipping_method'] = "Courier";
        $post_data['product_name'] = $order->order_details[0]->product->name;
        $post_data['product_category'] = $order->order_details[0]->product->category->name;
        $post_data['product_profile'] = "physical-goods";

        # OPTIONAL PARAMETERS
        $post_data['value_a'] = $order->id;
        $post_data['value_b'] = "ref002";
        $post_data['value_c'] = "ref003";
        $post_data['value_d'] = "ref004";

        #Before  going to initiate the payment order status need to insert or update as Pending.

        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'hosted');

    }
    public function success(Request $request){
        $order = Order::findOrFail($request->value_a);
        $order->status = Order::STATUS_PROCESSING;
        $order->payment_status = Order::PAYMENT_STATUS_PAID;
        $order->payment_method = Order::PAYMENT_METHOD_CARD;
        $order->save();
        return redirect()->route('front.order.status','success');
    }
    public function failed(Request $request){
        return redirect()->route('front.order.status','failed');
    }
    public function cancel(Request $request){
        return redirect()->route('front.order.status','cancel');
    }
}
