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
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">ecoswap Dashboard</h1>
            <button class="bg-red-600 px-4 py-2 rounded hover:bg-red-700">Logout</button>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto py-8">
        <!-- Profile Section -->
        <section class="bg-white rounded shadow-lg p-6 mb-6">
            <h2 class="text-2xl font-bold text-green-700 mb-4">Profile</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <p><strong>Name:</strong> John Doe</p>
                    <p><strong>Email:</strong> john.doe@example.com</p>
                    <p><strong>Address:</strong> 123 Green Street, EcoCity</p>
                </div>
                <div>
                    <p><strong>Phone:</strong> +62 812 3456 7890</p>
                    <p><strong>Points:</strong> <span class="text-green-700 font-bold">1500</span></p>
                </div>
            </div>
        </section>

        <!-- Tabs Section -->
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
