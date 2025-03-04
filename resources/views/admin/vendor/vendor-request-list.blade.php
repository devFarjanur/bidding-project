@extends('admin.index')
@section('admin')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.vendor.request.list') }}">
                        Vendor request List</a></li>
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
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($requestVendor as $index => $vendor)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $vendor->user->name ?? '--' }}</td>
                                            <td>{{ $vendor->user->phone ?? '--' }}</td>
                                            <td>{{ $vendor->user->email ?? '--' }}</td>
                                            <td>
                                                @if ($vendor->user->role == 'vendor')
                                                    {{ 'Vendor' }}
                                                @endif
                                            </td>
                                            <td>
                                                @if ($vendor->status == 0)
                                                    <a href="" class="badge bg-warning text-dark">Pending</a>
                                                @elseif($vendor->status == 1)
                                                    <a href="" class="badge bg-success">Active</a>
                                                @elseif($vendor->status == 2)
                                                    <a href="" class="badge bg-secondary">Inactive</a>
                                                @elseif($vendor->status == 3)
                                                    <a href="" class="badge bg-danger">Reject</a>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="" class="btn btn-primary">Accept</a>
                                                <a href="" class="btn btn-danger">Reject</a>
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
