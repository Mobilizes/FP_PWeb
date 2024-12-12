@php
$currentTransactionType = 'purchase';
$transactions = [
    [
        'date' => '2024-12-10',
        'store' => 'EcoStore',
        'status' => 'pending',
        'totalPrice' => 125000,
        'products' => [
            ['name' => 'Produk C', 'quantity' => 1, 'price' => 125000, 'image' => 'https://via.placeholder.com/50'],
        ],
    ],
    [
        'date' => '2023-01-20',
        'store' => 'GerryStore',
        'status' => 'pending',
        'totalPrice' => 250000,
        'products' => [
            ['name' => 'Produk A', 'quantity' => 1, 'price' => 125000, 'image' => 'https://via.placeholder.com/50'],
            ['name' => 'Produk B', 'quantity' => 1, 'price' => 125000, 'image' => 'https://via.placeholder.com/50'],
        ],
    ],
    [
        'date' => '2023-01-20',
        'store' => 'GerryStore',
        'status' => 'pending',
        'totalPrice' => 250000,
        'products' => [
            ['name' => 'Produk A', 'quantity' => 1, 'price' => 125000, 'image' => 'https://via.placeholder.com/50'],
            ['name' => 'Produk B', 'quantity' => 1, 'price' => 125000, 'image' => 'https://via.placeholder.com/50'],
        ],
    ],
];
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="container mx-auto p-4">
    <h2 class="text-2xl font-bold text-green-700 mb-4">Transactions</h2>

    <div id="transactions-content">
        @foreach ($transactions as $index => $transaction)
            <div class="transaction-card bg-gray-100 p-4 rounded mb-4 relative" data-index="{{ $index }}">
                <!-- Status Button -->
                <div class="absolute top-4 right-4">
                    <button 
                        class="status-btn text-white px-2 py-1 rounded relative"
                        data-index="{{ $index }}"
                        data-status="{{ $transaction['status'] }}">
                        {{ ucfirst(htmlspecialchars($transaction['status'])) }}
                    </button>
                </div>

                <!-- Transaction Details -->
                <p class="text-sm text-gray-500">Tanggal Checkout: {{ htmlspecialchars($transaction['date']) }}</p>
                <p class="text-sm text-gray-500">Toko: {{ htmlspecialchars($transaction['store']) }}</p>
                
                <!-- Products -->
                <div class="products mt-2">
                    <p class="font-bold">Produk:</p>
                    <ul class="list-none space-y-2">
                        @foreach ($transaction['products'] as $product)
                            <li class="flex items-center justify-between">
                                <div class="flex items-center space-x-2">
                                    <img src="{{ $product['image'] }}" alt="{{ htmlspecialchars($product['name']) }}" class="w-10 h-10 object-cover rounded">
                                    <span>{{ htmlspecialchars($product['name']) }}</span>
                                </div>
                                <span>{{ $product['quantity'] }} pcs x Rp {{ number_format($product['price'], 0, ',', '.') }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Total Price -->
                <p class="font-bold text-lg text-green-700 mt-4">
                    Total Harga: <span class="text-red-600">Rp {{ number_format($transaction['totalPrice'], 0, ',', '.') }}</span>
                </p>
            </div>
        @endforeach
    </div>
</div>

<!-- Modal -->
<div id="status-modal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white p-6 rounded shadow-lg max-w-sm w-full">
        <h3 class="text-xl font-bold mb-4">Update Status</h3>
        <div class="space-y-2">
            <button data-status="pending" class="status-option w-full py-2 rounded bg-yellow-500 text-white hover:bg-yellow-600">Pending</button>
            <button data-status="onprogress" class="status-option w-full py-2 rounded bg-blue-500 text-white hover:bg-blue-600">On Progress</button>
            <button data-status="finished" class="status-option w-full py-2 rounded bg-green-500 text-white hover:bg-green-600">Finished</button>
            <button data-status="failed" class="status-option w-full py-2 rounded bg-red-500 text-white hover:bg-red-600">Failed</button>
        </div>
        <div class="mt-4 flex justify-end space-x-2">
            <button id="cancel-button" class="py-2 px-4 bg-gray-300 rounded hover:bg-gray-400">Cancel</button>
            <button id="save-button" class="py-2 px-4 bg-green-500 text-white rounded hover:bg-green-600">Save</button>
        </div>
    </div>
</div>

<!-- Scripts -->
<script>
    let currentTransactionIndex = null;
    const modal = document.getElementById('status-modal');
    const saveButton = document.getElementById('save-button');
    const cancelButton = document.getElementById('cancel-button');

    const statusColors = {
        pending: 'bg-yellow-500',
        onprogress: 'bg-blue-500',
        finished: 'bg-green-500',
        failed: 'bg-red-500',
    };

    document.querySelectorAll('.status-btn').forEach(button => {
        const status = button.getAttribute('data-status');
        button.classList.add(statusColors[status]);

        button.addEventListener('click', function(event) {
            currentTransactionIndex = event.target.getAttribute('data-index');
            modal.classList.remove('hidden');
        });
    });

    document.querySelectorAll('.status-option').forEach(option => {
        option.addEventListener('click', function() {
            const selectedStatus = option.getAttribute('data-status');
            saveButton.setAttribute('data-selected-status', selectedStatus);
        });
    });

    cancelButton.addEventListener('click', () => {
        modal.classList.add('hidden');
    });

    saveButton.addEventListener('click', () => {
        const selectedStatus = saveButton.getAttribute('data-selected-status');
        if (currentTransactionIndex !== null && selectedStatus) {
            const statusButton = document.querySelector(`.transaction-card[data-index="${currentTransactionIndex}"] .status-btn`);

            // Update text and color
            statusButton.textContent = selectedStatus.charAt(0).toUpperCase() + selectedStatus.slice(1);
            Object.values(statusColors).forEach(color => statusButton.classList.remove(color));
            statusButton.classList.add(statusColors[selectedStatus]);

            modal.classList.add('hidden');
        }
    });
</script>
</body>
</html>
