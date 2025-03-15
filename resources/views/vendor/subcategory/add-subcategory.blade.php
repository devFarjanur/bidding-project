@extends('vendor.index')
@section('vendor')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('vendor.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    Subcategory List</li>
            </ol>
        </nav>


        <div class="row">

            <div class="col-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Subcategory</h4>

                        <form method="POST" action="{{ route('store.subcategory') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">Select Category</label>
                                <select class="form-control select2" id="" name="category_id" required>
                                    <option value="">--Select--</option>
                                    @foreach ($categories as $cat)
                                        <option value="{{ $cat->id }}" data-name="{{ $cat->name }}">
                                            {{ $cat->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="category" class="form-label">Subcategory Name</label>
                                <input id="category" class="form-control" name="name" type="text">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Image</label>
                                <input name="image" type="file" class="form-control" id="image" autocomplete="off">
                            </div>

                            <div class="mb-3">
                                <img id="showImage" class="wd-150 rounded" height="150px"
                                    src="{{ asset('upload/no_image.jpg') }}" alt="profile">
                            </div>

                            <input class="btn btn-primary" type="submit" value="Add Subcategory">
                        </form>


                    </div>
                </div>
            </div>

        </div>



        <script type="text/javascript">
            $(document).ready(function() {
                $('#image').change(function(e) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#showImage').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(e.target.files[0]);
                });
            });
        </script>

    </div>
@endsection
