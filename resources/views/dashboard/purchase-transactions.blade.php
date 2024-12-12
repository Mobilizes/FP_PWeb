@php
$currentTransactionType = 'purchase';
$transactions = [
    [
        'type' => 'purchase',
        'date' => '2024-12-10',
        'store' => 'EcoStore',
        'status' => 'pending',
        'totalPrice' => 125000,
        'products' => [
            ['name' => 'Produk C', 'quantity' => 1, 'price' => 125000],
        ],
    ],
    [
        'type' => 'purchase',
        'date' => '2023-01-20',
        'store' => 'GerryStore',
        'status' => 'completed',
        'totalPrice' => 250000,
        'products' => [
            ['name' => 'Produk A', 'quantity' => 1, 'price' => 125000],
            ['name' => 'Produk B', 'quantity' => 1, 'price' => 125000],
        ],
    ],
];

$filteredTransactions = array_filter($transactions, function ($transaction) use ($currentTransactionType) {
    return isset($transaction['type']) && $transaction['type'] === $currentTransactionType;
});
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interactive Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .menu-btn {
            background: white;
            border: 2px solid #047857; 
            color: black;
            padding: 0.5rem;
            border-radius: 0.375rem; 
            transition: all 0.3s ease;
        }
        .menu-btn:hover {
            background: #047857; 
            color: white;
        }
        .menu-btn.active {
            background: #047857; 
            color: white;
        }
        .logout-btn {
            background: #dc2626; 
            color: white;
            padding: 0.5rem;
            border-radius: 0.375rem;
            transition: background 0.3s ease;
        }
        .logout-btn:hover {
            background: #b91c1c;
        }
    </style>
</head>

<body>

<div>
    <h2 class="text-2xl font-bold text-green-700 mb-4">Transactions</h2>

    <div id="transactions-content">
        @foreach ($filteredTransactions as $index => $transaction)
            <div class="transaction-card bg-gray-100 p-4 rounded mb-4 relative" data-index="{{ $index }}">
                <div class="absolute top-4 right-4">
                    <button 
                        class="status-btn bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600 relative"
                        data-index="{{ $index }}">
                        {{ ucfirst(htmlspecialchars($transaction['status'])) }}
                    </button>
                    <div class="dropdown-menu hidden absolute right-0 mt-2 w-32 bg-white border border-gray-200 rounded shadow-lg">
                        <button class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" data-status="pending">Pending</button>
                        <button class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" data-status="onprogress">On Progress</button>
                        <button class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" data-status="finished">Finished</button>
                        <button class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" data-status="failed">Failed</button>
                    </div>
                </div>
                <p class="text-sm text-gray-500">Tanggal Checkout: {{ htmlspecialchars($transaction['date']) }}</p>
                <p class="text-sm text-gray-500">Toko: {{ htmlspecialchars($transaction['store']) }}</p>
                <div class="products mt-2">
                    <p class="font-bold">Produk:</p>
                    <ul class="list-none space-y-2">
                        @foreach ($transaction['products'] as $product)
                            <li class="flex justify-between">
                                <span>{{ htmlspecialchars($product['name']) }}</span>
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

<script>
    document.querySelectorAll('.status-btn').forEach(button => {
        button.addEventListener('click', function(event) {
            event.stopPropagation();
            const dropdown = button.nextElementSibling;
            document.querySelectorAll('.dropdown-menu').forEach(menu => {
                if (menu !== dropdown) menu.classList.add('hidden');
            });
            dropdown.classList.toggle('hidden');
        });
    });

    document.addEventListener('click', () => {
        document.querySelectorAll('.dropdown-menu').forEach(menu => menu.classList.add('hidden'));
    });

    document.querySelectorAll('.dropdown-menu button').forEach(item => {
        item.addEventListener('click', function() {
            const status = item.getAttribute('data-status');
            const button = item.closest('.transaction-card').querySelector('.status-btn');
            button.textContent = status.charAt(0).toUpperCase() + status.slice(1);
        });
    });
</script>

</body>
</html>
