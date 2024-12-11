<x-app-layout>
    <div>
        <h2 class="mb-4 text-2xl font-bold text-green-700">Products For Sale</h2>
        <p>List of products currently on sale.</p>
        <button class="px-4 py-2 mt-4 text-white bg-green-700 rounded hover:bg-green-800" onclick="showModal('Upload Product', getUploadProductForm())">Upload Product</button>
        
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
                    <img src="{{ Storage::url($product->image_path) }}" alt="{{ $product->name }}" class="mx-auto mb-4">
                    <h3 class="text-lg font-bold">{{ $product->name }}</h3>
                    <p class="text-gray-600">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    <p class="text-gray-600"> Stock {{ number_format($product->stock, 0, ',', '.') }}</p>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>