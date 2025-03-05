@extends('admin.index')
@section('admin')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.vendor.list') }}">
                        Vendor List</a></li>
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
                                    @foreach ($vendors as $index => $vendor)
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
                                                    <span class="badge badge-warning text-dark">Pending</span>
                                                @elseif($vendor->status == 1)
                                                    <span class="badge badge-success">Active</span>
                                                @elseif($vendor->status == 2)
                                                    <span class="badge badge-secondary">Inactive</span>
                                                @elseif($vendor->status == 3)
                                                    <span class="badge badge-danger">Reject</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="" class="btn btn-primary btn-sm">View</a>
                                                @if ($vendor->status == 1)
                                                    <a href="" class="btn btn-warning btn-sm">Inactive</a>
                                                @elseif($vendor->status == 2)
                                                    <a href="" class="btn btn-success btn-sm">Active</a>
                                                @endif
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
