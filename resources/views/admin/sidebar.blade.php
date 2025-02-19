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
</nav>
