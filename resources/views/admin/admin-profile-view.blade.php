@extends('admin.index')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">

      
        <div class="row profile-body">
          <!-- left wrapper start -->
          <div class="col-md-4 col-xl-4 left-wrapper">
            <div class="card  rounded" style="height: 400px;">
              <div class="card-body">
              <img class="wd-100 rounded-circle" src="{{ (!empty ($profileData->photo)) ?
              url('upload/admin_images/' . $profileData->photo) : url('upload/no_image.jpg')  
               }}" alt="profile">
                
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">Name:</label>
                  <p class="text-muted">{{ $profileData->name }}</p>
                </div>
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
                  <p class="text-muted">{{ $profileData->email }}</p>
                </div>
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone:</label>
                  <p class="text-muted">{{ $profileData->phone }}</p>
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


          <div class="col-md-8 grid-margin stretch-card">
            <div class="card" style="height: 570px;">
              <div class="card-body">

								<h6 class="card-title">Admin Profile Change</h6>

								<form method="POST" action="{{ route('admin.profile.store') }}" class="forms-sample" enctype="multipart/form-data">
                @csrf
									<div class="mb-3">
										<label for="exampleInputUsername1" class="form-label">Name</label>
										<input type="text" name="name" class="form-control" id="name" autocomplete="off">
									</div>
									<div class="mb-3">
										<label for="email" class="form-label">Email address</label>
										<input type="email" name="email" class="form-control" id="email">
									</div>
									<div class="mb-3">
										<label for="phone" class="form-label">Phone</label>
										<input type="text" name="phone" class="form-control" id="phone" autocomplete="off" >
									</div>
                  <div class="mb-3">
										<label for="photo" class="form-label">Photo</label>
										<input name="photo" type="file" class="form-control" id="image" autocomplete="off" >
                    
									</div>
                  <div class="mb-3">
                  <img id="showImage" class="wd-70 rounded-circle" src="{{ (!empty ($profileData->photo)) ?
                    url('upload/admin_images/'.$profileData->photo) : url('upload/no_image.jpg')  
                    }}" alt="profile">
									</div>
              
									<button type="submit" class="btn btn-primary me-2">Save Changes</button>
								</form>

              </div>
            </div>

        </div>

			</div>


      <script type="text/javascript">
        $(document).ready(function(){
          $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
              $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
          });
        });
      </script>


@endsection