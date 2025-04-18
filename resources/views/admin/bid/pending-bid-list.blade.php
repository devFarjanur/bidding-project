@extends('admin.index')
@section('admin')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.pending.bid.list') }}">
                        Pending Bid List</a></li>
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
                                    @foreach ($pendingBid as $index => $bid)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>
                                                <img src="{{ asset('upload/admin_images/' . $bid->image) }}"
                                                    alt="Category Image" class="img-fluid">
                                            </td>
                                            <th>{{ $bid->category->name ?? '--' }}</th>
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
                                                <a href="" class="btn btn-primary btn-sm">View</a>
                                                {{-- @if ($bid->status == 1)
                                                    <a href="" class="btn btn-secondary">Inactive</a>
                                                @elseif($bid->status == 2)
                                                    <a href="" class="btn btn-success">Active</a>
                                                @endif --}}
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
