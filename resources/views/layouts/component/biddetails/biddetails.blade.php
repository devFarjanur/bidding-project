<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<!-- Shop Grid Section Start -->
<section class="gshop-gshop-grid pt-10">
    <div class="container">
        <div class="row g-4">
            <div class="col-xl-9">
                <div class="shop-grid">
                    <div class="row g-4 justify-content-center">
                        <div class="update-profile bg-white py-5 px-5">
                            <h3 class="mt-3 mb-5">Bid request Details</h3>



                            {{-- <form action="{{ route('customer.bid.request') }}" method="POST" class="profile-form"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row g-4 px-4">
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
                                            <select class="form-control" name="category_id" id="category_select">
                                                <option value="" selected disabled>Select Category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="label-input-field">
                                            <label>Subcategory</label>
                                            <select class="form-control" name="subcategory_id" id="subcategory_select">
                                                <option value="" selected disabled>Select Subcategory</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="label-input-field">
                                            <label>Price</label>
                                            <input class="form-control" type="number" name="price" id="price"
                                                placeholder="Price" />
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center mb-3">
                                    <button type="submit" class="btn btn-primary mt-5">Bid Request</button>
                                </div>
                            </form> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

