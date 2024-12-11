<x-app-layout>
    <div>
        <h2 class="mb-4 text-2xl font-bold text-green-700">Transactions</h2>
        <div class="flex gap-4 mb-6">
            <button class="menu-btn" onclick="switchTransactionType('sale')">Transaksi Penjualan</button>
            <button class="menu-btn" onclick="switchTransactionType('purchase')">Transaksi Pembelian</button>
        </div>
        <div class="flex gap-4 mb-6">
            <div>
                <label for="sort-field" class="block text-sm font-medium text-gray-700">Sort By:</label>
                <select id="sort-field" class="w-full border-gray-300 rounded shadow-sm">
                    <option value="date">Date</option>
                    <option value="totalPrice">Total Price</option>
                </select>
            </div>
            <div>
                <label for="sort-direction" class="block text-sm font-medium text-gray-700">Direction:</label>
                <select id="sort-direction" class="w-full border-gray-300 rounded shadow-sm">
                    <option value="asc">Ascending</option>
                    <option value="desc">Descending</option>
                </select>
            </div>
        </div>
        <div id="transactions-content">
            <!-- Content will load dynamically -->
        </div>
    </div>
</x-app-layout>