<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!--my account section-->
<section class="my-account pt-6 pb-120">
    <div class="container">
        <div
            class="account-info d-flex align-items-center gap-6 p-4 p-sm-6 bg-white rounded mb-4 flex-wrap flex-lg-nowrap">
            <div class="profile-pic bg-shade rounded">
                <img src="{{ !empty($profileData->photo) ? url('upload/admin_images/' . $profileData->photo) : url('upload/no_image.jpg') }}"
                    alt="avatar" class="img-fluid" />
            </div>
            <div class="profile-inf-right">
                <h4 class="mb-2">
                    {{ $profileData->name }}
                </h4>
                <div class="info-meta d-flex align-items-center gap-2 gap-md-4 fs-xs flex-wrap">
                    <span>
                        <i class="fa-solid fa-phone me-2"></i>
                        {{ $profileData->phone }}
                    </span>
                    <span>
                        <i class="fa-solid fa-envelope me-2"></i>
                        {{ $profileData->email }}
                    </span>
                </div>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-xl-3">
                <div class="account-nav bg-white rounded py-5">
                    <h6 class="mb-4 px-4">Manage My Account</h6>
                    <ul class="nav nav-tabs border-0 d-block account-nav-menu">
                        <li>
                            <a href="#dashboard" data-bs-toggle="tab" class="active">
                                <span class="me-2">
                                    <svg width="13" height="12" viewBox="0 0 13 12" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M0.332031 1.33333V0.666667C0.332031 0.3 0.632031 0 0.998698 0H12.332C12.6987 0 12.9987 0.3 12.9987 0.666667V1.33333C12.9987 1.7 12.6987 2 12.332 2H0.998698C0.632031 2 0.332031 1.7 0.332031 1.33333ZM12.332 3.33333H0.998698C0.632031 3.33333 0.332031 3.63333 0.332031 4V8C0.332031 8.36667 0.632031 8.66667 0.998698 8.66667H12.332C12.6987 8.66667 12.9987 8.36667 12.9987 8V4C12.9987 3.63333 12.6987 3.33333 12.332 3.33333ZM0.998698 12H12.332C12.6987 12 12.9987 11.7 12.9987 11.3333V10.6667C12.9987 10.3 12.6987 10 12.332 10H0.998698C0.632031 10 0.332031 10.3 0.332031 10.6667V11.3333C0.332031 11.7 0.632031 12 0.998698 12Z"
                                            fill="#4EB529" />
                                    </svg>
                                </span>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="#bid-history" data-bs-toggle="tab">
                                <span class="me-2">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5 12C5 12.5523 4.55228 13 4 13C3.44772 13 3 12.5523 3 12C3 11.4477 3.44772 11 4 11C4.55228 11 5 11.4477 5 12Z"
                                            fill="#212B36" />
                                        <path
                                            d="M7 11.94C7 11.4209 7.42085 11 7.94 11H20.06C20.5791 11 21 11.4209 21 11.94V12.06C21 12.5791 20.5791 13 20.06 13H7.94C7.42085 13 7 12.5791 7 12.06V11.94Z"
                                            fill="#212B36" />
                                        <path
                                            d="M3 16.94C3 16.4209 3.42085 16 3.94 16H20.06C20.5791 16 21 16.4209 21 16.94V17.06C21 17.5791 20.5791 18 20.06 18H3.94C3.42085 18 3 17.5791 3 17.06V16.94Z"
                                            fill="#212B36" />
                                        <path
                                            d="M3 6.94C3 6.42085 3.42085 6 3.94 6H20.06C20.5791 6 21 6.42085 21 6.94V7.06C21 7.57915 20.5791 8 20.06 8H3.94C3.42085 8 3 7.57915 3 7.06V6.94Z"
                                            fill="#212B36" />
                                    </svg>
                                </span>
                                Bid History
                            </a>
                        </li>
                        <li>
                            <a href="#bid-track" data-bs-toggle="tab">
                                <span class="me-2">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5 12C5 12.5523 4.55228 13 4 13C3.44772 13 3 12.5523 3 12C3 11.4477 3.44772 11 4 11C4.55228 11 5 11.4477 5 12Z"
                                            fill="#212B36" />
                                        <path
                                            d="M7 11.94C7 11.4209 7.42085 11 7.94 11H20.06C20.5791 11 21 11.4209 21 11.94V12.06C21 12.5791 20.5791 13 20.06 13H7.94C7.42085 13 7 12.5791 7 12.06V11.94Z"
                                            fill="#212B36" />
                                        <path
                                            d="M3 16.94C3 16.4209 3.42085 16 3.94 16H20.06C20.5791 16 21 16.4209 21 16.94V17.06C21 17.5791 20.5791 18 20.06 18H3.94C3.42085 18 3 17.5791 3 17.06V16.94Z"
                                            fill="#212B36" />
                                        <path
                                            d="M3 6.94C3 6.42085 3.42085 6 3.94 6H20.06C20.5791 6 21 6.42085 21 6.94V7.06C21 7.57915 20.5791 8 20.06 8H3.94C3.42085 8 3 7.57915 3 7.06V6.94Z"
                                            fill="#212B36" />
                                    </svg>
                                </span>
                                Bid Track
                            </a>
                        </li>
                        <li>
                            <a href="#address-book" data-bs-toggle="tab">
                                <span class="me-2">
                                    <span class="me-2">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M3.33333 1.99341H6C6.35362 1.99341 6.69276 2.13388 6.94281 2.38393C7.19286 2.63398 7.33333 2.97312 7.33333 3.32674V5.99341C7.33333 6.34703 7.19286 6.68617 6.94281 6.93622C6.69276 7.18627 6.35362 7.32674 6 7.32674H3.33333C2.97971 7.32674 2.64057 7.18627 2.39052 6.93622C2.14048 6.68617 2 6.34703 2 5.99341V3.32674C2 2.97312 2.14048 2.63398 2.39052 2.38393C2.64057 2.13388 2.97971 1.99341 3.33333 1.99341Z"
                                                fill="#212B36" />
                                            <path
                                                d="M10 1.99341H12.6667C13.0203 1.99341 13.3594 2.13388 13.6095 2.38393C13.8595 2.63398 14 2.97312 14 3.32674V5.99341C14 6.34703 13.8595 6.68617 13.6095 6.93622C13.3594 7.18627 13.0203 7.32674 12.6667 7.32674H10C9.64638 7.32674 9.30724 7.18627 9.05719 6.93622C8.80714 6.68617 8.66667 6.34703 8.66667 5.99341V3.32674C8.66667 2.97312 8.80714 2.63398 9.05719 2.38393C9.30724 2.13388 9.64638 1.99341 10 1.99341Z"
                                                fill="#212B36" />
                                            <path
                                                d="M6 8.66008H3.33333C2.97971 8.66008 2.64057 8.80055 2.39052 9.0506C2.14048 9.30065 2 9.63979 2 9.99341V12.6601C2 13.0137 2.14048 13.3528 2.39052 13.6029C2.64057 13.8529 2.97971 13.9934 3.33333 13.9934H6C6.35362 13.9934 6.69276 13.8529 6.94281 13.6029C7.19286 13.3528 7.33333 13.0137 7.33333 12.6601V9.99341C7.33333 9.63979 7.19286 9.30065 6.94281 9.0506C6.69276 8.80055 6.35362 8.66008 6 8.66008Z"
                                                fill="#212B36" />
                                            <path
                                                d="M10 8.66008H12.6667C13.0203 8.66008 13.3594 8.80055 13.6095 9.0506C13.8595 9.30065 14 9.63979 14 9.99341V12.6601C14 13.0137 13.8595 13.3528 13.6095 13.6029C13.3594 13.8529 13.0203 13.9934 12.6667 13.9934H10C9.64638 13.9934 9.30724 13.8529 9.05719 13.6029C8.80714 13.3528 8.66667 13.0137 8.66667 12.6601V9.99341C8.66667 9.63979 8.80714 9.30065 9.05719 9.0506C9.30724 8.80055 9.64638 8.66008 10 8.66008Z"
                                                fill="#212B36" />
                                        </svg>
                                    </span>
                                </span>
                                Address Book
                            </a>
                        </li>
                        <li>
                            <a href="#update-profile" data-bs-toggle="tab">
                                <span class="me-2">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M3.33333 1.99341H6C6.35362 1.99341 6.69276 2.13388 6.94281 2.38393C7.19286 2.63398 7.33333 2.97312 7.33333 3.32674V5.99341C7.33333 6.34703 7.19286 6.68617 6.94281 6.93622C6.69276 7.18627 6.35362 7.32674 6 7.32674H3.33333C2.97971 7.32674 2.64057 7.18627 2.39052 6.93622C2.14048 6.68617 2 6.34703 2 5.99341V3.32674C2 2.97312 2.14048 2.63398 2.39052 2.38393C2.64057 2.13388 2.97971 1.99341 3.33333 1.99341Z"
                                            fill="#212B36" />
                                        <path
                                            d="M10 1.99341H12.6667C13.0203 1.99341 13.3594 2.13388 13.6095 2.38393C13.8595 2.63398 14 2.97312 14 3.32674V5.99341C14 6.34703 13.8595 6.68617 13.6095 6.93622C13.3594 7.18627 13.0203 7.32674 12.6667 7.32674H10C9.64638 7.32674 9.30724 7.18627 9.05719 6.93622C8.80714 6.68617 8.66667 6.34703 8.66667 5.99341V3.32674C8.66667 2.97312 8.80714 2.63398 9.05719 2.38393C9.30724 2.13388 9.64638 1.99341 10 1.99341Z"
                                            fill="#212B36" />
                                        <path
                                            d="M6 8.66008H3.33333C2.97971 8.66008 2.64057 8.80055 2.39052 9.0506C2.14048 9.30065 2 9.63979 2 9.99341V12.6601C2 13.0137 2.14048 13.3528 2.39052 13.6029C2.64057 13.8529 2.97971 13.9934 3.33333 13.9934H6C6.35362 13.9934 6.69276 13.8529 6.94281 13.6029C7.19286 13.3528 7.33333 13.0137 7.33333 12.6601V9.99341C7.33333 9.63979 7.19286 9.30065 6.94281 9.0506C6.69276 8.80055 6.35362 8.66008 6 8.66008Z"
                                            fill="#212B36" />
                                        <path
                                            d="M10 8.66008H12.6667C13.0203 8.66008 13.3594 8.80055 13.6095 9.0506C13.8595 9.30065 14 9.63979 14 9.99341V12.6601C14 13.0137 13.8595 13.3528 13.6095 13.6029C13.3594 13.8529 13.0203 13.9934 12.6667 13.9934H10C9.64638 13.9934 9.30724 13.8529 9.05719 13.6029C8.80714 13.3528 8.66667 13.0137 8.66667 12.6601V9.99341C8.66667 9.63979 8.80714 9.30065 9.05719 9.0506C9.30724 8.80055 9.64638 8.66008 10 8.66008Z"
                                            fill="#212B36" />
                                    </svg>
                                </span>
                                Update Profile
                            </a>
                        </li>

                        <li>
                            <form id="logout-form" action="{{ route('customer.logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                            <a href="#"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <span class="me-2">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M3.33333 1.99341H6C6.35362 1.99341 6.69276 2.13388 6.94281 2.38393C7.19286 2.63398 7.33333 2.97312 7.33333 3.32674V5.99341C7.33333 6.34703 7.19286 6.68617 6.94281 6.93622C6.69276 7.18627 6.35362 7.32674 6 7.32674H3.33333C2.97971 7.32674 2.64057 7.18627 2.39052 6.93622C2.14048 6.68617 2 6.34703 2 5.99341V3.32674C2 2.97312 2.14048 2.63398 2.39052 2.38393C2.64057 2.13388 2.97971 1.99341 3.33333 1.99341Z"
                                            fill="#212B36" />
                                        <path
                                            d="M10 1.99341H12.6667C13.0203 1.99341 13.3594 2.13388 13.6095 2.38393C13.8595 2.63398 14 2.97312 14 3.32674V5.99341C14 6.34703 13.8595 6.68617 13.6095 6.93622C13.3594 7.18627 13.0203 7.32674 12.6667 7.32674H10C9.64638 7.32674 9.30724 7.18627 9.05719 6.93622C8.80714 6.68617 8.66667 6.34703 8.66667 5.99341V3.32674C8.66667 2.97312 8.80714 2.63398 9.05719 2.38393C9.30724 2.13388 9.64638 1.99341 10 1.99341Z"
                                            fill="#212B36" />
                                        <path
                                            d="M6 8.66008H3.33333C2.97971 8.66008 2.64057 8.80055 2.39052 9.0506C2.14048 9.30065 2 9.63979 2 9.99341V12.6601C2 13.0137 2.14048 13.3528 2.39052 13.6029C2.64057 13.8529 2.97971 13.9934 3.33333 13.9934H6C6.35362 13.9934 6.69276 13.8529 6.94281 13.6029C7.19286 13.3528 7.33333 13.0137 7.33333 12.6601V9.99341C7.33333 9.63979 7.19286 9.30065 6.94281 9.0506C6.69276 8.80055 6.35362 8.66008 6 8.66008Z"
                                            fill="#212B36" />
                                        <path
                                            d="M10 8.66008H12.6667C13.0203 8.66008 13.3594 8.80055 13.6095 9.0506C13.8595 9.30065 14 9.63979 14 9.99341V12.6601C14 13.0137 13.8595 13.3528 13.6095 13.6029C13.3594 13.8529 13.0203 13.9934 12.6667 13.9934H10C9.64638 13.9934 9.30724 13.8529 9.05719 13.6029C8.80714 13.3528 8.66667 13.0137 8.66667 12.6601V9.99341C8.66667 9.63979 8.80714 9.30065 9.05719 9.0506C9.30724 8.80055 9.64638 8.66008 10 8.66008Z"
                                            fill="#212B36" />
                                    </svg>
                                </span>
                                Log out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-xl-9">
                <div class="tab-content">

                    <!-- Dashboard Tab -->
                    <div class="tab-pane fade show active" id="dashboard">
                        <div class="address-book bg-white rounded p-5">
                            <div class="row g-6">
                                <div class="col-md-12">
                                    <div class="address-book-content pe-md-4 border-right position-relative">
                                        <div class="d-flex align-items-center gap-5 mb-4">
                                            <h6 class="mb-0">Address Book</h6>
                                        </div>
                                        <p class="text-uppercase fw-medium mb-3">Shipping Address(es)</p>

                                        <!-- Display User Info once -->
                                        <div class="address">
                                            <p class="text-dark fw-bold mb-1">
                                                {{ $profileData->name }}
                                            </p>
                                            <p class="mb-0">
                                                {{ $profileData->phone }}
                                            </p>
                                        </div>

                                        <!-- Loop through all addresses and display them -->
                                        {{-- @foreach ($shippingAddresses as $address)
                                            <div class="address mt-4">
                                                <p class="text-uppercase fw-medium mb-1">Address
                                                    {{ $loop->iteration }}</p>
                                                <p class="mb-0">
                                                    {{ $address->division }}, {{ $address->city }},
                                                    Road No: {{ $address->road_no }}, House No:
                                                    {{ $address->house_no }}
                                                </p>
                                            </div>
                                        @endforeach --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Order History Tab -->
                    <div class="tab-pane fade" id="bid-history">
                        <div class="recent-orders bg-white rounded py-5">
                            <h6 class="mb-4 px-4">Bid History</h6>
                            <div class="table-responsive">
                                <table class="order-history-table table">
                                    <tr>
                                        <th>SL</th>
                                        <th>Image</th>
                                        <th>Category</th>
                                        <th>Subcategory</th>
                                        <th>Target Price</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach ($bidHistory as $index => $bid)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>
                                                <img src="{{ asset($bid->image) }}" alt="Product Image"
                                                    style="width: 50px; height: 50px;">
                                            </td>
                                            <th>{{ $bid->subcategory->category->name ?? '--' }}</th>
                                            <th>{{ $bid->subcategory->name ?? '--' }}</th>
                                            <td>{{ $bid->target_price ?? '--' }}</td>
                                            <td>
                                                @if ($bid->status == 0)
                                                    <a href="" class="badge bg-warning text-dark">Bid
                                                        Pending</a>
                                                @elseif($bid->status == 1)
                                                    <a href="" class="badge bg-warning">Bid Processing</a>
                                                @elseif($bid->status == 2)
                                                    <a href="" class="badge bg-success">Bid Compeleted</a>
                                                @elseif($bid->status == 3)
                                                    <a href="" class="badge bg-danger">Bid End</a>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="" class="btn text-white px-4 py-2"
                                                    style="background-color: #00B6A9; font-size: 16px; border-radius: 5px;">View</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Order History Tab -->
                    <div class="tab-pane fade" id="bid-track">
                        <div class="recent-orders bg-white rounded py-5">
                            <h6 class="mb-4 px-4">Recent Orders</h6>
                            <div class="table-responsive">
                                <table class="order-history-table table">
                                    <tr>
                                        <th>Bid Number#</th>
                                        <th>Image</th>
                                        <th>Category</th>
                                        <th>Subcategory</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach ($bidTrack as $index => $bid)
                                        <tr>
                                            <td>{{ $bid->bid_number }}</td>
                                            <td>
                                                <img src="{{ asset($bid->image) }}" alt="Product Image"
                                                    style="width: 50px; height: 50px;">
                                            </td>
                                            <th>{{ $bid->category->name ?? '--' }}</th>
                                            <th>{{ $bid->subcategory->name ?? '--' }}</th>
                                            <td>{{ $bid->price ?? '--' }}</td>
                                            <td>
                                                @if ($bid->status == 0)
                                                    <a href="" class="badge bg-warning text-dark">Pending</a>
                                                @elseif($bid->status == 1)
                                                    <a href="" class="badge bg-warning">Processing</a>
                                                @elseif($bid->status == 2)
                                                    <a href="" class="badge bg-success">Shipped</a>
                                                @elseif($bid->status == 3)
                                                    <a href="" class="badge bg-danger">Delivered</a>
                                                @elseif($bid->status == 4)
                                                    <a href="" class="badge bg-danger">Cancel</a>
                                                @elseif($bid->status == 5)
                                                    <a href="" class="badge bg-danger">Returned</a>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="" class="btn text-white px-4 py-2"
                                                    style="background-color: #00B6A9; font-size: 16px; border-radius: 5px;">View</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>


                    <!-- Address Book Tab -->
                    <div class="tab-pane fade" id="address-book">
                        <div class="address-book bg-white rounded p-5">
                            <div class="row g-6">
                                <div class="col-md-6">
                                    <div class="address-book-content pe-md-4 border-right position-relative">
                                        <div class="d-flex align-items-center gap-5 mb-4">
                                            <h6 class="mb-0">Address Book</h6>
                                        </div>
                                        <p class="text-uppercase fw-medium mb-3">Shipping Address(es)</p>

                                        <!-- Display User Info once -->
                                        <div class="address">
                                            <p class="text-dark fw-bold mb-1">
                                                {{ $profileData->name }}
                                            </p>
                                            <p class="mb-0">
                                                {{ $profileData->phone }}
                                            </p>
                                        </div>

                                        <!-- Loop through all addresses and display them -->
                                        {{-- @foreach ($shippingAddresses as $address)
                                            <div class="address mt-4">
                                                <p class="text-uppercase fw-medium mb-1">Address
                                                    {{ $loop->iteration }}</p>
                                                <p class="mb-0">
                                                    {{ $address->division }}, {{ $address->city }},
                                                    Road No: {{ $address->road_no }}, House No:
                                                    {{ $address->house_no }}
                                                </p>
                                            </div>
                                        @endforeach --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Update Profile Tab -->
                    <div class="tab-pane fade" id="update-profile">
                        <div class="update-profile bg-white py-5 px-4">
                            <h6 class="mb-4">Update Profile</h6>
                            <form
                                action="
                            {{-- {{ route('update.profile') }} --}}
                             "
                                method="POST" class="profile-form" enctype="multipart/form-data">
                                @csrf
                                <div class="file-upload text-center rounded-3 mb-5">
                                    <input name="photo" type="file" class="form-control" id="image"
                                        autocomplete="off">
                                    <img id="showImage" class="img-fluid" src="{{ url('upload/no_image.jpg') }}"
                                        alt="profile">
                                    <p class="text-dark fw-bold mb-2 mt-3">Drop your files here or <a href="#"
                                            class="text-primary">browse</a></p>
                                </div>
                                <div class="row g-4">
                                    <div class="col-sm-6">
                                        <div class="label-input-field">
                                            <label>Name</label>
                                            <input type="text" name="firstname" id="firstname"
                                                value="
                                                {{ $profileData->name }}
                                                 " />
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="label-input-field">
                                            <label>Phone/Mobile</label>
                                            <input type="tel" name="phone" id="phone"
                                                value="
                                                {{ $profileData->phone }}
                                                 " />
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="label-input-field">
                                            <label>Email Address</label>
                                            <input type="email" name="email" id="email"
                                                value="
                                                {{ $profileData->email }}
                                                 " />
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="label-input-field">
                                            <label>Birthday</label>
                                            <input type="date" name="birthday" id="birthday"
                                                value="
                                                {{-- {{ $profileData->birthday }} --}}
                                                 " />
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="label-input-field">
                                            <label>User Name</label>
                                            <input type="text" name="username" id="username"
                                                value="
                                                {{-- {{ $profileData->username }} --}}
                                                 " />
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mt-6">Update Profile</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!--my account section end-->

<script type="text/javascript">
    $(document).ready(function() {
        $('#image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
