@extends('vendor.index')
@section('vendor')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('vendor.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('vendor.customer.list') }}">
                        Customer List</a></li>
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
                                                    <a href="" class="bage bage-success">Active</a>
                                                @elseif($customer->status == 2)
                                                    <a href="" class="bage bage-danger">Inactive</a>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="" class="btn btn-primary">View</a>
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
