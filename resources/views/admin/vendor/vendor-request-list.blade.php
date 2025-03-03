@extends('admin.admin-dashboard')
@section('admin')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.customer.list') }}">Customer</a></li>
                <li class="breadcrumb-item active" aria-current="page">Customer List</li>
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
                                        <th>ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customers as $index => $customer)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $customer->name ?? '--' }}</td>
                                            <td>{{ $customer->phone ?? '--' }}</td>
                                            <td>{{ $customer->email ?? '--' }}</td>
                                            <td>{{ $customer->phone ?? '--' }}</td>
                                            <td>
                                                @if ($customer->role == 'customer')
                                                    {{ 'Customer' }}
                                                @endif
                                            <td>
                                                @if ($customer->status == 1)
                                                    <a href="" class="btn btn-success">Active</a>
                                                @else
                                                    <a href="" class="btn btn-danger">Inactive</a>
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
