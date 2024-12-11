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
    </style>
</head>
<body class="flex flex-col min-h-screen text-gray-800 bg-green-50">

    <!-- Header -->
    <header class="py-4 text-white bg-green-700">
        <div class="container flex items-center justify-between px-4 mx-auto">
            <div class='flex items-center gap-3 md:gap-5 max-h-10'>
                <x-application-logo class="h-10"/>
                <p class='font-bold'> EcoSwap</p>
            </div>
            {{-- <h1 class="text-xl font-bold">ecoswap Dashboard</h1> --}}
            <div class='flex flex-row items-center h-auto gap-5'>
                <a href="{{ route('product') }}"> {{__("View Products")}}</a>
                {{-- <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="px-4 py-2 bg-red-600 rounded hover:bg-red-700">
                        {{ __("Log out" )}}
                    </button>
                </form> --}}
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container flex flex-col gap-4 py-8 mx-auto md:flex-row">
        <!-- Menu Section -->
        <section class="p-6 bg-white rounded shadow-lg basis-1/5">
            <div class="flex items-center gap-4 mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                    <path fill="#000" d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10Zm3-12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 7a7.489 7.489 0 0 1 6-3 7.489 7.489 0 0 1 6 3 7.489 7.489 0 0 1-6 3 7.489 7.489 0 0 1-6-3Z"/>
                </svg>
                <div>
                    <p><strong> {{ Auth::User()->name}}</strong></p>
                    <p>{{ Auth::User()->email }}</p>
                    {{-- TODO: MAKE RESPONSIVE --}}
                    {{-- <p>Saldo : {{ \App\Http\Controllers\ProfileController::formatBalance(Auth::User()->balance) }}</p> --}}
                </div>
            </div>
            <div class="flex flex-col gap-2">
                <button class="menu-btn" data-target="profile"> {{ __("Profile") }}</button>
                <button class="menu-btn" data-target="product-sale">{{ __("Product For Sale") }}</button>
                {{-- <button class="menu-btn" data-target="product-buy"> {{ __("Product But")}} </button> --}}
                <button class="menu-btn" data-target="transactions">{{ __("Transactions") }}</button>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full px-4 py-2 text-white bg-red-600 rounded hover:bg-red-700">
                        {{ __("Log out" )}}
                    </button>
                </form>
                {{-- <button class="logout-btn">Logout</button> --}}
            </div>
        </section>

        <!-- Dynamic Content Section -->
        <section id="main-content" class="flex-1 p-6 bg-white rounded shadow-lg">
            <h2 class="mb-4 text-2xl font-bold text-green-700">Welcome to ecoswap Dashboard</h2>
            <p>Select a menu to see details.</p>
        </section>
    </main>

    <!-- Modal -->
    <div id="modal-container" class="fixed inset-0 flex items-center justify-center hidden bg-black bg-opacity-50">
        <div class="p-6 bg-white rounded shadow-lg modal-content w-96"></div>
    </div>

    <footer class="py-4 text-center text-white bg-green-700">
        <p>&copy; 2024 ecoswap. All rights reserved.</p>
    </footer>

    <script>
        const mainContent = document.getElementById('main-content');
        const modalContainer = document.getElementById('modal-container');
        const modalContent = modalContainer.querySelector('.modal-content');

        async function loadSection(url) {
            const response = await fetch(url);
            mainContent.innerHTML = await response.text();
            mainContent.innerHTML = html;
        }

        const menuButtons = document.querySelectorAll('.menu-btn');
        menuButtons.forEach(button => {
            button.addEventListener('click', () => {
                menuButtons.forEach(btn => btn.classList.remove('active'));
                button.classList.add('active');
                const target = button.dataset.target;
                if (target === 'profile') loadSection('{{ route('dashboard.profile') }}');
                else if (target === 'product-sale') loadSection('{{ route('dashboard.sale') }}');
                else if (target === 'transactions') loadSection('{{ route('transactions') }}');
            });
        });

        function showModal(title, content = '') {
            modalContent.innerHTML = `
                <h3 class="mb-4 text-xl font-bold text-green-700">${title}</h3>
                ${content}
                <div class="flex justify-end gap-4 mt-4">
                    <button class="px-4 py-2 text-white bg-red-600 rounded hover:bg-red-700" onclick="closeModal()">Cancel</button>
                    <button class="px-4 py-2 text-white bg-green-700 rounded hover:bg-green-800">Confirm</button>
                </div>
            `;
            modalContainer.classList.remove('hidden');
        }

        function closeModal() {
            modalContainer.classList.add('hidden');
        }
    </script>
</body>
</html>