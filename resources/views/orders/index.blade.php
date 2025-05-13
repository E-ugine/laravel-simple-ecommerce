@extends('layouts.app')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <h1>My Orders</h1>
    </div>
</div>

<div class="row">
    <div class="col-12">
        @if($orders->count() > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Order #</th>
                    <th>Date</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->created_at->format('M d, Y') }}</td>
                    <td>${{ number_format($order->total, 2) }}</td>
                    <td>
                        <span class="badge bg-{{ $order->status == 'completed' ? 'success' : 'warning' }}">
                            {{ ucfirst($order->status) }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('orders.show', $order) }}" class="btn btn-sm btn-primary">View</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $orders->links() }}
        @else
        <div class="alert alert-info">
            You haven't placed any orders yet. <a href="{{ route('products.index') }}">Browse our products</a>.
        </div>
        @endif
    </div>
</div>
@endsection