<nav class="sidebar">
    <div class="sidebar-header">
        <a href="{{ route('vendor.dashboard') }}" class="sidebar-brand">
            Noble<span>UI</span>
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
            <li class="nav-item">
                <a href="{{ route('vendor.dashboard') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>

            <li class="nav-item nav-category">Customer</li>
            <li class="nav-item">
                <a href="{{ route('vendor.customer.list') }}" class="nav-link">
                    <i class="link-icon" data-feather="users"></i>
                    <span class="link-title">Customers</span>
                </a>
            </li>

            <li class="nav-item nav-category">Category</li>
            <li class="nav-item">
                <a href="{{ route('vendor.category.list') }}" class="nav-link">
                    <i class="link-icon" data-feather="layers"></i>
                    <span class="link-title">Categories</span>
                </a>
            </li>
            <li class="nav-item nav-category">Subcategory Management</li>

            <li class="nav-item">
                <a href="{{ route('vendor.subcategory.list') }}" class="nav-link">
                    <i class="link-icon" data-feather="list"></i>
                    <span class="link-title">Subcategories</span>
                </a>
            </li>

            <li class="nav-item nav-category">Bids</li>
            <li class="nav-item">
                <a href="{{ route('vendor.bid.request.list') }}" class="nav-link">
                    <i class="link-icon" data-feather="clock"></i>
                    <span class="link-title">Request Bids</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('vendor.accept.bid') }}" class="nav-link">
                    <i class="link-icon" data-feather="check-circle"></i>
                    <span class="link-title">Accepted Bids</span>
                </a>
            </li>
            <li class="nav-item nav-category">Message</li>
            <li class="nav-item">
                <a href="" class="nav-link">
                    <i class="link-icon" data-feather="message-square"></i>
                    <span class="link-title">Chat</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
