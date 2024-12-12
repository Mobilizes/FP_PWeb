<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoSwap Products</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="relative text-gray-800 bg-green-50">
    <header class="py-4 text-white bg-green-700">
        <div class="container flex items-center justify-between mx-auto">
            <div class='flex flex-row items-center gap-3 ml-5 md:ml-0 md:gap-5'>
                <x-application-logo class="h-10"/>
                <h1 class="text-xl font-bold">ecoswap</h1>
            </div>
            <div class='flex flex-row gap-5 mr-5 md:mr-0'>
                <a href="{{ route('homepage') }}" class="hover:text-green-300">Home</a>
                <a href="{{ route('dashboard') }}">Dashboard</a>
            </div>
        </div>
    </header>

    <main class="container py-8 mx-auto">
        <h2 class="mb-6 text-3xl font-bold text-center text-green-700">Our Products</h2>

        <!-- Search Bar -->
        <div class="flex justify-center mb-6">
            <input
                type="text"
                id="search-input"
                placeholder="Cari produk..."
                class="w-1/2 px-4 py-2 border rounded"
                oninput="filterProducts()"
            >
        </div>

        <!-- Products Grid -->
        <div id="products-grid" class="grid grid-cols-1 gap-6 md:grid-cols-3">
            @foreach ($products as $product)
                <div
                    class="p-4 bg-white rounded shadow product-card"
                    data-name="{{ $product->name }}"
                    onclick="openModal({
                        id: '{{ $product->id }}',
                        name: '{{ $product->name }}',
                        description: '{{ $product->description }}',
                        stock: '{{ $product->stock }}',
                        image: '{{ Storage::url($product->image_path) }}'
                    })"
                >
                    <img src="{{ Storage::url($product->image_path) }}" 
                        alt="{{ $product->name }}" 
                        class="object-cover mx-auto rounded w-150 h-150"
                        style="width: 150px; height: 150px;">
                    <h3 class="text-lg font-bold">{{ $product->name }}</h3>
                    <p class="text-gray-600">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                </div>
            @endforeach
        </div>
    </main>

    <!-- Cart Icon -->
    <div id="cart-icon" class="fixed flex items-center justify-center hidden p-4 text-white bg-green-700 rounded-full shadow-lg cursor-pointer bottom-4 right-4" onclick="goToCart()">
        <span id="cart-count" class="absolute top-0 right-0 flex items-center justify-center w-5 h-5 -mt-2 -mr-2 text-xs font-bold bg-red-600 rounded-full"></span>
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-4 8h18M9 21a2 2 0 11-4 0 2 2 0 014 0zm10 0a2 2 0 11-4 0 2 2 0 014 0z" />
        </svg>
    </div>

    <!-- Modal -->
    <div id="product-modal" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-black bg-opacity-50">
        <div class="w-11/12 bg-white rounded shadow-lg md:w-1/2">
            <div class="flex items-center justify-between p-4 border-b">
                <h3 id="modal-title" class="text-xl font-bold"></h3>
                <button onclick="closeModal()" class="text-gray-600 hover:text-gray-900">&times;</button>
            </div>
            <div class="p-4">
                <img 
                    id="modal-image"
                    src="" 
                    alt="" 
                    class="object-cover mx-auto rounded w-150 h-150"
                    style="width: 320px; height: 320px;">
                <p id="modal-description" class="mb-4 text-gray-700"></p>
                <p id="modal-stock" class="text-sm text-gray-500">Stock: <span></span></p>

                <form id="add-to-cart-form" action="{{ route('cart.storeAndAdd')}}" method="POST" onsubmit="submitAddToCartForm(event)" class="mt-4">
                    @csrf
                    <input type="hidden" id="modal-product-id">
                    <div class="mb-4">
                        <label for="quantity" class="block text-gray-700">Quantity</label>
                        <input type="number" id="quantity" name="quantity" min="1" value="1" class="w-full p-2 border rounded">
                    </div>
                    <button type="submit" class="px-4 py-2 text-white bg-green-700 rounded hover:bg-green-800">
                        Add to Cart
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        let cartCount = 0;

        document.addEventListener('DOMContentLoaded', () => {
            checkCartStatus();
        });

        function checkCartStatus() {
            fetch('{{ route('cart.checkCart') }}', {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.hasCart) {
                    cartCount = data.productCount;
                    console.log(data.productCount);
                    showCartIcon();
                }
            })
            .catch(error => console.error('Error:', error));
        }

        function openModal(product) {
            document.getElementById('modal-title').textContent = product.name;
            document.getElementById('modal-image').src = product.image; 
            document.getElementById('modal-image').alt = product.name;
            document.getElementById('modal-description').textContent = product.description;
            document.getElementById('modal-stock').querySelector('span').textContent = product.stock;
            document.getElementById('modal-product-id').value = product.id;
            document.getElementById('product-modal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('product-modal').classList.add('hidden');
        }

        function submitAddToCartForm(event) {
            event.preventDefault();

            const productId = document.getElementById('modal-product-id').value;
            const quantity = document.getElementById('quantity').value;

            fetch('{{ route('cart.storeAndAdd') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    product_id: productId,
                    quantity: quantity
                })
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                cartCount++;
                closeModal();
                showCartIcon();
            })
            .catch(error => console.error('Error:', error));
        }

        function showCartIcon() {
            const cartIcon = document.getElementById('cart-icon');
            const cartCountSpan = document.getElementById('cart-count');
            cartCountSpan.textContent = cartCount;
            cartIcon.classList.remove('hidden');
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

        function goToCart() {
            window.location.href = '{{ route('cart.show') }}';
        }
    </script>
</body>
</html>
