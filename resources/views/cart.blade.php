@extends('layouts.main')
@section('title', 'V Cart | Page')
@section('content')
    <div class="container">
        <div class="d-flex row justify-content-start gap-3">
            @foreach ($carts as $cart)
                <div class="col-3 card" style="width: 15rem;">
                    <img src="{{ url('storage/' . $cart->product->image) }}" class="card-img-top" alt="hedset">
                    <div class="card-body">
                        <h5 class="card-title">{{ $cart->product->name }}</h5>
                        <p class="card-text">
                            <strong> Category : {{ $cart->product->category->name }}</strong><br>
                            <strong> Price : Rp.{{ number_format($cart->product->price) }}</strong> <br>
                            <strong> Quantity : {{ $cart->qty }}</strong>
                        </p>
                        <p class="card-text">{{ $cart->product->description }}</p>
                        <p class="card-text text-primary">
                            <strong> Total : Rp.{{ number_format($cart->product->price * $cart->qty) }},- </strong>
                        </p>
                        <a href="cart/{{ $cart->id }}/delete" class="btn btn-xs btn-danger"
                            onclick="return confirm('Are u Sure?');">Delete</a>
                        <a href="cart/{{ $cart->id }}/checkout" class="btn btn-xs btn-warning">Checkout</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
