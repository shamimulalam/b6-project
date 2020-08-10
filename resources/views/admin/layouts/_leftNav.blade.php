<!-- Brand Logo -->
<a href="index3.html" class="brand-link">
    <img src="{{ asset('assets/admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('assets/admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">Alexander Pierce</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link  @if(request()->routeIs('admin.dashboard')) active @endif">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-item has-treeview @if(request()->routeIs('category.index') || request()->routeIs('category.create') || request()->routeIs('category.edit')) menu-open @endif">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Category
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('category.index') }}" class="nav-link @if(request()->routeIs('category.index')) active @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Category List</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('category.create') }}" class="nav-link  @if(request()->routeIs('category.create')) active @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add new Category</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview @if(request()->routeIs('product.index') || request()->routeIs('product.create') || request()->routeIs('product.edit')) menu-open @endif">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Product
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('product.index') }}" class="nav-link @if(request()->routeIs('product.index')) active @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Product List</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('product.create') }}" class="nav-link  @if(request()->routeIs('product.create')) active @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add new Product</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-treeview @if(request()->routeIs('user.index') || request()->routeIs('user.create') || request()->routeIs('user.edit')) menu-open @endif">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        User
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('user.index') }}" class="nav-link @if(request()->routeIs('user.index')) active @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>User List</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('user.create') }}" class="nav-link  @if(request()->routeIs('user.create')) active @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add new User</p>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
