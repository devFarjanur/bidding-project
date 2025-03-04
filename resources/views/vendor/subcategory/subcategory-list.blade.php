@extends('vendor.index')
@section('vendor')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('vendor.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('vendor.subcategory.list') }}">
                        Subcategory List</a></li>
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
                                        <th>Vendor Name</th>
                                        <th>Image</th>
                                        <th>Category Name</th>
                                        <th>Subcategory Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subcategory as $index => $sub)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <th>{{ $sub->vendor->user->name ?? '--' }}</th>
                                            <td>
                                                <img src="{{ asset($sub->image) }}" alt="Product Image"
                                                    style="width: 50px; height: 50px;">
                                            </td>
                                            <td>{{ $sub->category->name ?? '--' }}</td>
                                            <td>{{ $sub->name ?? '--' }}</td>
                                            <td>
                                                @if ($sub->status == 0)
                                                    <a href="" class="badge bg-warning text-dark">Pending</a>
                                                @elseif($sub->status == 1)
                                                    <a href="" class="badge bg-success">Active</a>
                                                @elseif($sub->status == 2)
                                                    <a href="" class="badge bg-secondary">Inactive</a>
                                                @elseif($sub->status == 3)
                                                    <a href="" class="badge bg-danger">Reject</a>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="" class="btn btn-primary">Edit</a>
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
