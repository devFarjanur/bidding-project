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
                        <h4 class="card-title">Bid Details</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    {{-- <th>Order Number:</th>
                                    <td>{{ $order->order_number }}</td> --}}
                                </tr>
                                <tr>
                                    {{-- <th>Customer Name:</th>
                                    <td>{{ $order->user->firstname }} {{ $order->user->lastname }}</td> --}}
                                </tr>
                                <tr>
                                    {{-- <th>Address:</th>
                                    <td>
                                        {{ $order->address->division }},
                                        {{ $order->address->city }},
                                        {{ $order->address->road_no }},
                                        {{ $order->address->house_no }}
                                    </td> --}}
                                </tr>
                                <tr>
                                    {{-- <th>Total Price:</th>
                                    <td>{{ $order->total_price }}</td> --}}
                                </tr>
                                <tr>
                                    {{-- <th>Payment Method:</th>
                                    <td>{{ $order->payment_method }}</td> --}}
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