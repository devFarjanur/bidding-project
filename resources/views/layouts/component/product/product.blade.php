<!-- Shop Grid Section Start -->
<section class="gshop-gshop-grid pt-10">
    <div class="container">
        <div class="row g-4">
            <div class="col-xl-3">
                <div class="gshop-sidebar bg-white rounded-2 overflow-hidden">
                    <div class="sidebar-widget category-widget bg-white py-5 px-4 border-top">
                        <div class="widget-title d-flex">
                            <h6 class="mb-0 flex-shrink-0">Categories</h6>
                            <span class="hr-line w-100 position-relative d-block align-self-end ms-1"></span>
                        </div>
                        <ul class="widget-nav mt-4">
                            @foreach ($categories as $category)
                                <li>
                                    <a href="
                                    {{-- {{ route('customer.category.product', $category->id) }} --}}
                                     "
                                        class="d-flex justify-content-between align-items-center">
                                        {{ $category->name }}
                                        {{-- <span class="fw-bold fs-xs total-count">{{ $category->products->count() }}</span> --}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-9">
                <div class="shop-grid">
                    <div class="row g-4 justify-content-center">
                        <div class="update-profile bg-white py-5 px-4">
                            <h6 class="mb-4">Bid request</h6>
                            <form
                                action="
                                {{-- {{ route('update.profile') }} --}}
                                 "
                                method="POST" class="profile-form" enctype="multipart/form-data">
                                @csrf
                                <div class="row g-4">
                                    <div class="col-sm-6">
                                        <div class="label-input-field">
                                            <label>First Name</label>
                                            <input type="text" name="firstname" id="firstname" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="label-input-field">
                                            <label>Last Name</label>
                                            <input type="text" name="lastname" id="lastname" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="label-input-field">
                                            <label>Phone/Mobile</label>
                                            <input type="tel" name="phone" id="phone" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="label-input-field">
                                            <label>Email Address</label>
                                            <input type="email" name="email" id="email" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="label-input-field">
                                            <label>Birthday</label>
                                            <input type="date" name="birthday" id="birthday" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="label-input-field">
                                            <label>User Name</label>
                                            <input type="text" name="username" id="username" />
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mt-6">Bid Request</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


