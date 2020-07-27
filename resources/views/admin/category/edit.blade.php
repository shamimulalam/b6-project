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
                        <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Category List</a></li>
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
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Fill this form</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('category.update',$category->id) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input name="name" type="text" class="form-control" value="{{ old('name',$category->name) }}" id="name" placeholder="Enter category name">
                                    @error('name') <i class="text-danger">{{ $message }}</i> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" class="form-control" id="name" placeholder="Enter category description">{{ old('description',$category->description) }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <div class="form-check ">
                                        <input name="status" type="radio" @if(old('status',$category->status) == 'Active') checked @endif class="form-check-input" value="Active" id="active">
                                        <label for="active">Active</label>
                                    </div>
                                    <div class="form-check">
                                        <input name="status" type="radio" @if(old('status',$category->status) == 'Inactive') checked @endif class="form-check-input" value="Inactive" id="inactive">
                                        <label for="inactive">Inactive</label>
                                    </div>
                                    @error('status') <i class="text-danger">{{ $message }}</i> @enderror
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->

                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
