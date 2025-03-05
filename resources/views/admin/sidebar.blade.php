<nav class="sidebar">
    <div class="sidebar-header">
        <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
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
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>

            <li class="nav-item nav-category">Customer Management</li>
            <li class="nav-item">
                <a href="{{ route('admin.customer.list') }}" class="nav-link">
                    <i class="link-icon" data-feather="users"></i>
                    <span class="link-title">Customers</span>
                </a>
            </li>

            <li class="nav-item nav-category">Vendor Management</li>

            <li class="nav-item">
                <a href="{{ route('admin.vendor.request.list') }}" class="nav-link">
                    <i class="link-icon" data-feather="briefcase"></i>
                    <span class="link-title">Vendor Requests</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.vendor.list') }}" class="nav-link">
                    <i class="link-icon" data-feather="users"></i>
                    <span class="link-title">All Vendors</span>
                </a>
            </li>

            {{-- <li class="nav-item">
                <a href="{{ route('admin.vendor.active.list') }}" class="nav-link">
                    <i class="link-icon" data-feather="check-circle"></i>
                    <span class="link-title">Active Vendors</span>
                </a>
            </li> --}}

            {{-- <li class="nav-item">
                <a href="{{ route('admin.vendor.incative.list') }}" class="nav-link">
                    <i class="link-icon" data-feather="pause-circle"></i>
                    <span class="link-title">Inactive Vendors</span>
                </a>
            </li> --}}

            <li class="nav-item">
                <a href="{{ route('admin.vendor.reject.list') }}" class="nav-link">
                    <i class="link-icon" data-feather="x-circle"></i>
                    <span class="link-title">Rejected Vendors</span>
                </a>
            </li>
            <li class="nav-item nav-category">Category Management</li>


            <li class="nav-item">
                <a href="{{ route('admin.category.list') }}" class="nav-link">
                    <i class="link-icon" data-feather="layers"></i>
                    <span class="link-title">Categories</span>
                </a>
            </li>
            <li class="nav-item nav-category">Subcategory Management</li>

            <li class="nav-item">
                <a href="{{ route('admin.subcategory.list') }}" class="nav-link">
                    <i class="link-icon" data-feather="list"></i>
                    <span class="link-title">Subcategories</span>
                </a>
            </li>

            <li class="nav-item nav-category">Bids</li>
            <li class="nav-item">
                <a href="{{ route('admin.bid.list') }}" class="nav-link">
                    <i class="link-icon" data-feather="file-text"></i>
                    <span class="link-title">All Bids</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.pending.bid.list') }}" class="nav-link">
                    <i class="link-icon" data-feather="clock"></i>
                    <span class="link-title">Pending Bids</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.accept.bid.list') }}" class="nav-link">
                    <i class="link-icon" data-feather="check-circle"></i>
                    <span class="link-title">Accepted Bids</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.reject.bid.list') }}" class="nav-link">
                    <i class="link-icon" data-feather="x-circle"></i>
                    <span class="link-title">Rejected Bids</span>
                </a>
            </li>
            <li class="nav-item nav-category">Message</li>
            <li class="nav-item">
                <a href="{{ url('pages/apps/chat.html') }}" class="nav-link">
                    <i class="link-icon" data-feather="message-square"></i>
                    <span class="link-title">Chat</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
