{{-- <nav class="sidebar">
    <div class="sidebar-header">
        <a href="{{ route('vendor.dashboard') }}" class="sidebar-brand">
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
                <a href="{{ route('vendor.dashboard') }}" class="nav-link">
                    <i class="link-icon fas fa-tachometer-alt"></i>
                    <span class="link-title">Dashboard</span>
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
        <a href="{{ route('vendor.dashboard') }}" class="sidebar-brand">
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
                <a href="{{ route('vendor.dashboard') }}" class="nav-link">
                    <i class="link-icon fas fa-tachometer-alt"></i>
                    <span class="link-title">Dashboard</span>
                </a>
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
                            <a class="nav-link" href="{{ route('vendor.customer.list') }}">Customer List</a>
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
                            <a class="nav-link" href="{{ route('vendor.category.list') }}">Category List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('vendor.subcategory.list') }}">Subcategory List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('vendor.add.subcategory') }}">Add Subcategory</a>
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
                            <a class="nav-link" href="{{ route('vendor.bid.request.list') }}">Bid Requests</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('vendor.accept.bid') }}">Accepted Bids</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</nav>
