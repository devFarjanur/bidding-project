@extends('vendor.index')
@section('vendor')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('vendor.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    Bid Request List</li>
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
                                        <th>Image</th>
                                        <th>Category</th>
                                        <th>Subcategory</th>
                                        <th>Target Price</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bidRequest as $index => $bid)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>
                                                <img src="{{ asset('upload/admin_images/' . $bid->image) }}"
                                                    alt="Bid Image" class="img-fluid">
                                            </td>
                                            <th>{{ $bid->subcategory->category->name ?? '--' }}</th>
                                            <th>{{ $bid->subcategory->name ?? '--' }}</th>
                                            <td>{{ $bid->target_price ?? '--' }}</td>
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
                                                <a href="{{ route('vendor.bid.request.details', $bid->id) }}"
                                                    class="btn btn-primary">View</a>
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
