<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        {{-- Dashboard --}}
        <li class="nav-item {{ Request::is('admin/dashboard') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('admin/dashboard') }}">
                <i class="mdi mdi-speedometer menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        {{-- Orders --}}
        <li class="nav-item {{ Request::is('admin/orders*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('admin/orders') }}">
                <i class="mdi mdi-sale menu-icon"></i>
                <span class="menu-title">Orders</span>
            </a>
        </li>


        {{-- DROP 1 Category --}}
        <li class="nav-item {{ Request::is('/admin/category*') ? 'active' : '' }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#category"
                aria-expanded="{{ Request::is('/admin/category*') ? 'true' : 'false' }}">

                <i class="mdi mdi-view-list menu-icon"></i>
                <span class="menu-title">Category</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ Request::is('/admin/category*') ? 'show' : '' }}" id="category">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('/admin/category/create') ? 'active' : '' }}"
                            href="{{ url('/admin/category/create') }}">Add Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('/admin/category') || Request::is('/admin/category/*/edit') ? 'active' : '' }}"
                            href="{{ url('/admin/category/') }}">View Category</a>
                    </li>
                </ul>
            </div>
        </li>

        {{-- DROP 2 Products --}}
        <li class="nav-item {{ Request::is('/admin/products*') ? 'active' : '' }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#products"
                aria-expanded="{{ Request::is('/admin/products*') ? 'true' : 'false' }}">
                <i class="mdi mdi-plus-circle menu-icon"></i>
                <span class="menu-title">Products</span>
                <i class="menu-arow"></i>
            </a>

            <div class="collapse {{ Request::is('/admin/products*') ? 'show' : '' }}" id="products">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link{{ Request::is('/admin/products/create') ? 'active' : '' }}"
                            href="{{ url('admin/products/create') }}">Add Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('/admin/products') || Request::is('/admin/products/*/edit') ? 'active' : '' }}"
                            href="{{ url('admin/products') }}">View Products</a>
                    </li>
                </ul>
            </div>
        </li>

        {{-- Brands  --}}
        <li class="nav-item {{ Request::is('admin/brands') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('admin/brands') }}">
                <i class="mdi mdi-view-headline menu-icon"></i>

                <span class="menu-title">Brands</span>
            </a>
        </li>

        {{-- Colors  --}}
        <li class="nav-item {{ Request::is('admin/colors') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('admin/colors') }}">
                <i class="mdi mdi-view-headline menu-icon"></i>

                <span class="menu-title">Colors</span>
            </a>
        </li>

        {{-- DROP USERS 3 --}}
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#users" aria-expanded="" aria-controls="users">
                <i class="mdi mdi-account-multiple-plus menu-icon"></i>
                <span class="menu-title">Users</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="users">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin/users/create') }}">Add User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin/users') }}">View Users</a>
                    </li>
                </ul>
            </div>
        </li>

        {{-- ********************************************** --}}

        {{-- Home Slider  --}}
        <li class="nav-item {{ Request::is('admin/sliders') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('admin/sliders') }}">
                <i class="mdi mdi-view-carousel menu-icon"></i>
                <span class="menu-title">Home Slider</span>
            </a>
        </li>
        {{-- Site Setting  --}}
        <li class="nav-item {{ Request::is('admin/settings') ? 'active' : '' }}">
            <a class="nav-link" href="{{ url('admin/settings') }}">
                <i class="mdi mdi-settings menu-icon"></i>
                <span class="menu-title">Site Setting</span>
            </a>
        </li>

        {{-- <li class="nav-item">
            <a class="nav-link" href="pages/icons/mdi.html">
                <i class="mdi mdi-emoticon menu-icon"></i>
                <span class="menu-title">Icons</span>
            </a>
        </li> --}}


    </ul>
</nav>
