@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Your Cart</h2>
    @if($cartItems->isEmpty())
        <p>Your cart is empty.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach($cartItems as $item)
                    @php
                        $subtotal = $item->Qty * $item->product->Price;
                        $total += $subtotal;
                    @endphp
                    <tr>
                        <td>{{ $item->product->Title }}</td>
                        <td>{{ $item->Qty }}</td>
                        <td>Rp {{ number_format($item->product->Price, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3" class="text-end"><strong>Total:</strong></td>
                    <td><strong>Rp {{ number_format($total, 0, ',', '.') }}</strong></td>
                </tr>
            </tbody>
        </table>
    @endif
</div>
@endsection
