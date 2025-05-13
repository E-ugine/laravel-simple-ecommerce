@extends('layouts.app')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <h1>Shopping Cart</h1>
    </div>
</div>

@if(count($cartItems) > 0)
<div class="row">
    <div class="col-12">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $item)
                <tr>
                    <td>
                        <img src="{{ $item['image'] ?? 'https://via.placeholder.com/50' }}" width="50" class="me-2">
                        {{ $item['name'] }}
                    </td>
                    <td>${{ number_format($item['price'], 2) }}</td>
                    <td>
                        <form action="{{ route('cart.update', $item['product_id']) }}" method="POST" class="d-inline">
                            @csrf
                            <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="form-control d-inline" style="width: 70px;">
                        </form>
                    </td>
                    <td>${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                    <td>
                        <form action="{{ route('cart.remove', $item['product_id']) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="text-end"><strong>Total:</strong></td>
                    <td colspan="2">${{ number_format($total, 2) }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<div class="row">
    <div class="col-12 text-end">
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Continue Shopping</a>
        <a href="{{ route('checkout.index') }}" class="btn btn-primary">Proceed to Checkout</a>
    </div>
</div>
@else
<div class="row">
    <div class="col-12">
        <div class="alert alert-info">
            Your cart is empty. <a href="{{ route('products.index') }}">Browse our products</a>.
        </div>
    </div>
</div>
@endif
@endsection