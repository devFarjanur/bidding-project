@extends('vendor.index')
@section('vendor')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <div class="page-content">


        <div class="row profile-body">
            <!-- left wrapper start -->
            <div class="col-md-6 col-xl-6 left-wrapper">
                <div class="card rounded">
                    <div class="card-body">
                        <img class="wd-100 rounded-circle"
                            src="{{ !empty($profileData->user->profile_image) ? asset('upload/admin_images/' . $profileData->user->profile_image) : asset('upload/no_image.jpg') }}"
                            alt="profile">

                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Name:</label>
                            <p class="text-muted">{{ $profileData->user->name ?? '--' }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">BusinessName:</label>
                            <p class="text-muted">{{ $profileData->business_name ?? '--' }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
                            <p class="text-muted">{{ $profileData->user->email ?? '--' }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone:</label>
                            <p class="text-muted">{{ $profileData->user->phone ?? '--' }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Description:</label>
                            <p class="text-muted">{{ $profileData->description ?? '--' }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Location</label>
                            <p class="text-muted">{{ $profileData->location ?? '--' }}</p>
                        </div>
                        <div class="mt-3 d-flex social-links">
                            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                                <i data-feather="github"></i>
                            </a>
                            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                                <i data-feather="twitter"></i>
                            </a>
                            <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                                <i data-feather="instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Vendor Edit Profile</h6>

                        <form method="POST" action="{{ route('vendor.profile.store') }}" class="forms-sample"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputUsername1" class="form-label">Full Name</label>
                                <input type="text" name="name" class="form-control" id="name" autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputUsername1" class="form-label">Business Name</label>
                                <input type="text" name="business_name" class="form-control" id="business_name"
                                    autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" name="phone" class="form-control" id="phone" autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control" id="email">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Location</label>
                                <input type="text" name="location" class="form-control" id="location">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Description</label>
                                <input type="text" name="description" class="form-control" id="description">
                            </div>
                            <div class="mb-3">
                                <label for="photo" class="form-label">Photo</label>
                                <input name="photo" type="file" class="form-control" id="image" autocomplete="off">
                            </div>
                            <div class="mb-3">
                                <img id="showImage" class="wd-70 rounded-circle"
                                    src="{{ !empty($profileData->user->profile_image) ? asset('upload/admin_images/' . $profileData->user->profile_image) : asset('upload/no_image.jpg') }}"
                                    alt="profile">
                            </div>

                            <button type="submit" class="btn btn-primary me-2">Save Changes</button>
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
                    reader.readAsDataURL(e.target.files['0']);
                });
            });
        </script>
    @endsection
