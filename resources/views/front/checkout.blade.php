@extends('front.layout.master')
@section('content')

    <div class="hero-wrap hero-bread" style="background-image: url('{{ asset('assets/front/images/bg_1.jpg') }}');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Checkout</span></p>
                    <h1 class="mb-0 bread">Checkout</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section">
        <div class="container">
            <form action="" class="billing-form" method="post">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-xl-7 ftco-animate">
                        <h3 class="mb-4 billing-heading">Billing Details</h3>
                        <div class="row align-items-end">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstname">First Name</label>
                                    <input name="first_name" value="{{ old('first_name') }}" type="text" class="form-control" placeholder="">
                                    @error('first_name') <i class="text-danger">{{ $message }}</i> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lastname">Last Name</label>
                                    <input name="last_name" value="{{ old('last_name') }}" type="text" class="form-control" placeholder="">
                                    @error('last_name') <i class="text-danger">{{ $message }}</i> @enderror
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="country">State / Country</label>
                                    <div class="select-wrap">
                                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                        <select name="country" id="" class="form-control">
                                            <option @if(old('country') == 'Bangladesh') selected @endif value="Bangladesh">Bangladesh</option>
                                            <option @if(old('country') == 'India') selected @endif value="India">India</option>
                                            <option @if(old('country') == 'Pakistan') selected @endif value="Pakistan">Pakistan</option>
                                        </select>
                                    @error('country') <i class="text-danger">{{ $message }}</i> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="streetaddress">Street Address</label>
                                    <input name="street_address" value="{{ old('street_address') }}" type="text" class="form-control" placeholder="House number and street name">
                                    @error('street_address') <i class="text-danger">{{ $message }}</i> @enderror
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="towncity">Town / City</label>
                                    <input name="city" value="{{ old('city') }}" type="text" class="form-control" placeholder="">
                                    @error('city') <i class="text-danger">{{ $message }}</i> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="postcodezip">Postcode / ZIP *</label>
                                    <input name="zip_code" value="{{ old('zip_code') }}" type="text" class="form-control" placeholder="">
                                    @error('zip_code') <i class="text-danger">{{ $message }}</i> @enderror
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input name="phone" value="{{ old('phone') }}" type="text" class="form-control" placeholder="">
                                    @error('phone') <i class="text-danger">{{ $message }}</i> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="emailaddress">Email Address</label>
                                    <input name="email" value="{{ old('email') }}" type="email" class="form-control" placeholder="">
                                    @error('email') <i class="text-danger">{{ $message }}</i> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5">
                        <div class="row mt-5 pt-3">
                            <div class="col-md-12 d-flex mb-5">
                                <div class="cart-detail cart-total p-3 p-md-4">
                                    <h3 class="billing-heading mb-4">Cart Total</h3>
                                    @php
                                        $sub_total = 0;
                                        if(session()->has('cart')){
                                            foreach (session('cart') as $cart){
                                                $sub_total += $cart['price'];
                                            }
                                        }
                                    @endphp
                                    <p class="d-flex">
                                        <span>Subtotal</span>
                                        <span>${{ number_format($sub_total,2) }}</span>
                                    </p>
                                    <p class="d-flex">
                                        <span>Delivery</span>
                                        <span>$0.00</span>
                                    </p>
                                    <p class="d-flex">
                                        <span>Discount</span>
                                        <span>$3.00</span>
                                    </p>
                                    <hr>
                                    <p class="d-flex total-price">
                                        <span>Total</span>
                                        <span>${{ number_format($sub_total,2) }}</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="cart-detail p-3 p-md-4">
                                    <h3 class="billing-heading mb-4">Payment Method</h3>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="radio">
                                                <label><input type="radio" name="payment_method" class="mr-2" value="card" @if(old('payment_method') == 'card') checked @endif> Card</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="radio">
                                                <label><input type="radio" name="payment_method" class="mr-2" value="cod" @if(old('payment_method') == 'cod') checked @endif> Cash On Delivery</label>
                                            </div>
                                        </div>
                                        @error('payment_method') <i class="text-danger">{{ $message }}</i> @enderror
                                    </div>
                                    <p><button type="submit" class="btn btn-primary py-3 px-4">Place an order</button></p>
                                </div>
                            </div>
                        </div>
                    </div> <!-- .col-md-8 -->
                </div>
            </form><!-- END -->
        </div>
    </section> <!-- .section -->


@endsection
