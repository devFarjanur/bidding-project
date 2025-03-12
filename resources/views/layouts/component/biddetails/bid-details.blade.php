<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<!-- Bid Request Details -->
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="bg-white shadow-sm rounded p-4 mb-4">
                    <h3 class="mb-4">Bid Request Details</h3>
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
                            <td>{{ number_format($bidRequest->target_price, 2) }} TK</td>
                        </tr>
                        <tr>
                            <th>Image:</th>
                            <td>
                                <img src="{{ asset('upload/admin_images/' . $bidRequest->image) }}" alt="Bid Image"
                                    class="img-thumbnail" style="max-width: 250px;">
                            </td>
                        </tr>
                    </table>
                </div>

                <!-- Vendor Bids Section -->
                <div class="bg-white shadow-sm rounded p-4">
                    <h3 class="mb-4">All Vendor's Bids</h3>
                    <div class="table-responsive">
                        <table class="table table-bordered text-center">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Vendor</th>
                                    <th>Bid Price (TK)</th>
                                    <th>Bid Status</th>
                                    <th>Submitted At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($getBid as $index => $bid)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $bid->vendor->user->name ?? '--' }}</td>
                                        <td>{{ number_format($bid->proposed_price, 2) }} TK</td>
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
                                            @elseif($bid->status == 4)
                                                <a href="" class="badge bg-success">Bid Accepted</a>
                                            @elseif($bid->status == 5)
                                                <a href="" class="badge bg-danger">Bid Rejected</a>
                                            @endif
                                        </td>
                                        <td>{{ $bid->created_at->format('d M, Y h:i A') }}</td>
                                        <td>

                                            @if ($bid->status == 1)
                                                <form action="{{ route('customer.accept.bid', $bid->id) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-primary">Accept</button>
                                                </form>
                                            @elseif($bid->status == 4)
                                                <a href="#" class="btn btn-success">Bid Accepted</a>
                                            @else
                                                <a href="#" class="btn btn-danger">Bid Rejected</a>
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> <!-- End Vendor Bids Section -->
            </div>
        </div>
    </div>
</section>
