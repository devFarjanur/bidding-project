@extends('vendor.index')
@section('vendor')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('vendor.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    Bid Track</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table table-hover text-center">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Bid Number</th>
                                        <th>Customer name</th>
                                        <th>Image</th>
                                        <th>Category</th>
                                        <th>Subcategory</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bidTrack as $index => $bid)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $bid->bid_number }}</td>
                                            <td>{{ $bid->customer->name }}</td>
                                            <td>
                                                <img src="{{ asset('upload/admin_images/' . $bid->image) }}"
                                                    alt="Bid Image" class="img-fluid">
                                            </td>
                                            <th>{{ $bid->bidRequest->subcategory->category->name ?? '--' }}</th>
                                            <th>{{ $bid->bidRequest->subcategory->name ?? '--' }}</th>
                                            <td>{{ $bid->price ?? '--' }}</td>
                                            <td>
                                                @if ($bid->status == 0)
                                                    <a href="" class="badge bg-warning text-dark">Pending</a>
                                                @elseif($bid->status == 1)
                                                    <a href="" class="badge bg-warning">Processing</a>
                                                @elseif($bid->status == 2)
                                                    <a href="" class="badge bg-success">Shipped</a>
                                                @elseif($bid->status == 3)
                                                    <a href="" class="badge bg-danger">Delivered</a>
                                                @elseif($bid->status == 4)
                                                    <a href="" class="badge bg-success">Canceled</a>
                                                @elseif($bid->status == 5)
                                                    <a href="" class="badge bg-danger">Returned</a>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-primary">View</a>
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
    </div>
@endsection
