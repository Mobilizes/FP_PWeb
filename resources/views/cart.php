<?php
// Simulasi data keranjang (nanti bisa diganti dengan sesi atau database)
$cart = [
    [
        "id" => 1,
        "name" => "Kursi Kayu Bekas",
        "price" => 50000,
        "image" => "https://via.placeholder.com/150",
        "quantity" => 2,
    ],
    [
        "id" => 2,
        "name" => "Laptop Second",
        "price" => 2000000,
        "image" => "https://via.placeholder.com/150",
        "quantity" => 1,
    ],
    [
        "id" => 3,
        "name" => "Panci Stainless",
        "price" => 75000,
        "image" => "https://via.placeholder.com/150",
        "quantity" => 3,
    ],
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-50 text-gray-800">
    <header class="bg-green-700 text-white py-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">ecoswap</h1>
            <a href="products.php" class="hover:text-green-300">Back to Products</a>
        </div>
    </header>

    <main class="container mx-auto py-8">
        <h2 class="text-3xl font-bold text-green-700 text-center mb-6">Your Cart</h2>

        <?php if (!empty($cart)): ?>
            <!-- Cart Table -->
            <div class="overflow-x-auto">
                <table class="w-full bg-white rounded shadow-lg text-left">
                    <thead class="bg-green-700 text-white">
                        <tr>
                            <th class="p-4">Image</th>
                            <th class="p-4">Product</th>
                            <th class="p-4">Price</th>
                            <th class="p-4">Quantity</th>
                            <th class="p-4">Subtotal</th>
                            <th class="p-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="cart-table-body">
                        <?php 
                        $total = 0;
                        foreach ($cart as $item): 
                            $subtotal = $item['price'] * $item['quantity'];
                            $total += $subtotal;
                        ?>
                            <tr class="border-t">
                                <td class="p-4"><img src="<?= $item['image'] ?>" alt="<?= $item['name'] ?>" class="w-20 h-20 object-cover"></td>
                                <td class="p-4"><?= htmlspecialchars($item['name']) ?></td>
                                <td class="p-4">Rp <?= number_format($item['price'], 0, ',', '.') ?></td>
                                <td class="p-4 flex items-center">
                                    <button class="px-2 py-1 bg-green-700 text-white rounded hover:bg-green-800" onclick="updateQuantity(<?= $item['id'] ?>, -1)">-</button>
                                    <span class="px-4"><?= $item['quantity'] ?></span>
                                    <button class="px-2 py-1 bg-green-700 text-white rounded hover:bg-green-800" onclick="updateQuantity(<?= $item['id'] ?>, 1)">+</button>
                                </td>
                                <td class="p-4">Rp <?= number_format($subtotal, 0, ',', '.') ?></td>
                                <td class="p-4">
                                    <button class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700" onclick="removeFromCart(<?= $item['id'] ?>)">Remove</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Total and Checkout -->
            <div class="mt-8 flex justify-between items-center">
                <h3 class="text-xl font-bold text-green-700">Total: Rp <span id="total-price"><?= number_format($total, 0, ',', '.') ?></span></h3>
                <button class="bg-green-700 text-white px-6 py-3 rounded hover:bg-green-800" onclick="checkout()">Checkout</button>
            </div>
        <?php else: ?>
            <p class="text-center text-gray-600">Your cart is empty. <a href="products.php" class="text-green-700 font-bold">Shop now!</a></p>
        <?php endif; ?>
    </main>

    <script>
        let cart = <?= json_encode($cart) ?>;

        function updateQuantity(id, change) {
            cart = cart.map(item => {
                if (item.id === id) {
                    item.quantity = Math.max(1, item.quantity + change);
                }
                return item;
            });
            renderCart();
        }

        function removeFromCart(id) {
            cart = cart.filter(item => item.id !== id);
            renderCart();
        }

        function renderCart() {
            const tableBody = document.getElementById('cart-table-body');
            const totalPriceElement = document.getElementById('total-price');
            let total = 0;
            tableBody.innerHTML = cart.map(item => {
                const subtotal = item.price * item.quantity;
                total += subtotal;
                return `
                    <tr class="border-t">
                        <td class="p-4"><img src="${item.image}" alt="${item.name}" class="w-20 h-20 object-cover"></td>
                        <td class="p-4">${item.name}</td>
                        <td class="p-4">Rp ${item.price.toLocaleString()}</td>
                        <td class="p-4 flex items-center">
                            <button class="px-2 py-1 bg-green-700 text-white rounded hover:bg-green-800" onclick="updateQuantity(${item.id}, -1)">-</button>
                            <span class="px-4">${item.quantity}</span>
                            <button class="px-2 py-1 bg-green-700 text-white rounded hover:bg-green-800" onclick="updateQuantity(${item.id}, 1)">+</button>
                        </td>
                        <td class="p-4">Rp ${subtotal.toLocaleString()}</td>
                        <td class="p-4">
                            <button class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700" onclick="removeFromCart(${item.id})">Remove</button>
                        </td>
                    </tr>
                `;
            }).join('');
            totalPriceElement.textContent = total.toLocaleString();
        }

        function checkout() {
            alert('Checkout successful!');
            cart = [];
            renderCart();
        }
    </script>
</body>
</html>
