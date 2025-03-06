@extends('admin.index')
@section('admin')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                        Category List</li>
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
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($category as $index => $cat)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $cat->image ?? '--' }}</td>
                                            <td>{{ $cat->name ?? '--' }}</td>
                                            <td>
                                                @if ($cat->status == 0)
                                                    <a href="" class="badge bg-warning text-dark">Pending</a>
                                                @elseif($cat->status == 1)
                                                    <a href="" class="badge bg-success">Active</a>
                                                @elseif($cat->status == 2)
                                                    <a href="" class="badge bg-secondary">Inactive</a>
                                                @elseif($cat->status == 3)
                                                    <a href="" class="badge bg-danger">Reject</a>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="" class="btn btn-info btn-sm">Edit</a>
                                                @if ($cat->status == 1)
                                                    <a href="" class="btn btn-warning btn-sm">Inactive</a>
                                                @elseif($cat->status == 2)
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
