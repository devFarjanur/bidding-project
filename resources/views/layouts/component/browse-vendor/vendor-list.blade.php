<!--shop grid section start-->
<section class="gshop-gshop-grid pt-10">
    <div class="container">
        <div class="row g-4">
            <div class="col-xl-12">
                <div class="shop-grid">
                    <div
                        class="listing-top d-flex align-items-center justify-content-between flex-wrap gap-3 bg-white rounded-2 px-4 py-5 mb-6">
                        <p class="mb-0 fw-bold">Showing 1-12 of 45 results</p>
                    </div>
                    <div class="row g-4 justify-content-center">
                        @foreach ($products as $product)
                            <div class="col-lg-4 col-md-6 col-sm-10">
                                <a href="#">
                                    <div
                                        class="vertical-product-card rounded-2 position-relative border-0 bg-white bg-white">
                                        <div class="thumbnail position-relative text-center p-4">
                                            <img src="{{ asset('upload/admin_images/' . $product->photo) }}"
                                                alt="{{ $product->name }}" class="product-image">
                                        </div>
                                        <div class="card-content">
                                            <a href="#"
                                                class="card-title fw-bold d-block mb-2 tt-line-clamp tt-clamp-2">{{ $product->name }}</a>
                                            <div class="d-flex align-items-center flex-nowrap star-rating fs-xxs mb-2">
                                                <ul class="d-flex align-items-center me-2">
                                                    <li class="text-warning"><i class="fa-solid fa-star"></i></li>
                                                    <li class="text-warning"><i class="fa-solid fa-star"></i></li>
                                                    <li class="text-warning"><i class="fa-solid fa-star"></i></li>
                                                    <li class="text-warning"><i class="fa-solid fa-star"></i></li>
                                                    <li class="text-warning"><i class="fa-solid fa-star"></i></li>
                                                </ul>
                                                <span class="flex-shrink-0">(5.2k Reviews)</span>
                                            </div>
                                            <h6 class="price text-danger mb-4">TK. {{ $product->price }}</h6>
                                            <a href="#"
                                                class="btn btn-outline-secondary d-block btn-md add-to-cart"
                                                data-id="{{ $product->id }}" data-name="{{ $product->name }}"
                                                data-price="{{ $product->price }}"
                                                data-photo="{{ asset('upload/admin_images/' . $product->photo) }}">
                                                Add to Cart
                                            </a>

                                        </div>
                                    </div>
                                </a>

                            </div>
                        @endforeach

                    </div>
                    <ul class="template-pagination d-flex align-items-center mt-6">
                        <li><a href="#" class="active">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#"><i class="fas fa-arrow-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
