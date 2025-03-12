@extends('vendor.index')
@section('vendor')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('vendor.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    Bid Submit</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Bid Detaisls</h4>
                        <div class="">
                            <table class="table">
                                <tr>
                                    <th>Customer Name:</th>
                                    <td>{{ $bidRequest->customer->name ?? '--' }}</td>
                                </tr>
                                <tr>
                                    <th>Description:</th>
                                    <td>{{ $bidRequest->description ?? '--' }}</td>
                                </tr>
                                <tr>
                                    <th>Category:</th>
                                    <td>{{ $bidRequest->subcategory->category->name ?? '--' }}</td>
                                </tr>
                                <tr>
                                    <th>Subcategory:</th>
                                    <td>{{ $bidRequest->subcategory->name ?? '--' }}</td>
                                </tr>
                                <tr>
                                    <th>Target Price:</th>
                                    <td>{{ $bidRequest->target_price }}</td>
                                </tr>
                                <tr>
                                    <th>Image:</th>
                                    <td><img src="{{ asset('upload/admin_images/' . $bidRequest->image) }}" alt="Bid Image"
                                            class="img-thumbnail" style="max-width: 250px;"></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="card-body">
                        <h4 class="card-title">Submit Bid</h4>

                        <form method="POST" action="{{ route('vendor.submit.bid', $bidRequest->id) }}"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="bid" class="form-label">Your Bid Price (TK):</label>
                                <input id="bid" class="form-control" name="proposed_price"
                                    placeholder="Enter your bid price" type="text">
                            </div>

                            <input class="btn btn-primary" type="submit" value="Submit Bid">
                        </form>
                    </div>

                    <div class="card-body">
                        <h4 class="card-title">All Vendor's Bid</h4>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table table-hover text-center">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Vendor</th>
                                        <th>Bid Price (TK)</th>
                                        <th>Bid Status</th>
                                        <th>Submitted At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bids as $index => $bid)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <th>{{ $bid->vendor->user->name ?? '--' }}</th>
                                            <th>{{ $bid->proposed_price ?? '--' }}</th>
                                            <td>
                                                @if ($bid->status == 0)
                                                    <a href="" class="badge bg-warning text-dark">Bid Pending</a>
                                                @elseif($bid->status == 1)
                                                    <a href="" class="badge bg-warning">Bid Processing</a>
                                                @elseif($bid->status == 2)
                                                    <a href="" class="badge bg-success">Bid Compeleted</a>
                                                @elseif($bid->status == 3)
                                                    <a href="" class="badge bg-danger">Bid End</a>
                                                @elseif($bid->status == 4)
                                                    <a href="" class="badge bg-success">Bid Accepted</a>
                                                @elseif($bid->status == 5)
                                                    <a href="" class="badge bg-danger">Bid Rejected</a>
                                                @endif
                                            </td>
                                            <td>
                                                {{ $bid->created_at->format('d M, Y h:i A') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
