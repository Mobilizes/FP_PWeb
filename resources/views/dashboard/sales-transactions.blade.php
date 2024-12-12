@php
$currentTransactionType = 'sale';
@endphp

<div>
    <h2 class="mb-4 text-2xl font-bold text-green-700">Transactions</h2>

    <div id="transactions-content">
        @foreach ($allTransactions as $transaction)
            @php
                $totalPrice = 0;
                foreach ($transaction['products'] as $product) {
                    $totalPrice += $product['price'] * $product->pivot->quantity;
                }
            @endphp
            <div class="relative p-4 mb-4 bg-gray-100 rounded">
                <div class="absolute top-4 right-4">
                    <div class="relative px-2 py-1 text-white bg-yellow-500 rounded status-btn hover:bg-yellow-600">
                        {{ $transaction['status']}}
                        {{-- Pending --}}
                    </div>
                </div>
                <p class="text-sm text-gray-500">Tanggal Checkout: {{ htmlspecialchars($transaction['created_at']) }}</p>
                {{-- <p class="text-sm text-gray-500">Toko: {{ htmlspecialchars($transaction['store']) }}</p> --}}
                <div class="mt-2 products">
                    <p class="font-bold">Produk:</p>
                    <ul class="space-y-2 list-none">
                        @foreach ($transaction['products'] as $product)
                            <li class="flex justify-between">
                                <span>{{ htmlspecialchars($product['name']) }}</span>
                                <span>{{ $product->pivot->quantity }} pcs x Rp {{ number_format($product['price'], 0, ',', '.') }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <p class="mt-4 text-lg font-bold text-green-700">
                    Total Harga: <span class="text-red-600">Rp {{ number_format($totalPrice, 0, ',', '.') }}</span>
                </p>
            </div>
        @endforeach
    </div>
</div>

<script>
    document.EventListener('DOMContentLoaded', function() {
        console.log('hello world');
    });
</script>