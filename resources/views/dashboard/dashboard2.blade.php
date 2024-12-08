<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interactive Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom Button Styles */
        .menu-btn {
            background: white;
            border: 2px solid #047857; /* Tailwind green-700 */
            color: black;
            padding: 0.5rem;
            border-radius: 0.375rem; /* Tailwind rounded */
            transition: all 0.3s ease;
        }
        .menu-btn:hover {
            background: #047857; /* Tailwind green-700 */
            color: white;
        }
        .menu-btn.active {
            background: #047857; /* Tailwind green-700 */
            color: white;
        }
        .logout-btn {
            background: #dc2626; /* Tailwind red-600 */
            color: white;
            padding: 0.5rem;
            border-radius: 0.375rem;
            transition: background 0.3s ease;
        }
        .logout-btn:hover {
            background: #b91c1c; /* Tailwind red-700 */
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
                <button class="menu-btn" data-target="profile" id="profile">Profile</button>
                <x-primary-button onclick="window.location='{{ route('profile.edit') }}'" class="mt-3 w-max">
                    {{ __('Change') }} 
                </x-primary-button>
                <button class="menu-btn" data-target="product-sale">Product For Sale</button>
                <button class="menu-btn" data-target="product-buy">Product Buy</button>
                <button> ABC</button>
                <button class="logout-btn">Logout</button>
            </div>
        </section>
        
        <div id="profile" class="hidden">
            @include('dashboard.change-profile')
        </div>


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

    <div id="profile" class="hidden">
        @include('dashboard.change-profile')
    </div>

    <script>

document.getElementById('profile').addEventListener('click', function() {
            document.getElementById('profile').classList.remove('hidden');
            // document.getElementById('section-b-container').classList.add('hidden');
        });

        

        document.getElementById('profile').classList.remove('hidden');


        const mainContent = document.getElementById('main-content');
        const modalContainer = document.getElementById('modal-container');
        const modalContent = modalContainer.querySelector('.modal-content');

        // Section Content Loaders
        const loadProfileSection = () => {
        const profileSection = document.getElementById("profile");
        if (profileSection) {
            profileSection.classList.remove("hidden");
        }
    };
    
        const loadProductSaleSection = () => {
            mainContent.innerHTML = `
                <h2 class="text-2xl font-bold text-green-700 mb-4">Products For Sale</h2>
                <p>List of products currently on sale.</p>
                <button class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800 mt-4" onclick="showModal('Upload Product', getUploadProductForm())">Upload Product</button>
            `;
        };

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
