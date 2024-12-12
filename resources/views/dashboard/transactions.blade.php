@php
$currentTransactionType = 'sale';
$transactions = [
    [
        'type' => 'sale',
        'date' => '2024-12-11',
        'store' => 'Toko Bagus',
        'status' => 'pending',
        'totalPrice' => 175000,
        'products' => [
            ['name' => 'Produk A', 'quantity' => 2, 'price' => 25000],
            ['name' => 'Produk B', 'quantity' => 1, 'price' => 75000],
        ],
    ],
    [
        'type' => 'purchase',
        'date' => '2024-12-10',
        'store' => 'EcoStore',
        'status' => 'completed',
        'totalPrice' => 125000,
        'products' => [
            ['name' => 'Produk C', 'quantity' => 1, 'price' => 125000],
        ],
    ],
    // Tambahkan transaksi lain jika diperlukan
];
@endphp

<div>
    <h2 class="text-2xl font-bold text-green-700 mb-4">Transactions</h2>

    <div class="flex gap-4 mb-6">
        <button class="menu-btn" onclick="window.location.href='?type=sale'">Transaksi Penjualan</button>
        <button class="menu-btn" onclick="window.location.href='?type=purchase'">Transaksi Pembelian</button>
    </div>

    <div class="flex gap-4 mb-6">
        <div>
            <label for="sort-field" class="block text-sm font-medium text-gray-700">Sort By:</label>
            <select id="sort-field" class="w-full rounded border-gray-300 shadow-sm">
                <option value="date">Date</option>
                <option value="totalPrice">Total Price</option>
            </select>
        </div>
        <div>
            <label for="sort-direction" class="block text-sm font-medium text-gray-700">Direction:</label>
            <select id="sort-direction" class="w-full rounded border-gray-300 shadow-sm">
                <option value="asc">Ascending</option>
                <option value="desc">Descending</option>
            </select>
        </div>
    </div>

    <div id="transactions-content">
        @php
            $filteredTransactions = array_filter($transactions, function ($transaction) use ($currentTransactionType) {
                return $transaction['type'] === $currentTransactionType;
            });
        @endphp

        @foreach ($filteredTransactions as $index => $transaction)
            <div class="transaction-card bg-gray-100 p-4 rounded mb-4 relative" data-index="{{ $index }}">
                <div class="absolute top-4 right-4">
                    <button 
                        class="status-btn bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600">
                        {{ ucfirst($transaction['status']) }}
                    </button>
                </div>
                <p class="text-sm text-gray-500">Tanggal Checkout: {{ $transaction['date'] }}</p>
                <p class="text-sm text-gray-500">Toko: {{ $transaction['store'] }}</p>
                <div class="products mt-2">
                    <p class="font-bold">Produk:</p>
                    <ul class="list-none space-y-2">
                        @foreach ($transaction['products'] as $product)
                            <li class="flex justify-between">
                                <span>{{ $product['name'] }}</span>
                                <span>{{ $product['quantity'] }} pcs x Rp {{ number_format($product['price'], 0, ',', '.') }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <p class="font-bold text-lg text-green-700 mt-4">
                    Total Harga: <span class="text-red-600">Rp {{ number_format($transaction['totalPrice'], 0, ',', '.') }}</span>
                </p>
            </div>
        @endforeach
    </div>
</div>
