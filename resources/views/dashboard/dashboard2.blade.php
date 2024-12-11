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
<body class="bg-green-50 text-gray-800">

    <!-- Header -->
    <header class="bg-green-700 text-white py-4">
        <div class="container mx-auto flex justify-between px-4 items-center">
            <h1 class="text-xl font-bold">ecoswap Dashboard</h1>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto py-8 flex gap-4">
        <!-- Menu Section -->
        <section class="bg-white basis-1/5 rounded shadow-lg p-6">
            <div class="flex items-center gap-4 mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                    <path fill="#000" d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10Zm3-12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 7a7.489 7.489 0 0 1 6-3 7.489 7.489 0 0 1 6 3 7.489 7.489 0 0 1-6 3 7.489 7.489 0 0 1-6-3Z"/>
                </svg>
                <div>
                    <p><strong>Gerry</strong></p>
                    <p>gerry@gmail.com</p>
                </div>
            </div>
            <div class="flex flex-col gap-2">
                <button class="menu-btn" data-target="profile">Profile</button>
                <button class="menu-btn" data-target="product-sale">Product For Sale</button>
                {{-- <button class="menu-btn" data-target="product-buy">Product Buy</button> --}}
                <button class="menu-btn" data-target="transactions">Transaction</button>
                <button class="logout-btn">Logout</button>
            </div>
        </section>

        <!-- Dynamic Content Section -->
        <section id="main-content" class="bg-white flex-1 rounded shadow-lg p-6">
            <h2 class="text-2xl font-bold text-green-700 mb-4">Welcome to ecoswap Dashboard</h2>
            <p>Select a menu to see details.</p>
        </section>
    </main>

    <!-- Modal -->
    <div id="modal-container" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
        <div class="modal-content bg-white rounded shadow-lg p-6 w-96"></div>
    </div>

    <footer class="bg-green-700 text-white py-4 text-center">
        <p>&copy; 2024 ecoswap. All rights reserved.</p>
    </footer>

    <script>
        const mainContent = document.getElementById('main-content');
        const modalContainer = document.getElementById('modal-container');
        const modalContent = modalContainer.querySelector('.modal-content');

          // ============== TRANSACTION START ==============
          let currentTransactionType = "sale";

const loadTransactionsSection = () => {
    const transactionsContent = document.getElementById("main-content");
    transactionsContent.innerHTML = `
        <div>
            <h2 class="text-2xl font-bold text-green-700 mb-4">Transactions</h2>
            <div class="flex gap-4 mb-6">
                <button class="menu-btn" onclick="switchTransactionType('sale')">Transaksi Penjualan</button>
                <button class="menu-btn" onclick="switchTransactionType('purchase')">Transaksi Pembelian</button>
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
                <!-- Content will load dynamically -->
            </div>
        </div>
    `;

    document.getElementById("sort-field").addEventListener("change", () => renderTransactions(currentTransactionType));
    document.getElementById("sort-direction").addEventListener("change", () => renderTransactions(currentTransactionType));

    renderTransactions(currentTransactionType);
};

const switchTransactionType = (type) => {
    currentTransactionType = type; 
    renderTransactions(type);
};

const renderTransactions = (type = "sale") => {
    const transactionsContent = document.getElementById("transactions-content");

    const transactions = [
        {
            type: "sale",
            date: "2024-12-11",
            store: "Toko Bagus",
            status: "pending",
            totalPrice: 175000,
            products: [
                { name: "Produk A", quantity: 2, price: 25000 },
                { name: "Produk B", quantity: 1, price: 75000 },
            ],
        },
        {
            type: "sale",
            date: "2024-11-11",
            store: "Toko Bagus",
            status: "pending",
            totalPrice: 175000,
            products: [
                { name: "Produk A", quantity: 2, price: 25000 },
                { name: "Produk B", quantity: 1, price: 75000 },
            ],
        },
        {
            type: "purchase",
            date: "2024-12-10",
            store: "EcoStore",
            status: "completed",
            totalPrice: 125000,
            products: [
                { name: "Produk C", quantity: 1, price: 125000 },
            ],
        },
        {
            type: "purchase",
            date: "2024-12-10",
            store: "EcoStore",
            status: "completed",
            totalPrice: 125000,
            products: [
                { name: "Produk C", quantity: 1, price: 125000 },
            ],
        },
    ];

    let filteredTransactions = transactions.filter((t) => t.type === type);

    const sortField = document.getElementById("sort-field").value || "date";
    const sortDirection = document.getElementById("sort-direction").value || "asc";

    filteredTransactions.sort((a, b) => {
        if (sortDirection === "asc") {
            return a[sortField] > b[sortField] ? 1 : -1;
        } else {
            return a[sortField] < b[sortField] ? 1 : -1;
        }
    });

    transactionsContent.innerHTML = filteredTransactions
        .map((transaction, index) => renderTransactionCard(transaction, index))
        .join("");
};

const renderTransactionCard = (transaction, index) => {
    return `
        <div class="transaction-card bg-gray-100 p-4 rounded mb-4 relative" data-index="${index}">
            <div class="absolute top-4 right-4">
                <button 
                    class="status-btn bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600" 
                    onclick="showStatusModal('${transaction.status}', ${index})"
                >
                    ${transaction.status.charAt(0).toUpperCase() + transaction.status.slice(1)}
                </button>
            </div>
            <p class="text-sm text-gray-500">Tanggal Checkout: ${transaction.date}</p>
            <p class="text-sm text-gray-500">Toko: ${transaction.store}</p>
            <div class="products mt-2">
                <p class="font-bold">Produk:</p>
                <ul class="list-none space-y-2">
                    ${transaction.products
                        .map(
                            (product) => `
                        <li class="flex justify-between">
                            <span>${product.name}</span>
                            <span>${product.quantity} pcs x Rp ${product.price.toLocaleString()}</span>
                        </li>
                    `
                        )
                        .join("")}
                </ul>
            </div>
            <p class="font-bold text-lg text-green-700 mt-4">Total Harga: <span class="text-red-600">Rp ${transaction.totalPrice.toLocaleString()}</span></p>
        </div>
    `;
};

const showStatusModal = (currentStatus, transactionIndex) => {
    const statusColors = {
        pending: 'bg-yellow-500',
        inprogress: 'bg-blue-500',
        failed: 'bg-red-500',
        completed: 'bg-green-500',
    };

    const statuses = ["pending", "inprogress", "failed", "completed"];
    modalContent.innerHTML = `
        <h3 class="text-xl font-bold text-green-700 mb-4">Ubah Status</h3>
        <div class="space-y-2">
            ${statuses.map(
                (status) => `
                    <button 
                        class="status-btn ${statusColors[status]} text-white px-4 py-2 rounded w-full hover:opacity-90" 
                        onclick="updateStatus('${status}', ${transactionIndex})"
                    >
                        ${status.charAt(0).toUpperCase() + status.slice(1)}
                    </button>
                `
            ).join('')}
        </div>
        <div class="flex justify-end gap-4 mt-4">
            <button class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600" onclick="closeModal()">Cancel</button>
        </div>
    `;
    modalContainer.classList.remove('hidden');
};

const updateStatus = (newStatus, transactionIndex) => {
    const statusColors = {
        pending: 'bg-yellow-500',
        inprogress: 'bg-blue-500',
        failed: 'bg-red-500',
        completed: 'bg-green-500',
    };
    // Cari card transaksi berdasarkan data-index
    const transactionCard = document.querySelector(`.transaction-card[data-index="${transactionIndex}"]`);
    if (transactionCard) {
        const statusButton = transactionCard.querySelector('.status-btn');
        statusButton.textContent = newStatus.charAt(0).toUpperCase() + newStatus.slice(1);
        statusButton.className = `status-btn ${statusColors[newStatus]} text-white px-2 py-1 rounded hover:opacity-90`;
    }
    closeModal();
};


       
          // ============== TRANSACTION END ==============


        // ============== PROFILE ==============
        const loadProfileSection = () => {
            mainContent.innerHTML = `
                <h2 class="text-2xl font-bold text-green-700 mb-4">User Profile</h2>
                <form id="profile-form" class="space-y-4">
                    <div><label class="block font-bold mb-2">Name</label><input type="text" value="Gerry" class="w-full border rounded p-2"></div>
                    <div><label class="block font-bold mb-2">Email</label><input type="email" value="gerry@gmail.com" class="w-full border rounded p-2"></div>
                    <div><label class="block font-bold mb-2">Phone</label><input type="tel" value="+62 812 3456 7890" class="w-full border rounded p-2"></div>
                    <div><label class="block font-bold mb-2">Balance</label><input type="text" value="Rp 1,500,000" class="w-full border rounded p-2"></div>
                    <div><label class="block font-bold mb-2">Address</label><input type="text" value="123 Green Street, EcoCity" class="w-full border rounded p-2"></div>
                    <button type="button" class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800 mt-4" onclick="showModal('Save Profile Changes?')">Update Profile</button>
                </form>
            `;
        };

          // ============== SALE ==============
          <?php
$products = [
    ["id" => 1, "name" => "Kursi Kayu Bekas", "price" => 50000, "image" => "https://via.placeholder.com/150", "description" => "Kursi kayu bekas dengan kondisi baik.", "stock" => 10],
    ["id" => 2, "name" => "Laptop Second", "price" => 2000000, "image" => "https://via.placeholder.com/150", "description" => "Laptop second dengan spesifikasi mumpuni.", "stock" => 5],
    ["id" => 3, "name" => "Sepeda Bekas", "price" => 800000, "image" => "https://via.placeholder.com/150", "description" => "Sepeda bekas dengan performa tinggi.", "stock" => 7],
    ["id" => 4, "name" => "Panci Stainless", "price" => 75000, "image" => "https://via.placeholder.com/150", "description" => "Panci stainless dengan daya tahan tinggi.", "stock" => 20],
];
?>
        const loadProductSaleSection = () => {
            mainContent.innerHTML = `
                <h2 class="text-2xl font-bold text-green-700 mb-4">Products For Sale</h2>
                <p>List of products currently on sale.</p>
                <button class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800 mt-4" onclick="showModal('Upload Product', getUploadProductForm())">Upload Product</button>
                
                 <div id="products-grid" class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php foreach ($products as $product): ?>
                <div
                    class="bg-white rounded shadow p-4 product-card"
                    data-name="<?= htmlspecialchars($product['name']) ?>"
                    onclick="openModal(<?= htmlspecialchars(json_encode($product), ENT_QUOTES, 'UTF-8') ?>)"
                >
                    <img src="<?= $product['image'] ?>" alt="<?= htmlspecialchars($product['name']) ?>" class="mx-auto mb-4">
                    <h3 class="text-lg font-bold"><?= htmlspecialchars($product['name']) ?></h3>
                    <p class="text-gray-600">Rp <?= number_format($product['price'], 0, ',', '.') ?></p>
                </div>
            <?php endforeach; ?>
        </div>
            `;
        };

          // ============== BUY ==============
        const loadProductBuySection = () => {
            mainContent.innerHTML = `
                <h2 class="text-2xl font-bold text-green-700 mb-4">Products Being Delivered</h2>
                <p>Track your purchases here.</p>
            `;
        };

        const menuButtons = document.querySelectorAll('.menu-btn');
        menuButtons.forEach(button => {
            button.addEventListener('click', () => {
                menuButtons.forEach(btn => btn.classList.remove('active'));
                button.classList.add('active');
                const target = button.dataset.target;
                if (target === 'profile') loadProfileSection();
                else if (target === 'product-sale') loadProductSaleSection();
                else if (target === 'product-buy') loadProductBuySection();
                else if (target === 'transactions') loadTransactionsSection();
            });
        });

        function showModal(title, content = '') {
            modalContent.innerHTML = `
                <h3 class="text-xl font-bold text-green-700 mb-4">${title}</h3>
                ${content}
                <div class="flex justify-end gap-4 mt-4">
                    <button class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700" onclick="closeModal()">Cancel</button>
                    <button class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800">Confirm</button>
                </div>
            `;
            modalContainer.classList.remove('hidden');
        }

        function closeModal() {
            modalContainer.classList.add('hidden');
        }

        function getUploadProductForm() {
            return `
                <form class="space-y-4">
                    <div><label class="block font-bold mb-2">Product Name</label><input type="text" class="w-full border rounded p-2" required></div>
                    <div><label class="block font-bold mb-2">Description</label><textarea class="w-full border rounded p-2" rows="3" required></textarea></div>
                    <div><label class="block font-bold mb-2">Price</label><input type="number" class="w-full border rounded p-2" required></div>
                    <div><label class="block font-bold mb-2">Stock</label><input type="number" class="w-full border rounded p-2" required></div>
                    <div><label class="block font-bold mb-2">Upload Image</label><input type="file" class="w-full border rounded p-2" accept="image/*" required></div>
                </form>
            `;
        }
    </script>
</body>
</html>