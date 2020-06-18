<nav id="sidebarMenu" class="col-md-5 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="sidebar-sticky pt-4">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is("admin") ? 'active' : '' }}" href="{{ url('admin') }}">
                    <i class="fas fa-chart-line"></i>
                   Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    Orders
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is("admin/product") ? 'active' : '' }}" href="{{ url('admin/product') }}">
                    <span data-feather="shopping-cart"></span>
                    Products
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is("admin/category") ? 'active' : '' }}" href="{{ url('admin/category') }}">
                    <span data-feather="bar-chart-2"></span>
                    Categories
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="users"></span>
                    Customers
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="layers"></span>
                    Integrations
                </a>
            </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Saved reports</span>
            <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
                <span data-feather="plus-circle"></span>
            </a>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Current month
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Last quarter
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Social engagement
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Year-end sale
                </a>
            </li>
        </ul>
    </div>
</nav>
