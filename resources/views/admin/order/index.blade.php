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
                        <div class="card-body">
                            <form>
                                <div class="row">
                                    <div class="col-md-5">
                                        <input type="text" value="{{ request('client_information') }}" name="client_information" class="form-control" placeholder="Search by client information">
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" value="{{ request('order_id') }}" name="order_id" class="form-control" placeholder="Search by order id">
                                    </div>
                                    <div class="col-md-3">
                                        <select name="status" class="form-control">
                                            <option value="">Search by status</option>
                                            <option {{ (request('status') == \App\Order::STATUS_PENDING)?'selected':null }} value="{{ \App\Order::STATUS_PENDING }}">{{ \App\Order::STATUS_PENDING }}</option>
                                            <option {{ (request('status') == \App\Order::STATUS_PROCESSING)?'selected':null }} value="{{ \App\Order::STATUS_PROCESSING }}">{{ \App\Order::STATUS_PROCESSING }}</option>
                                            <option {{ (request('status') == \App\Order::STATUS_SHIPPED)?'selected':null }} value="{{ \App\Order::STATUS_SHIPPED }}">{{ \App\Order::STATUS_SHIPPED }}</option>
                                            <option {{ (request('status') == \App\Order::STATUS_DELIVERED)?'selected':null }} value="{{ \App\Order::STATUS_DELIVERED }}">{{ \App\Order::STATUS_DELIVERED }}</option>
                                            <option {{ (request('status') == \App\Order::STATUS_CANCELLED)?'selected':null }} value="{{ \App\Order::STATUS_CANCELLED }}">{{ \App\Order::STATUS_CANCELLED }}</option>
                                        </select>
                                    </div>
                                    <div class="col-md-1">
                                        <button class="btn btn-secondary">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">List</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <a class="btn btn-success btn-sm" href="{{ route('admin.order.export','all') }}">Export All</a>
                                    <a class="btn btn-success btn-sm" href="{{ route('admin.order.export',\App\Order::STATUS_PENDING) }}">Export Pending</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Order ID</th>
                                    <th>Client Name</th>
                                    <th>Client Address</th>
                                    <th>Client Email</th>
                                    <th>Client Phone</th>
                                    <th>Total Amount</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $key=>$order)
                                    <tr>
                                        <td>{{ $orders->firstItem() + $key }}</td>
                                        <td>{{ $order->order_id }}</td>
                                        <td>{{ $order->first_name . ' ' . $order->last_name }}</td>
                                        <td>{{ $order->street_address . ',' . $order->city . ' - ' . $order->zip_code . ',' . $order->country }}</td>
                                        <td>{{ $order->email }}</td>
                                        <td>{{ $order->phone }}</td>
                                        <td class="text-right">{{ number_format($order->total_amount,2) }}</td>
                                        <td>{{ $order->status }}</td>
                                        <td class="form-inline">
                                            <a class="btn btn-info" href="{{ route('admin.order.show',$order->id) }}">Details</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $orders->render() }}
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div>
    </section>
@endsection
