@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6">
        <img src="{{ $product->image ?? 'https://via.placeholder.com/400x300' }}" class="img-fluid" alt="{{ $product->name }}">
    </div>
    <div class="col-md-6">
        <h1>{{ $product->name }}</h1>
        <p class="h3 text-primary">${{ number_format($product->price, 2) }}</p>
        <p>{{ $product->description }}</p>
        
        @if($product->category)
        <p>Category: {{ $product->category->name }}</p>
        @endif

        <form action="{{ route('cart.add', $product) }}" method="POST" class="mt-4">
            @csrf
            <button type="submit" class="btn btn-primary btn-lg">Add to Cart</button>
        </form>
    </div>
</div>
@endsection