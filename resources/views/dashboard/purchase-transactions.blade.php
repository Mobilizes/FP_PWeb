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

<div>
    <h2 class="mb-4 text-2xl font-bold text-green-700">Transactions</h2>

    <div id="transactions-content">
        @foreach ($filteredTransactions as $index => $transaction)
            <div class="relative p-4 mb-4 bg-gray-100 rounded transaction-card" data-index="{{ $index }}">
                <div class="absolute top-4 right-4">
                    <button 
                        class="relative px-2 py-1 text-white bg-yellow-500 rounded status-btn hover:bg-yellow-600"
                        data-index="{{ $index }}"
                        data-status="{{ $transaction['status'] }}">
                        {{ ucfirst(htmlspecialchars($transaction['status'])) }}
                    </button>
                </div>
                <p class="text-sm text-gray-500">Tanggal Checkout: {{ htmlspecialchars($transaction['date']) }}</p>
                <p class="text-sm text-gray-500">Toko: {{ htmlspecialchars($transaction['store']) }}</p>
                <div class="mt-2 products">
                    <p class="font-bold">Produk:</p>
                    <ul class="space-y-2 list-none">
                        @foreach ($transaction['products'] as $product)
                            <li class="flex justify-between">
                                <span>{{ htmlspecialchars($product['name']) }}</span>
                                <span>{{ $product['quantity'] }} pcs x Rp {{ number_format($product['price'], 0, ',', '.') }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <p class="mt-4 text-lg font-bold text-green-700">
                    Total Harga: <span class="text-red-600">Rp {{ number_format($transaction['totalPrice'], 0, ',', '.') }}</span>
                </p>
            </div>
        @endforeach
    </div>
</div>

<!-- Modal -->
<div id="status-modal" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-black bg-opacity-50">
    <div class="w-full max-w-sm p-6 bg-white rounded shadow-lg">
        <h3 class="mb-4 text-xl font-bold">Update Status</h3>
        <div class="space-y-2">
            <button data-status="pending" class="w-full py-2 text-white bg-yellow-500 rounded status-option hover:bg-yellow-600">Pending</button>
            <button data-status="onprogress" class="w-full py-2 text-white bg-blue-500 rounded status-option hover:bg-blue-600">On Progress</button>
            <button data-status="finished" class="w-full py-2 text-white bg-green-500 rounded status-option hover:bg-green-600">Finished</button>
            <button data-status="failed" class="w-full py-2 text-white bg-red-500 rounded status-option hover:bg-red-600">Failed</button>
        </div>
        <div class="flex justify-end mt-4 space-x-2">
            <button id="cancel-button" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Cancel</button>
            <button id="save-button" class="px-4 py-2 text-white bg-green-500 rounded hover:bg-green-600">Save</button>
        </div>
    </div>
</div>

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