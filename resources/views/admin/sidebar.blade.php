{{-- <nav class="sidebar">
    <div class="sidebar-header">
        <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
            Bidding<span>Site</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>

            <li class="nav-item mt-1">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <i class="link-icon fas fa-tachometer-alt"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>

            <li class="nav-item mt-1">
                <a href="" class="nav-link">
                    <i class="link-icon fas fa-cogs"></i>
                    <span class="link-title">Vendors</span>
                </a>
            </li>

            <li class="nav-item mt-1">
                <a href="" class="nav-link">
                    <i class="link-icon fas fa-users"></i>
                    <span class="link-title">Customers</span>
                </a>
            </li>

        </ul>
    </div>
</nav> --}}



<nav class="sidebar">
    <div class="sidebar-header">
        <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
            Bidding<span>Site</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>

            <li class="nav-item mt-1">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <i class="link-icon fas fa-tachometer-alt"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>

            <li class="nav-item mt-1">
                <a class="nav-link" data-toggle="collapse" href="#vendors" role="button" aria-expanded="false"
                    aria-controls="vendors">
                    <i class="link-icon fas fa-cogs"></i>
                    <span class="link-title">Vendors</span>
                    <i class="fas fa-chevron-down float-right"></i>
                </a>
                <div class="collapse" id="vendors">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.vendor.request.list') }}">Vendor Requests</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.vendor.list') }}">All Vendors</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.vendor.active.list') }}">Active Vendors</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.vendor.incative.list') }}">Inactive Vendors</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.vendor.reject.list') }}">Rejected Vendors</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item mt-1">
                <a class="nav-link" data-toggle="collapse" href="#customers" role="button" aria-expanded="false"
                    aria-controls="customers">
                    <i class="link-icon fas fa-users"></i>
                    <span class="link-title">Customers</span>
                    <i class="fas fa-chevron-down float-right"></i>
                </a>
                <div class="collapse" id="customers">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.customer.list') }}">Customer List</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item mt-1">
                <a class="nav-link" data-toggle="collapse" href="#categories" role="button" aria-expanded="false"
                    aria-controls="categories">
                    <i class="link-icon fas fa-list"></i>
                    <span class="link-title">Categories</span>
                    <i class="fas fa-chevron-down float-right"></i>
                </a>
                <div class="collapse" id="categories">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.category.list') }}">Category List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.subcategory.list') }}">Subcategory List</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item mt-1">
                <a class="nav-link" data-toggle="collapse" href="#bids" role="button" aria-expanded="false"
                    aria-controls="bids">
                    <i class="link-icon fas fa-gavel"></i>
                    <span class="link-title">Bids</span>
                    <i class="fas fa-chevron-down float-right"></i>
                </a>
                <div class="collapse" id="bids">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.bid.list') }}">All Bids</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.pending.bid.list') }}">Pending Bids</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.accept.bid.list') }}">Accepted Bids</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.reject.bid.list') }}">Rejected Bids</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>
