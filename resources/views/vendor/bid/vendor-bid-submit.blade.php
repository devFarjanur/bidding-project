@extends('vendor.index')
@section('vendor')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('vendor.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('vendor.bid.request.details') }}">
                        Bid Submit</a></li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        {{-- <div class="table-responsive">
                            <table id="dataTableExample" class="table table-hover text-center">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Image</th>
                                        <th>Category</th>
                                        <th>Subcategory</th>
                                        <th>Target Price</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pendingBid as $index => $bid)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>
                                                <img src="{{ asset($bid->image) }}" alt="Product Image"
                                                    style="width: 50px; height: 50px;">
                                            </td>
                                            <th>{{ $bid->category->name ?? '--' }}</th>
                                            <th>{{ $bid->subcategory->name ?? '--' }}</th>
                                            <td>{{ $bid->target_price ?? '--' }}</td>
                                            <td>
                                                @if ($bid->status == 0)
                                                    <a href="" class="badge bg-warning text-dark">Pending</a>
                                                @elseif($bid->status == 1)
                                                    <a href="" class="badge bg-success">Active</a>
                                                @elseif($bid->status == 2)
                                                    <a href="" class="badge bg-secondary">Inactive</a>
                                                @elseif($bid->status == 3)
                                                    <a href="" class="badge bg-danger">Reject</a>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="" class="btn btn-primary">View</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
