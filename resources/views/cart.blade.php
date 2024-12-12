

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="text-gray-800 bg-green-50">
    <header class="py-4 text-white bg-green-700">
        <div class="container flex items-center justify-between mx-5">
            <div class='flex flex-row items-center gap-3 md:gap-5'>
                <x-application-logo class=h-10/>
                <h1 class="text-xl font-bold">ecoswap</h1>
            </div>
            <a href="{{ route('product') }}" class="mr-10 md:mr-0 hover:text-green-300">Back to Products</a>
        </div>
    </header>

    <main class="container py-8 mx-auto">
        <h2 class="mb-6 text-3xl font-bold text-center text-green-700">Your Cart</h2>

        <?php if (!empty($cart)): ?>
            <!-- Cart Table -->
            <div class="overflow-x-auto">
                <table class="w-full text-left bg-white rounded shadow-lg">
                    <thead class="text-white bg-green-700">
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
                        if (!empty($cart)):
                            foreach ($cart->products as $item): 
                                // if (!is_array($item)) continue;
                                $subtotal = $item->price * $item->pivot->quantity;
                                $total += $subtotal;
                                ?>
                        
                                <tr class="border-t">
                                    <td class="p-4"><img src="<?= htmlspecialchars($item->image) ?>" alt="<?= htmlspecialchars($item['name']) ?>" class="object-cover w-20 h-20"></td>
                                    <td class="p-4"><?= htmlspecialchars($item->name) ?></td>
                                    <td class="p-4">Rp <?= number_format($item->price, 0, ',', '.') ?></td>
                                    <td class="flex items-center p-4">
                                        {{-- <button class="px-2 py-1 text-white bg-green-700 rounded hover:bg-green-800" onclick="updateQuantity(<?= $item['id'] ?>, -1)">-</button> --}}
                                        {{-- <button class="px-2 py-1 text-white bg-green-700 rounded hover:bg-green-800" onclick="updateQuantity(<?= $item['id'] ?>, 1)">+</button> --}}

                                        <td class="flex items-center p-4">
                                            <button class="px-2 py-1 text-white bg-green-700 rounded hover:bg-green-800" onclick="updateQuantity(<?= $item['id'] ?>, -1)">-</button>
                                            <span id="quantity-<?= $item['id'] ?>" class="px-4"><?= $item->pivot->quantity ?></span>
                                            <button class="px-2 py-1 text-white bg-green-700 rounded hover:bg-green-800" onclick="updateQuantity(<?= $item['id'] ?>, 1)">+</button>
                                        </td>


                                    </td>
                                    <td class="p-4">Rp <?= number_format($subtotal, 0, ',', '.') ?></td>
                                    <td class="p-4">
                                        <button class="px-4 py-2 text-white bg-red-600 rounded hover:bg-red-700" onclick="updateQuantity(<?= $item->id ?>, -<?= $item->pivot->quantity ?>)">Remove</button>
                                    </td>
                                </tr>
                        <?php 
                            endforeach;
                        else:
                            echo "<tr><td colspan='6' class='p-4 text-center'>Your cart is empty.</td></tr>";
                        endif;
                        ?>
                    </tbody>
                    
                </table>
            </div>

            <!-- Total and Checkout -->
            {{-- <button class="px-6 py-3 text-white bg-green-700 rounded hover:bg-green-800" onclick="checkout()">Checkout</button> --}}
            
            <div class="flex items-center justify-between mt-8">
                <h3 class="text-xl font-bold text-green-700">Total: Rp <span id="total-price"><?= number_format($total, 0, ',', '.') ?></span></h3>
                <button class="px-6 py-3 text-white bg-green-700 rounded btn btn-primary hover:bg-green-800" onclick="checkout()">Checkout</button>
            </div>
            <?php else: ?>
                <p class="text-center text-gray-600">Your cart is empty. <a href="products.php" class="font-bold text-green-700">Shop now!</a></p>
            <?php endif; ?>
    </main>

    <script>
      let cart = <?= json_encode($cart->products) ?>;

      function updateQuantity(productId, change) {
        const quantityElement = document.getElementById(`quantity-${productId}`);
        const currentQuantity = parseInt(quantityElement.textContent);
        const newQuantity = currentQuantity + change;

        // if (newQuantity < 1) {
        //     alert('Quantity cannot be less than 1');
        //     return;
        // }

        fetch("{{ route('cart.update', ['cart' => $cart->id]) }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({
                product_id: productId,
                quantity: newQuantity
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.message === 'Cart updated') {
                // Refresh the page to show updated quantity
            } else {
                alert(data.message);
            }
            location.reload();

        })
        .catch(error => console.error('Error:', error));
    }

    // function updateSubtotalAndTotal(productId, newQuantity) {
    //     const priceElement = document.getElementById(`price-${productId}`);
    //     const subtotalElement = document.getElementById(`subtotal-${productId}`);
    //     if (!priceElement || !subtotalElement) {
    //         console.error('Price or subtotal element not found for product ID:', productId);
    //         return;
    //     }
    //     const price = parseFloat(priceElement.textContent.replace(/[^0-9.-]+/g,""));
    //     const newSubtotal = price * newQuantity;
    //     subtotalElement.textContent = `Rp ${newSubtotal.toLocaleString()}`;

    //     // Update total price
    //     updateTotalPrice();
    // }


    // function updateTotalPrice() {
    //     const subtotalElements = document.querySelectorAll('[id^="subtotal-"]');
    //     let total = 0;
    //     subtotalElements.forEach(element => {
    //         const subtotal = parseFloat(element.textContent.replace(/[^0-9.-]+/g,""));
    //         total += subtotal;
    //     });
    //     const totalPriceElement = document.getElementById('total-price');
    //     totalPriceElement.textContent = total.toLocaleString();
    // }

    // function renderCart() {
    //     const tableBody = document.getElementById('cart-table-body');
    //     const totalPriceElement = document.getElementById('total-price');
    //     let total = 0;
    //     tableBody.innerHTML = cart.map(item => {
    //         const subtotal = item.price * item.pivot.quantity;
    //         total += subtotal;
    //         return `
    //             <tr class="border-t">
    //                 <td class="p-4"><img src="${item.image}" alt="${item.name}" class="object-cover w-20 h-20"></td>
    //                 <td class="p-4">${item.name}</td>
    //                 <td class="p-4" id="price-${item.id}">Rp ${item.price.toLocaleString()}</td>
    //                 <td class="flex items-center p-4">
    //                     <button class="px-2 py-1 text-white bg-green-700 rounded hover:bg-green-800" onclick="updateQuantity(${item.id}, -1)">-</button>
    //                     <span id="quantity-${item.id}" class="px-4">${item.pivot.quantity}</span>
    //                     <button class="px-2 py-1 text-white bg-green-700 rounded hover:bg-green-800" onclick="updateQuantity(${item.id}, 1)">+</button>
    //                 </td>
    //                 <td class="p-4" id="subtotal-${item.id}">Rp ${subtotal.toLocaleString()}</td>
    //                 <td class="p-4">
    //                     <button class="px-4 py-2 text-white bg-red-600 rounded hover:bg-red-700" onclick="removeFromCart(${item.id})">Remove</button>
    //                 </td>
    //             </tr>
    //         `;
    //     }).join('');
    //     totalPriceElement.textContent = total.toLocaleString();
    // }
      

        function checkout() {
        fetch("{{ route('cart.checkout', ['cart' => $cart->id]) }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.message === 'Not enough balance') {
                alert('Not enough balance');
            } else if (data.message === 'Checkout successful') {
                alert('Checkout successful');
                window.location.href = "{{ route('dashboard') }}";
            }
        })
        .catch(error => console.error('Error:', error));
    }
    </script>
</body>
</html>
