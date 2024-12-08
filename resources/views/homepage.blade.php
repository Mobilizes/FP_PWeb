<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jual Beli Barang Bekas</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

</head>
<body class="text-gray-800 bg-green-50">
    <!-- Navbar -->
    <header class="text-white bg-green-700">
        <div class="container flex items-center justify-between p-4 mx-auto">
            <div class="flex flex-row">
            <x-application-logo class="w-8 h-8 text-gray-500 fill-current z-100" />
            <h1 class="text-xl font-bold ml-3">ecoswap</h1>
        </div>

            <nav>
                <button id="menu-button" class="md:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <ul id="menu" class="hidden space-x-4 md:flex items-center">
                    <li><a href="#home" class="hover:text-green-300">Home</a></li>
                    <li><a href="#about" class="hover:text-green-300">About Us</a></li>
                    <li><a href="#products" class="hover:text-green-300">Our Products</a></li>
                    <li><a href="#testimonials" class="hover:text-green-300">Testimonials</a></li>
                    @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="hover:text-green-300">
                                    <li>Dashboard</li>
                                </a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="px-4 py-2 bg-red-600 rounded hover:bg-red-700">
                                        {{ __("Log out" )}}
                                    </button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="hover:text-green-300">
                                    <li>Log in</li>
                                </a>
                                @if (Route::has('register'))
                                    <li>
                                        <a href="{{ route('register') }}" class="hover:text-green-300">
                                            Register
                                        </a>
                                    </li>
                                @endif
                            @endauth 
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="home" class="py-16 px-8 bg-green-100">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 items-center gap-8">
          <div>
            <h2 class="text-4xl font-bold text-green-700">ECO SWAP</h2>
            <p class="mt-4 text-lg text-gray-700">
              Barangmu masih bagus namun tidak terpakai ? <br> di <span class="text-green-600 font-semibold">SWAP</span> aja.
            </p>
            <a
              href="#products"
              class="inline-block px-6 py-3 mt-6 text-white bg-green-700 rounded hover:bg-green-800"
            >
              Explore Now
            </a>
          </div>
      
          <div class="relative overflow-hidden">
            <div class="swiper-container">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <img
                    src="https://via.placeholder.com/600x400?text=Gambar+1"
                    alt="Gambar 1"
                    class="w-full max-w-sm mx-auto rounded-lg"
                  />
                </div>
                <div class="swiper-slide">
                  <img
                    src="https://via.placeholder.com/600x400?text=Gambar+2"
                    alt="Gambar 2"
                    class="w-full max-w-sm mx-auto rounded-lg"
                  />
                </div>
                <div class="swiper-slide">
                  <img
                    src="https://via.placeholder.com/600x400?text=Gambar+3"
                    alt="Gambar 3"
                    class="w-full max-w-sm mx-auto rounded-lg"
                  />
                </div>
              </div>
      
              <div class="swiper-button-next text-green-700"></div>
              <div class="swiper-button-prev text-green-700"></div>
      
              <div class="swiper-pagination"></div>
            </div>
          </div>
        </div>
      </section>
      
      
    <!-- About Us -->
    <section id="about" class="py-16 bg-gray-100 px-6">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            <div class="flex justify-center">
                <img
                  src="https://via.placeholder.com/400x300?text=Ilustrasi+About+Us"
                  alt="Ilustrasi Tentang Kami"
                  class="w-3/4 max-w-md rounded-lg shadow-lg"
                />
              </div>
          <div>
            <h3 class="text-3xl font-bold text-green-700">About Us</h3>
            <p class="mt-6 text-gray-700 leading-relaxed">
              Kami adalah platform yang bertujuan untuk mengurangi limbah dan 
              mendukung keberlanjutan dengan menyediakan tempat untuk jual beli barang bekas 
              yang masih layak pakai. Misi kami adalah menciptakan dampak positif bagi 
              lingkungan sekaligus memberikan peluang ekonomi bagi masyarakat.
            </p>
            <p class="mt-4 text-gray-700 leading-relaxed">
              Dengan sistem yang mudah digunakan, Anda dapat menjual barang bekas 
              yang tidak lagi digunakan atau menemukan barang berkualitas dengan harga terjangkau. 
              Bergabunglah dengan kami dalam membangun masa depan yang lebih bersih dan hijau!
            </p>
          </div>
        </div>
      </section>
      

    <!-- Our Products -->
    <section id="products" class="py-16 bg-green-100">
        <div class="container mx-auto text-center">
            <h3 class="text-3xl font-bold text-green-700">Our Products</h3>
            <div class="px-4 grid grid-cols-1 gap-8 mt-8 md:grid-cols-3">
                <div class="p-4 bg-white rounded shadow">
                    <img src="https://via.placeholder.com/150" alt="Product 1" class="mx-auto mb-4">
                    <h4 class="font-bold">Product 1</h4>
                    <p class="text-gray-600">Deskripsi singkat barang.</p>
                </div>
                <div class="p-4 bg-white rounded shadow">
                    <img src="https://via.placeholder.com/150" alt="Product 2" class="mx-auto mb-4">
                    <h4 class="font-bold">Product 2</h4>
                    <p class="text-gray-600">Deskripsi singkat barang.</p>
                </div>
                <div class="p-4 bg-white rounded shadow">
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
            <h3 class="text-3xl font-bold text-green-700">Testimonials</h3>
            <div class="grid grid-cols-1 gap-8 mt-8 md:grid-cols-2">
                <div class="p-4 rounded shadow bg-green-50">
                    <p class="italic">"Platform ini sangat membantu saya untuk menjual barang bekas dengan mudah!"</p>
                    <p class="mt-2 font-bold">- Gerry </p>
                </div>
                <div class="p-4 rounded shadow bg-green-50">
                    <p class="italic">"Membeli barang bekas kini lebih praktis dan ramah lingkungan."</p>
                    <p class="mt-2 font-bold">- Fernando</p>
                </div>
                <div class="p-4 rounded shadow bg-green-50">
                    <p class="italic">"Menurut saya, platform ini sangat membantu bagi kita yang bingung mau menaruh barang tak terpakai di mana."</p>
                    <p class="mt-2 font-bold">- Nicholas</p>
                </div>
                <div class="p-4 rounded shadow bg-green-50">
                    <p class="italic">"Platform ini sangat bagus dan berguna bagi saya dan keluarga saya."</p>
                    <p class="mt-2 font-bold">- Budi</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-4 text-white bg-green-700">
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

<script>
    const swiper = new Swiper('.swiper-container', {
      loop: true,
      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
    });
  </script>
  