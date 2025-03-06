@extends('vendor.index')
@section('vendor')
    <div class="page-content">
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('vendor.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    Bid Submit</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Bid Detaisls</h4>
                        <div class="">
                            <table class="table">
                                <tr>
                                    <th>Customer Name:</th>
                                    <td>{{ $bid->bidRequest->customer->name ?? '--' }}</td>
                                </tr>
                                <tr>
                                    <th>Description:</th>
                                    <td>{{ $bid->bidRequest->description ?? '--' }}</td>
                                </tr>
                                <tr>
                                    <th>Category:</th>
                                    <td>{{ $bid->bidRequest->subcategory->category->name ?? '--' }}</td>
                                </tr>
                                <tr>
                                    <th>Subcategory:</th>
                                    <td>{{ $bid->bidRequest->subcategory->name ?? '--' }}</td>
                                </tr>
                                <tr>
                                    {{-- <th>Order Date:</th>
                                    <td>{{ $order->created_at->format('Y-m-d') }}</td> --}}
                                </tr>
                                <tr>
                                    {{-- <th>Status:</th>
                                    <td>{{ ucfirst($order->status) }}</td> --}}
                                </tr>
                                <tr>
                                    {{-- <th>Payment Status:</th>
                                    <td>{{ ucfirst($order->payment_status) }}</td> --}}
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
