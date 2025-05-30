@extends('layouts.customer_index')

@section('layouts')

@include('layouts.component.categoryproduct.hero')

<!-- Shop grid section start -->
<section class="gshop-gshop-grid ptb-120">
    <div class="container">
        <div class="row g-4">
            <div class="col-xl-12">
                <div class="shop-grid">
                    <div
                        class="listing-top d-flex align-items-center justify-content-between flex-wrap gap-3 bg-white rounded-2 px-4 py-5 mb-6">
                        <p class="mb-0 fw-bold">Showing 1-12 of 45 results</p>
                    </div>
                </div>
                <div class="row g-4 justify-content-center">
                    @foreach ($products as $product)
                        <div class="col-lg-4 col-md-6 col-sm-10">
                            <a href="{{ route('customer.product.details', $product->id) }}">
                                <div class="vertical-product-card rounded-2 position-relative border-0 bg-white">
                                    <div class="thumbnail position-relative text-center p-4">
                                        <img src="{{ asset('upload/admin_images/' . $product->photo) }}"
                                            alt="{{ $product->name }}" class="product-image">
                                    </div>
                                    <div class="card-content">
                                        <a href="{{ route('customer.product.details', $product->id) }}"
                                            class="card-title fw-bold d-block mb-2 tt-line-clamp tt-clamp-2">{{ $product->name }}</a>
                                        <h6 class="price text-danger mb-4">TK. {{ $product->price }}</h6>
                                        @if ($product->stock > 0)
                                            <a href="#" class="btn btn-outline-secondary d-block btn-md add-to-cart"
                                                data-id="{{ $product->id }}" data-name="{{ $product->name }}"
                                                data-price="{{ $product->price }}"
                                                data-photo="{{ asset('upload/admin_images/' . $product->photo) }}"
                                                data-stock="{{ $product->stock }}">
                                                Add to Cart
                                            </a>
                                        @else
                                            <span class="text-white btn btn-danger d-block btn-md disabled" style="cursor: not-allowed;">
                                                Out of Stock
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shop grid section end -->

<script>
    document.addEventListener('DOMContentLoaded', () => {
        function renderTotalCartItems() {
            const totalItemsSpan = document.getElementById('total-items');
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            let totalQuantity = 0;

            cart.forEach(item => {
                totalQuantity += parseInt(item.quantity);
            });

            if (totalItemsSpan) {
                totalItemsSpan.textContent = totalQuantity;
            }
        }

        function addToCart(button) {
            const id = button.dataset.id;
            const name = button.dataset.name;
            const price = button.dataset.price;
            const photo = button.dataset.photo;
            const stock = parseInt(button.dataset.stock);

            if (stock <= 0) {
                alert('This item is out of stock.');
                return;
            }

            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            let product = cart.find(item => item.id == id);

            if (product) {
                product.quantity += 1;
            } else {
                cart.push({ id, name, price, photo, quantity: 1 });
            }

            localStorage.setItem('cart', JSON.stringify(cart));

            button.textContent = 'Added to Cart';
            button.style.backgroundColor = '#28a745';
            button.style.borderColor = '#28a745';
            button.style.color = '#fff';

            setTimeout(() => {
                button.textContent = 'Add to Cart';
                button.style.backgroundColor = '';
                button.style.borderColor = '';
                button.style.color = '';
            }, 2000);

            renderTotalCartItems();
        }

        document.querySelectorAll('.add-to-cart').forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault();
                addToCart(button);
            });
        });
        renderTotalCartItems();
    });
</script>

@endsection