@extends('admin.layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{ $title }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">{{ $title }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-15">
                            <div class="row">
                                <div class="col-md-6">
                                    <table>
                                        <tr>
                                            <th width="60%">Order Date </th>
                                            <td>{{ date('d M Y H:i:s',strtotime($order->created_at)) }}</td>
                                        </tr>
                                        <tr>
                                            <th width="60%">Order ID </th>
                                            <td>{{ $order->order_id }}</td>
                                        </tr>
                                        <tr>
                                            <th>Total Amount </th>
                                            <td>{{ number_format($order->total_amount,2) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Status </th>
                                            <td>{{ $order->status }}</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <table>
                                        <tr>
                                            <th width="40%">Client Name </th>
                                            <td>{{ $order->first_name . ' ' . $order->last_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Client Address </th>
                                            <td>{{ $order->street_address . ',' . $order->city . ' - ' . $order->zip_code . ',' . $order->country }}</td>
                                        </tr>
                                        <tr>
                                            <th>Client Email </th>
                                            <td>{{ $order->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>Client Phone </th>
                                            <td>{{ $order->phone }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-inline">
                                    <form action="{{ route('admin.order.change.status',[$order->id,'Processing']) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button class="btn btn-info" onclick="return confirm('Are you confirm to change status?')">
                                            Processing
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.order.change.status',[$order->id,'Shipped']) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button class="btn btn-primary" onclick="return confirm('Are you confirm to change status?')">
                                            Shipped
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.order.change.status',[$order->id,'Delivered']) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button class="btn btn-success" onclick="return confirm('Are you confirm to change status?')">
                                            Delivered
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.order.change.status',[$order->id,'Cancelled']) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button class="btn btn-danger" onclick="return confirm('Are you confirm to change status?')">
                                            Cancelled
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">List</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Product</th>
                                    <th>Product Category</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Sub Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($order->order_details as $key=>$order_detail)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $order_detail->product->name }}</td>
                                        <td>{{ $order_detail->product->category->name }}</td>
                                        <td class="text-right">{{ number_format($order_detail->price,2) }}</td>
                                        <td>{{ $order_detail->quantity }}</td>
                                        <td class="text-right">{{ number_format($order_detail->sub_total,2) }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <a href="{{ route('admin.order.list') }}" class="btn btn-warning">Back</a>
            <!-- /.row -->
        </div>
    </section>
@endsection
