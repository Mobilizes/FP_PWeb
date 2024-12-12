


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jual Beli Barang Bekas</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>
<body class="text-gray-800 bg-green-50">
    <!-- Navbar -->
    <header class="fixed z-50 w-full text-white bg-green-700">
        <div class="container flex items-center justify-between px-4 py-2 mx-auto">
            <div class="flex flex-row">
            <x-application-logo class="w-8 text-gray-500 fill-current h-7 z-100" />
            <h1 class="ml-3 text-xl font-bold">ecoswap</h1>
            </div>

        <nav class="relative ">
            <div class="container px-4 mx-auto">
                <div class="flex items-center justify-between py-4">
                    <div class="md:hidden">
                        <button id="menu-button" class="focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>
                    <ul id="menu" class="items-center hidden space-x-4 md:flex">
                        <li><a href="#home" class="hover:text-green-300 scroll-link">Home</a></li>
                        <li><a href="#about" class="hover:text-green-300 scroll-link">About Us</a></li>
                        <li><a href="#products" class="hover:text-green-300 scroll-link">Our Products</a></li>
                        <li><a href="#testimonials" class="hover:text-green-300 scroll-link">Testimonials</a></li>
                        @if (Route::has('login'))
                            @auth
                                <li><a href="{{ url('/dashboard') }}" class="hover:text-green-300">Dashboard</a></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="px-4 py-2 text-white bg-red-600 rounded hover:bg-red-700">
                                            {{ __("Log out" )}}
                                        </button>
                                    </form>
                                </li>
                            @else
                                <li><a href="{{ route('login') }}" class="px-4 py-2 bg-green-900 rounded-md hover:text-green-300">Log in</a></li>
                                @if (Route::has('register'))
                                    <li><a href="{{ route('register') }}" class="px-4 py-2 bg-green-800 rounded-md hover:text-green-300">Register</a></li>
                                @endif
                            @endauth
                        @endif
                    </ul>
                </div>
            </div>
            <div id="mobile-menu" class="absolute top-0 right-0 z-50 hidden max-w-xs px-4 py-2 overflow-y-hidden bg-green-700 shadow-lg w-28">
                <ul class="flex flex-col justify-end space-y-4 overflow-hidden">
                    <li><a href="#home" class="block hover:text-green-300 scroll-link">Home</a></li>
                    <li><a href="#about" class="block hover:text-green-300 scroll-link">About Us</a></li>
                    <li><a href="#products" class="block hover:text-green-300 scroll-link">Our Products</a></li>
                    <li><a href="#testimonials" class="block hover:text-green-300 scroll-link">Testimonials</a></li>
                    @if (Route::has('login'))
                        @auth
                            <li><a href="{{ url('/dashboard') }}" class="block hover:text-green-300">Dashboard</a></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full px-4 py-2 text-left text-white bg-red-600 rounded hover:bg-red-700">
                                        {{ __("Log out") }}
                                    </button>
                                </form>
                            </li>
                        @else
                            <li><a href="{{ route('login') }}" class="block hover:text-green-300">Log in</a></li>
                            @if (Route::has('register'))
                                <li><a href="{{ route('register') }}" class="block hover:text-green-300">Register</a></li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>
            
        </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="home" class="px-8 py-32 bg-green-100 md:px-20 animate__animated animate__fadeIn">
        <div class="container grid items-center grid-cols-1 gap-8 mx-auto md:grid-cols-2">
          <div>
            <h2 class="flex justify-center text-4xl font-bold text-green-700 md:justify-start">ECO SWAP</h2>
            <p class="mt-4 text-lg text-gray-700">
              Barangmu masih bagus namun tidak terpakai ? <br> di <span class="font-semibold text-green-600">SWAP</span> aja.
            </p>
            <a
              href="#products"
              class="inline-block px-6 py-3 mt-6 text-white bg-green-700 rounded hover:bg-green-800 "
            >
              Explore Now
            </a>
          </div>
      
          <div class="relative overflow-hidden">
            <div class="swiper-container">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <img
                    src="/img/homepage/homepage1.jpg"
                    alt="Gambar 1"
                    class="w-full max-w-sm mx-auto rounded-lg"
                  />
                </div>
                <div class="swiper-slide">
                  <img
                    src="/img/homepage/homepage2.jpg"
                    alt="Gambar 2"
                    class="w-full max-w-sm mx-auto rounded-lg"
                  />
                </div>
                <div class="swiper-slide">
                  <img
                    src="/img/homepage/homepage3.png"
                    alt="Gambar 3"
                    class="w-full max-w-sm mx-auto rounded-lg"
                  />
                </div>
              </div>
      
              <div class="text-green-700 swiper-button-next"></div>
              <div class="text-green-700 swiper-button-prev"></div>
      
              <div class="swiper-pagination"></div>
            </div>
          </div>
        </div>
      </section>
      
    <!-- About Us -->
    <section id="about" class="px-6 py-16 bg-gray-100 md:px-20 animate__animated animate__fadeInLeft">
        <div class="container grid items-center grid-cols-1 gap-8 mx-auto md:grid-cols-2">
            <div class="flex justify-center">
                <img
                src="/img/homepage/homepage4.jpeg"

                  alt="Ilustrasi Tentang Kami"
                  class="w-3/4 max-w-md rounded-lg shadow-lg"
                />
              </div>
          <div>
            <h3 class="text-3xl font-bold text-green-700">About Us</h3>
            <p class="mt-6 leading-relaxed text-gray-700">
              Kami adalah platform yang bertujuan untuk mengurangi limbah dan 
              mendukung keberlanjutan dengan menyediakan tempat untuk jual beli barang bekas 
              yang masih layak pakai. Misi kami adalah menciptakan dampak positif bagi 
              lingkungan sekaligus memberikan peluang ekonomi bagi masyarakat.
            </p>
            <p class="mt-4 leading-relaxed text-gray-700">
              Dengan sistem yang mudah digunakan, Anda dapat menjual barang bekas 
              yang tidak lagi digunakan atau menemukan barang berkualitas dengan harga terjangkau. 
              Bergabunglah dengan kami dalam membangun masa depan yang lebih bersih dan hijau!
            </p>
          </div>
        </div>
      </section>
      

    <!-- Our Products -->
    <section id="products" class="py-16 bg-green-100 md:px-20 animate__animated animate__fadeInRight">
        <div class="container mx-auto text-center">
            <h3 class="text-3xl font-bold text-green-700">Our Products</h3>
            <div class="grid grid-cols-1 gap-8 px-4 mt-8 md:grid-cols-3">
                @foreach ($products->take(6) as $product)
                <div class="p-4 bg-white rounded shadow">
                    <img src="{{ Storage::url($product->image_path) }}" 
                         alt="{{ $product->name }}" 
                         class="object-cover mx-auto rounded w-150 h-150"
                         style="width: 150px; height: 150px;">
                    <h4 class="mt-4 font-bold">{{ $product->name }}</h4>
                    <p class="mt-2 text-gray-600">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section id="testimonials" class="py-16 md:px-20 animate__animated animate__fadeInUp">
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
    <footer class="py-8 text-white bg-green-700">
      <div class="container mx-auto space-y-4 text-center">
          <!-- Logo and Name -->
          <div>
              <h1 class="text-xl font-bold">Ecoswap</h1>
              <p class="text-sm">Connecting People, Nature, and Sustainability</p>
          </div>
          
          <!-- Social Media Links -->
          <div class="flex justify-center space-x-6">
              <a href="https://www.instagram.com/its_campus/?hl=en" target="#" class="hover:text-green-300">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M12 2.2c3.2 0 3.6 0 4.9.1 1.2.1 2 .2 2.7.5.8.3 1.5.8 2.1 1.4.6.6 1.1 1.3 1.4 2.1.3.7.4 1.5.5 2.7.1 1.3.1 1.7.1 4.9s0 3.6-.1 4.9c-.1 1.2-.2 2-.5 2.7-.3.8-.8 1.5-1.4 2.1-.6.6-1.3 1.1-2.1 1.4-.7.3-1.5.4-2.7.5-1.3.1-1.7.1-4.9.1s-3.6 0-4.9-.1c-1.2-.1-2-.2-2.7-.5-.8-.3-1.5-.8-2.1-1.4-.6-.6-1.1-1.3-1.4-2.1-.3-.7-.4-1.5-.5-2.7-.1-1.3-.1-1.7-.1-4.9s0-3.6.1-4.9c.1-1.2.2-2 .5-2.7.3-.8.8-1.5 1.4-2.1.6-.6 1.3-1.1 2.1-1.4.7-.3 1.5-.4 2.7-.5C8.4 2.2 8.8 2.2 12 2.2M12 0C8.7 0 8.3 0 7.1.1 5.9.1 4.8.3 3.9.7 2.9 1.1 2 1.8 1.2 2.6.4 3.4-.2 4.2-.7 5.2c-.4.9-.6 2-.7 3.2C-.5 9.4-.5 9.7-.5 12c0 2.3 0 2.6.1 3.8.1 1.2.3 2.3.7 3.2.4.9 1.1 1.8 1.9 2.6.8.8 1.7 1.4 2.7 1.8.9.4 2 .6 3.2.7 1.2.1 1.5.1 4.8.1 3.3 0 3.6 0 4.8-.1 1.2-.1 2.3-.3 3.2-.7.9-.4 1.8-1.1 2.6-1.9.8-.8 1.4-1.7 1.8-2.7.4-.9.6-2 .7-3.2.1-1.2.1-1.5.1-4.8 0-3.3 0-3.6-.1-4.8-.1-1.2-.3-2.3-.7-3.2-.4-.9-1.1-1.8-1.9-2.6-.8-.8-1.7-1.4-2.7-1.8-.9-.4-2-.6-3.2-.7-1.2-.1-1.5-.1-4.8-.1z"></path><path d="M12 5.8A6.2 6.2 0 1 0 12 18.2 6.2 6.2 0 1 0 12 5.8zm0 10.2a4 4 0 1 1 0-8 4 4 0 1 1 0 8zm6.4-11.6a1.4 1.4 0 1 0 0 2.8 1.4 1.4 0 1 0 0-2.8z"></path>
                  </svg>
              </a>
              <a href="https://wa.me/62895385905155" target="#" class="hover:text-green-300">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M12 0C5.4 0 0 5.4 0 12s5.4 12 12 12 12-5.4 12-12S18.6 0 12 0zm6.7 16.5c-.3.8-1.7 1.5-2.3 1.5-1.3-.1-4.5-1.7-6.4-4.3C7.4 11.2 6.8 9.5 6.8 8.6c0-.8.5-1.7.9-1.9.3-.1.7-.1.9 0s.5.5.5.7c.1.3.3 1 .4 1.2.1.3.1.5-.1.8-.2.2-.5.7-.7.8-.2.2-.5.4-.2.7.6.9 1.6 2.1 3.5 3.1 1.6.9 2.2 1 2.6.9.4-.1 1-.9 1.2-1.2s.2-.7.3-.8.4-.2.7-.1c.2 0 1 .5 1.2.7.2.1.2.5 0 .9z"></path>
                  </svg>
              </a>
              <a href="#" target="#" class="hover:text-green-300">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M22.7 0H1.3C.6 0 0 .6 0 1.3v21.4C0 23.4.6 24 1.3 24H12.8V14.8h-3.1v-3.5h3.1V8.6c0-3.1 1.8-4.9 4.6-4.9 1.3 0 2.6.1 2.9.1v3.4h-2c-1.6 0-2 .8-2 1.9v2.6h3.4l-.5 3.5h-2.9V24H22.7c.7 0 1.3-.6 1.3-1.3V1.3C24 .6 23.4 0 22.7 0z"></path>
                  </svg>
              </a>
              <a href="#" class="hover:text-green-300">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M20.4 3H3.6C2.7 3 2 3.7 2 4.6V19.4C2 20.3 2.7 21 3.6 21H20.4C21.3 21 22 20.3 22 19.4V4.6C22 3.7 21.3 3 20.4 3zM20 6.7L12 12.5 4 6.7V5L12 10.3 20 5V6.7z"></path>
                  </svg>
              </a>
          </div>
  
          <!-- Copyright -->
          <p class="text-sm">&copy; 2024 Ecoswap. All rights reserved.</p>
      </div>
  </footer>
  
    <script>
      const menu = document.getElementById('mobile-menu');
      const button = document.getElementById('menu-button');
    
      button.addEventListener('click', () => menu.classList.toggle('hidden'));
    
      document.addEventListener('click', (event) => {
        if (!menu.contains(event.target) && !button.contains(event.target)) {
          menu.classList.add('hidden');
        }
      });
    
      menu.querySelectorAll('a').forEach(link =>
        link.addEventListener('click', () => menu.classList.add('hidden'))
      );
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
    document.querySelectorAll('.scroll-link').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault(); 
            const targetId = this.getAttribute('href').substring(1); 
            const targetElement = document.getElementById(targetId);
            
            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - 50, 
                    behavior: 'smooth' 
                });
            }
        });
    });
</script>
