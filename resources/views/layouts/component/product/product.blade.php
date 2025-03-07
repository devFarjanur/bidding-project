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
                                    <div class="file-upload text-center rounded-3 mb-5">
                                        <input name="photo" type="file" class="form-control" id="image"
                                            autocomplete="off">
                                        <img id="showImage" class="img-fluid" src="{{ url('upload/no_image.jpg') }}"
                                            alt="profile">
                                        <p class="text-dark fw-bold mb-2 mt-3">Drop your files here or <a href="#"
                                                class="text-primary">browse</a></p>
                                    </div>
                                    <div class="col-12">
                                        <div class="label-input-field">
                                            <label>About Description:</label>
                                            <textarea class="form-control" placeholder="Type here" type="text" name="description" rows="5"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="label-input-field">
                                            <label>Category</label>
                                            <select class="form-control" name="category_id"
                                                aria-label="Category select">
                                                <option value="" selected disabled>Select Category
                                                </option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">
                                                        {{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="label-input-field">
                                            <label>Subcategory</label>
                                            <select class="form-control" name="subcategory_id"
                                                aria-label="Subcategory select">
                                                <option value="" selected disabled>Select Subcategory
                                                </option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">
                                                        {{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="label-input-field">
                                            <label>Price</label>
                                            <input class="form-control" type="number" name="price" id="price" placeholder="Price" />
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
