@extends('front.layout.master')
@section('content')

    <div class="hero-wrap hero-bread" style="background-image: url('{{ asset('assets/front/images/bg_1.jpg') }}');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
                    <h1 class="mb-0 bread">Success</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section ftco-cart">
        <div class="container">
            <h3 class="text-center">Order details</h3>
            <div class="row">
                <div class="col-md-4">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Order ID</th>
                            <td>{{ $order->order_id }}</td>
                        </tr>
                        <tr>
                            <th>Customer Name</th>
                            <td>{{ $order->first_name ." ". $order->last_name }}</td>
                        </tr>
                        <tr>
                            <th>Phone Number</th>
                            <td>{{ $order->phone }}</td>
                        </tr>
                        <tr>
                            <th>Total Amount</th>
                            <td>${{ number_format($order->total_amount,2) }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <a href="{{ route('front.order.pay_now',$order->id) }}" class="btn btn-success btn-lg">Pay Now</a>
                </div>
            </div>
        </div>
    </section>

@endsection
