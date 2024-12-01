<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jual Beli Barang Bekas</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-50 text-gray-800">
    <!-- Navbar -->
    <header class="bg-green-700 text-white">
        <div class="container mx-auto flex items-center justify-between p-4">
            <h1 class="text-xl font-bold">ecoswap</h1>
            <nav>
                <button id="menu-button" class="md:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <ul id="menu" class="hidden md:flex space-x-4">
                    <li><a href="#home" class="hover:text-green-300">Home</a></li>
                    <li><a href="#about" class="hover:text-green-300">About Us</a></li>
                    <li><a href="#products" class="hover:text-green-300">Our Products</a></li>
                    <li><a href="#testimonials" class="hover:text-green-300">Testimonials</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="home" class="bg-green-100 py-16">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold text-green-700">Jual Beli Barang Bekas</h2>
            <p class="mt-4 text-lg text-gray-700">Mari bersama mengurangi sampah dan menciptakan lingkungan yang lebih bersih.</p>
            <a href="#products" class="mt-6 inline-block bg-green-700 text-white px-6 py-3 rounded hover:bg-green-800">Explore Now</a>
        </div>
    </section>

    <!-- About Us -->
    <section id="about" class="py-16">
        <div class="container mx-auto text-center">
            <h3 class="text-2xl font-bold text-green-700">About Us</h3>
            <p class="mt-4 text-gray-700">Kami adalah platform yang bertujuan untuk mengurangi limbah dengan menyediakan tempat untuk jual beli barang bekas yang masih layak pakai.</p>
        </div>
    </section>

    <!-- Our Products -->
    <section id="products" class="bg-green-100 py-16">
        <div class="container mx-auto text-center">
            <h3 class="text-2xl font-bold text-green-700">Our Products</h3>
            <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-4 shadow rounded">
                    <img src="https://via.placeholder.com/150" alt="Product 1" class="mx-auto mb-4">
                    <h4 class="font-bold">Product 1</h4>
                    <p class="text-gray-600">Deskripsi singkat barang.</p>
                </div>
                <div class="bg-white p-4 shadow rounded">
                    <img src="https://via.placeholder.com/150" alt="Product 2" class="mx-auto mb-4">
                    <h4 class="font-bold">Product 2</h4>
                    <p class="text-gray-600">Deskripsi singkat barang.</p>
                </div>
                <div class="bg-white p-4 shadow rounded">
                    <img src="https://via.placeholder.com/150" alt="Product 3" class="mx-auto mb-4">
                    <h4 class="font-bold">Product 3</h4>
                    <p class="text-gray-600">Deskripsi singkat barang.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section id="testimonials" class="py-16">
        <div class="container mx-auto text-center">
            <h3 class="text-2xl font-bold text-green-700">Testimonials</h3>
            <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-green-50 p-4 shadow rounded">
                    <p class="italic">"Platform ini sangat membantu saya untuk menjual barang bekas dengan mudah!"</p>
                    <p class="mt-2 font-bold">- User A</p>
                </div>
                <div class="bg-green-50 p-4 shadow rounded">
                    <p class="italic">"Membeli barang bekas kini lebih praktis dan ramah lingkungan."</p>
                    <p class="mt-2 font-bold">- User B</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-green-700 text-white py-4">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 ecoswap. All rights reserved.</p>
        </div>
    </footer>

    <script>
        const menuButton = document.getElementById('menu-button');
        const menu = document.getElementById('menu');

        menuButton.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
