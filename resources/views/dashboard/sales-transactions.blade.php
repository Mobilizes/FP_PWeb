<div>
    <h2 class="text-2xl font-bold text-green-700 mb-4">Transactions</h2>
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
        <!-- Content will load dynamically -->
        <div class="transaction-card bg-gray-100 p-4 rounded mb-4 relative" data-index="0">
            <div class="absolute top-4 right-4">
                <button 
                    class="status-btn bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600" 
                    onclick="showStatusModal('pending', 0)"
                >
                    Pending
                </button>
            </div>
            <p class="text-sm text-gray-500">Tanggal Checkout: 2024-12-11</p>
            <p class="text-sm text-gray-500">Toko: Toko Bagus</p>
            <div class="products mt-2">
                <p class="font-bold">Produk:</p>
                <ul class="list-none space-y-2">
                    <li class="flex justify-between">
                        <span>Produk A</span>
                        <span>2 pcs x Rp 25,000</span>
                    </li>
                    <li class="flex justify-between">
                        <span>Produk B</span>
                        <span>1 pcs x Rp 75,000</span>
                    </li>
                </ul>
            </div>
            <p class="font-bold text-lg text-green-700 mt-4">Total Harga: <span class="text-red-600">Rp 175,000</span></p>
        </div>
    </div>
</div>

<!-- Modal HTML -->
<div id="status-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center">
    <div class="bg-white p-6 rounded shadow-lg w-80">
        <h3 class="text-lg font-bold mb-4">Pilih Status</h3>
        <ul class="space-y-2">
            <li><button class="w-full text-left px-4 py-2 bg-gray-200 rounded hover:bg-gray-300" onclick="updateStatus('pending')">Pending</button></li>
            <li><button class="w-full text-left px-4 py-2 bg-gray-200 rounded hover:bg-gray-300" onclick="updateStatus('processing')">Processing</button></li>
            <li><button class="w-full text-left px-4 py-2 bg-gray-200 rounded hover:bg-gray-300" onclick="updateStatus('completed')">Completed</button></li>
            <li><button class="w-full text-left px-4 py-2 bg-gray-200 rounded hover:bg-gray-300" onclick="updateStatus('cancelled')">Cancelled</button></li>
        </ul>
        <button class="mt-4 w-full bg-red-500 text-white py-2 rounded hover:bg-red-600" onclick="closeModal()">Close</button>
    </div>
</div>

<script>
    let currentTransactionIndex = null;

    function showStatusModal(currentStatus, index) {
        console.log('Show modal for transaction index:', index); // Debug log
        currentTransactionIndex = index; // Store the index of the transaction
        const modal = document.getElementById('status-modal');
        modal.classList.remove('hidden');
        console.log('Modal is now visible'); // Debug log
        document.getElementById('product-modal').classList.remove('hidden');
    }

    function closeModal() {
        const modal = document.getElementById('status-modal');
        modal.classList.add('hidden');
        console.log('Modal is now hidden'); // Debug log
    }

    function updateStatus(newStatus) {
        if (currentTransactionIndex !== null) {
            const transactionCard = document.querySelector(`.transaction-card[data-index='${currentTransactionIndex}']`);
            const statusButton = transactionCard.querySelector('.status-btn');
            statusButton.textContent = newStatus.charAt(0).toUpperCase() + newStatus.slice(1); // Capitalize status
            statusButton.className = `status-btn px-2 py-1 rounded text-white ${getStatusButtonColor(newStatus)}`;
        }
        closeModal();
    }

    function getStatusButtonColor(status) {
        switch (status) {
            case 'pending':
                return 'bg-yellow-500 hover:bg-yellow-600';
            case 'processing':
                return 'bg-blue-500 hover:bg-blue-600';
            case 'completed':
                return 'bg-green-500 hover:bg-green-600';
            case 'cancelled':
                return 'bg-red-500 hover:bg-red-600';
            default:
                return 'bg-gray-500 hover:bg-gray-600';
        }
    }
</script>