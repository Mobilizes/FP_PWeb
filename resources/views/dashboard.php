<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-50 text-gray-800">

    <!-- Header -->
    <header class="bg-green-700 text-white py-4">
        <div class="container mx-auto flex justify-between  px-4 items-center">
            <h1 class="text-xl font-bold">ecoswap Dashboard</h1>
            <button class="bg-red-600 px-4 py-2 rounded hover:bg-red-700">Logout</button>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto py-8 flex gap-4">
        <!-- Profile Section -->
        <section class="bg-white basis-1/5 rounded shadow-lg p-6 mb-6">
            <h2 class="text-2xl font-bold text-green-700 mb-4">Profile</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <p><strong>Name:</strong> John Doe</p>
                    <p><strong>Email:</strong> john.doe@example.com</p>
                    <p><strong>Address:</strong> 123 Green Street, EcoCity</p>
                    <p><strong>Phone:</strong> +62 812 3456 7890</p>
                    <p><strong>Points:</strong> <span class="text-green-700 font-bold">1500</span></p>
                </div>
            </div>
        </section>

      
        <!-- Product List Section -->
        <section class="bg-white rounded shadow-lg p-6">
            <h2 class="text-2xl font-bold text-green-700 mb-4">Products for Sale</h2>
            <table class="table-auto w-full">
                <thead>
                    <tr class="bg-green-100">
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Description</th>
                        <th class="px-4 py-2">Price</th>
                        <th class="px-4 py-2">Stock</th>
                        <th class="px-4 py-2">Status</th>
                    </tr>
                </thead>
                <tbody id="product-list">
                    <!-- Dynamic Product Rows -->
                </tbody>
            </table>
              <!-- Upload Product Section -->
        <section class="mb-6">
            <button 
                class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800"
                id="open-upload-modal"
            >
                Upload Product
            </button>
        </section>

        </section>

        <section>
            <div class="mb-4">
                <button id="tab-shipping" class="tab-button active">Barang Sedang Dikirim</button>
                <button id="tab-completed" class="tab-button">Selesai</button>
                <button id="tab-rated" class="tab-button">Sudah Dinilai</button>
            </div>
            <!-- Tab Content -->
            <div id="content-shipping" class="tab-content">
                <h3 class="text-xl font-bold text-green-700 mb-4">Barang Sedang Dikirim</h3>
                <ul class="list-disc pl-6">
                    <li>Order #123 - Kursi Kayu Bekas - Dalam Pengiriman</li>
                    <li>Order #124 - Laptop Second - Dalam Pengiriman</li>
                </ul>
            </div>
            <div id="content-completed" class="tab-content hidden">
                <h3 class="text-xl font-bold text-green-700 mb-4">Barang Selesai</h3>
                <ul class="list-disc pl-6">
                    <li>Order #122 - Panci Stainless - Tiba pada 20 Nov 2024</li>
                </ul>
            </div>
            <div id="content-rated" class="tab-content hidden">
                <h3 class="text-xl font-bold text-green-700 mb-4">Barang Sudah Dinilai</h3>
                <ul class="list-disc pl-6">
                    <li>Order #120 - Rak Besi - Dinilai pada 15 Nov 2024</li>
                </ul>
            </div>
        </section>

    </main>

    <footer class="bg-green-700 text-white py-4 text-center">
        <p>&copy; 2024 ecoswap. All rights reserved.</p>
    </footer>

    <!-- Upload Product Modal -->
    <div 
        id="upload-modal" 
        class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden"
    >
        <div class="bg-white rounded shadow-lg w-96 p-6">
            <h3 class="text-xl font-bold text-green-700 mb-4">Upload Product</h3>
            <form id="upload-form">
                <div class="mb-4">
                    <label class="block font-bold mb-2">Name</label>
                    <input 
                        type="text" 
                        id="product-name" 
                        class="w-full border rounded p-2" 
                        required
                    >
                </div>
                <div class="mb-4">
                    <label class="block font-bold mb-2">Description</label>
                    <textarea 
                        id="product-description" 
                        class="w-full border rounded p-2" 
                        rows="3"
                        required
                    ></textarea>
                </div>
                <div class="mb-4">
                    <label class="block font-bold mb-2">Price</label>
                    <input 
                        type="number" 
                        id="product-price" 
                        class="w-full border rounded p-2" 
                        required
                    >
                </div>
                <div class="mb-4">
                    <label class="block font-bold mb-2">Stock</label>
                    <input 
                        type="number" 
                        id="product-stock" 
                        class="w-full border rounded p-2" 
                        required
                    >
                </div>
                <div class="mb-4">
                    <label class="block font-bold mb-2">Image</label>
                    <input 
                        type="file" 
                        id="product-image" 
                        class="w-full border rounded p-2"
                        accept="image/*"
                    >
                </div>
                <div class="flex justify-between">
                    <button 
                        type="button" 
                        class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700"
                        id="close-upload-modal"
                    >
                        Cancel
                    </button>
                    <button 
                        type="submit" 
                        class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800"
                    >
                        Upload
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Modal Logic
        const uploadModal = document.getElementById('upload-modal');
        const openUploadModal = document.getElementById('open-upload-modal');
        const closeUploadModal = document.getElementById('close-upload-modal');

        openUploadModal.addEventListener('click', () => {
            uploadModal.classList.remove('hidden');
        });

        closeUploadModal.addEventListener('click', () => {
            uploadModal.classList.add('hidden');
        });

        // Handle Form Submission
        const uploadForm = document.getElementById('upload-form');
        const productList = document.getElementById('product-list');

        uploadForm.addEventListener('submit', (e) => {
            e.preventDefault();

            const name = document.getElementById('product-name').value;
            const description = document.getElementById('product-description').value;
            const price = document.getElementById('product-price').value;
            const stock = document.getElementById('product-stock').value;

            const status = stock > 0 ? 'Available' : 'Out of Stock';

            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td class="border px-4 py-2">${name}</td>
                <td class="border px-4 py-2">${description}</td>
                <td class="border px-4 py-2">$${price}</td>
                <td class="border px-4 py-2">${stock}</td>
                <td class="border px-4 py-2">${status}</td>
            `;

            productList.appendChild(newRow);
            uploadModal.classList.add('hidden');
            uploadForm.reset();
        });
    </script>

<script>
        const tabs = document.querySelectorAll('.tab-button');
        const contents = document.querySelectorAll('.tab-content');
        tabs.forEach((tab, index) => {
            tab.addEventListener('click', () => {
                // Reset active class
                tabs.forEach(t => t.classList.remove('active'));
                contents.forEach(c => c.classList.add('hidden'));
                // Activate current tab
                tab.classList.add('active');
                contents[index].classList.remove('hidden');
            });
        });
        // Add active style
        document.querySelector('.tab-button.active').style.cssText = `
            border-bottom: 2px solid green;
            color: green;
        `;
    </script>
    <style>
        .tab-button {
            padding: 8px 16px;
            background: #e8f5e9;
            margin-right: 4px;
            border-radius: 4px;
            cursor: pointer;
        }
        .tab-button:hover {
            background: #c8e6c9;
        }
        .tab-button.active {
            border-bottom: 2px solid green;
            color: green;
        }
        .tab-content {
            padding: 16px;
            background: white;
            border-radius: 4px;
        }
    </style>

</body>
</html>
