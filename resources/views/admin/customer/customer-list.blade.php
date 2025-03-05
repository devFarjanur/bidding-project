@extends('admin.index')
@section('admin')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}" class="text-muted">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Customer List
                </li>
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
                                    @foreach ($customers as $index => $customer)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $customer->name ?? '--' }}</td>
                                            <td>{{ $customer->phone ?? '--' }}</td>
                                            <td>{{ $customer->email ?? '--' }}</td>
                                            <td>
                                                @if ($customer->role == 'customer')
                                                    {{ 'Customer' }}
                                                @endif
                                            </td>
                                            <td>
                                                @if ($customer->status == 1)
                                                    <span class="badge badge-success">Active</span>
                                                @elseif($customer->status == 2)
                                                    <span class="badge badge-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="" class="btn btn-primary btn-sm">View</a>
                                                <a href="" class="btn btn-info btn-sm">Edit</a>
                                                @if ($customer->status == 1)
                                                    <a href="" class="btn btn-warning btn-sm">Inactive</a>
                                                @elseif($customer->status == 2)
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
