<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
    <div class="logo">
        <a href="{{url('/dashboard')}}" class="simple-text logo-normal">
            FOS System
        </a>
    </div>

    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item {{Request::is('dashboard') ? 'active':''}}">
                <a class="nav-link" href="{{url('dashboard')}}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>

            <li class="nav-item {{Request::is('categories') ? 'active':''}}">
                <a class="nav-link" href="{{url('categories')}}">
                    <i class="material-icons">person</i>
                    <p>Categories</p>
                </a>
            </li>

            <li class="nav-item {{Request::is('add-category') ? 'active':''}}">
                <a class="nav-link" href="{{url('add-category')}}">
                    <i class="material-icons">person</i>
                    <p>Add Category</p>
                </a>
            </li>

            <li class="nav-item {{Request::is('products') ? 'active':''}}">
                <a class="nav-link" href="{{url('products')}}">
                    <i class="material-icons">person</i>
                    <p>Products</p>
                </a>
            </li>

            <li class="nav-item {{Request::is('add-products') ? 'active':''}}">
                <a class="nav-link" href="{{url('add-products')}}">
                    <i class="material-icons">person</i>
                    <p>Add Products</p>
                </a>
            </li>

            <!-- Uncomment these lines if you have colors and add-colors routes -->
            <!--
            <li class="nav-item {{Request::is('colors') ? 'active':''}}">
                <a class="nav-link" href="{{url('colors')}}">
                    <i class="material-icons">person</i>
                    <p>Products Colors</p>
                </a>
            </li>

            <li class="nav-item {{Request::is('add-colors') ? 'active':''}}">
                <a class="nav-link" href="{{url('add-colors')}}">
                    <i class="material-icons">person</i>
                    <p>Add Products Colors</p>
                </a>
            </li>
            -->

            <li class="nav-item {{Request::is('orders') ? 'active':''}}">
                <a class="nav-link" href="{{url('orders')}}">
                    <i class="material-icons">content_paste</i>
                    <p>Orders</p>
                </a>
            </li>

            <li class="nav-item {{Request::is('users') ? 'active':''}}">
                <a class="nav-link" href="{{url('users')}}">
                    <i class="material-icons">person</i>
                    <p>Users</p>
                </a>
            </li>

            <li class="nav-item {{Request::is('outlet_location') ? 'active':''}}">
                <a class="nav-link" href="{{url('outlet_location')}}">
                    <i class="material-icons">map</i>
                    <p>Outlet Location</p>
                </a>
            </li>

            <li class="nav-item {{Request::is('add-outlet_location') ? 'active':''}}">
                <a class="nav-link" href="{{url('add-outlet_location')}}">
                    <i class="material-icons">map</i>
                    <p>Add Outlet Location</p>
                </a>
            </li>

            <li class="nav-item {{Request::is('product_outlets') ? 'active':''}}">
                <a class="nav-link" href="{{url('product_outlets')}}">
                    <i class="material-icons">person</i>
                    <p>Products Outlet</p>
                </a>
            </li>

            <li class="nav-item {{Request::is('add-product_outlets') ? 'active':''}}">
                <a class="nav-link" href="{{url('add-product_outlets')}}">
                    <i class="material-icons">person</i>
                    <p>Add Products Outlet</p>
                </a>
            </li>

            <li class="nav-item {{Request::is('promotion') ? 'active':''}}">
                <a class="nav-link" href="{{url('promotion')}}">
                    <i class="material-icons">content_paste</i>
                    <p>Promotion Outlet</p>
                </a>
            </li>

            <li class="nav-item {{Request::is('add-promotion') ? 'active':''}}">
                <a class="nav-link" href="{{url('add-promotion')}}">
                    <i class="material-icons">content_paste</i>
                    <p>Add Promotion Outlet</p>
                </a>
            </li>
        </ul>
    </div>
</div>
