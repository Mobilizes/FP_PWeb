<?php
// Data produk (simulasi database)
$products = [
    ["id" => 1, "name" => "Kursi Kayu Bekas", "price" => 50000, "image" => "https://via.placeholder.com/150", "description" => "Kursi kayu bekas dengan kondisi baik.", "stock" => 10],
    ["id" => 2, "name" => "Laptop Second", "price" => 2000000, "image" => "https://via.placeholder.com/150", "description" => "Laptop second dengan spesifikasi mumpuni.", "stock" => 5],
    ["id" => 3, "name" => "Sepeda Bekas", "price" => 800000, "image" => "https://via.placeholder.com/150", "description" => "Sepeda bekas dengan performa tinggi.", "stock" => 7],
    ["id" => 4, "name" => "Panci Stainless", "price" => 75000, "image" => "https://via.placeholder.com/150", "description" => "Panci stainless dengan daya tahan tinggi.", "stock" => 20],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Products</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-50 text-gray-800 relative">
    <header class="bg-green-700 text-white py-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">ecoswap</h1>
            <a href="index.php" class="hover:text-green-300">Home</a>
        </div>
    </header>

    <main class="container mx-auto py-8">
        <h2 class="text-3xl font-bold text-green-700 text-center mb-6">Our Products</h2>

        <!-- Search Bar -->
        <div class="mb-6 flex justify-center">
            <input
                type="text"
                id="search-input"
                placeholder="Cari produk..."
                class="px-4 py-2 border rounded w-1/2"
                oninput="filterProducts()"
            >
        </div>

        <!-- Products Grid -->
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
    </main>

    <!-- Cart Icon -->
    <div id="cart-icon" class="fixed bottom-4 right-4 bg-green-700 text-white p-4 rounded-full shadow-lg flex items-center justify-center cursor-pointer hidden" onclick="goToCart()">
        <span id="cart-count" class="absolute top-0 right-0 bg-red-600 text-xs font-bold w-5 h-5 flex items-center justify-center rounded-full -mt-2 -mr-2"></span>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-4 8h18M9 21a2 2 0 11-4 0 2 2 0 014 0zm10 0a2 2 0 11-4 0 2 2 0 014 0z" />
        </svg>
    </div>

    <!-- Modal -->
    <div id="product-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded shadow-lg w-11/12 md:w-1/2">
            <div class="flex justify-between items-center border-b p-4">
                <h3 id="modal-title" class="text-xl font-bold"></h3>
                <button onclick="closeModal()" class="text-gray-600 hover:text-gray-900">&times;</button>
            </div>
            <div class="p-4">
                <img id="modal-image" src="" alt="Product Image" class="w-full h-64 object-cover mb-4">
                <p id="modal-description" class="text-gray-700 mb-4"></p>
                <p id="modal-stock" class="text-sm text-gray-500">Stock: <span></span></p>

                <form id="add-to-cart-form" onsubmit="addToCart(); return false;" class="mt-4">
                    <input type="hidden" id="modal-product-id">
                    <div class="mb-4">
                        <label for="quantity" class="block text-gray-700">Quantity</label>
                        <input type="number" id="quantity" name="quantity" min="1" value="1" class="w-full p-2 border rounded">
                    </div>
                    <button type="submit" class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800">
                        Add to Cart
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        let cartCount = 0;

        function openModal(product) {
            document.getElementById('modal-title').textContent = product.name;
            document.getElementById('modal-image').src = product.image;
            document.getElementById('modal-description').textContent = product.description;
            document.getElementById('modal-stock').querySelector('span').textContent = product.stock;
            document.getElementById('modal-product-id').value = product.id;
            document.getElementById('product-modal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('product-modal').classList.add('hidden');
        }

        function addToCart() {
            cartCount++;
            const cartIcon = document.getElementById('cart-icon');
            const cartCountSpan = document.getElementById('cart-count');
            cartCountSpan.textContent = cartCount;
            cartIcon.classList.remove('hidden');
            closeModal();
        }

        function goToCart() {
            window.location.href = 'cart.php';
        }

        function filterProducts() {
            const searchValue = document.getElementById('search-input').value.toLowerCase();
            const productCards = document.querySelectorAll('.product-card');
            productCards.forEach(card => {
                const productName = card.getAttribute('data-name').toLowerCase();
                if (productName.includes(searchValue)) {
                    card.classList.remove('hidden');
                } else {
                    card.classList.add('hidden');
                }
            });
        }
    </script>
</body>
</html>
