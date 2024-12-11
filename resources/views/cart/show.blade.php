<x-app-layout>
    <div class="container">
        @if(isset($cart))
            <h1>Your Current Cart</h1>
            <ul>
                @foreach($cart->products as $product)
                    <li>{{ $product->name }} - ${{ $product->price }}</li>
                @endforeach
            </ul>
            <form action="{{ route('cart.checkout', ['cart' => $cart->id]) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">Checkout</button>
            </form>
        @else
            <p>{{ $message }}</p>
        @endif
    </div>
</x-app-layout>