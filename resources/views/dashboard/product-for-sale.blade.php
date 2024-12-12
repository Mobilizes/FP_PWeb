<x-app-layout>
    <div class="min-w-full p-6 bg-white w-96">
        <h3 class="mb-4 text-xl font-bold text-green-700">Upload Product</h3>
        <form method="POST" action="{{ route("products.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                {{-- <label class="block mb-2 font-bold">Name</label> --}}
                {{-- <input 
                type="text" 
                id="product-name" 
                class="w-full p-2 border rounded" 
                required
                > --}}
                <x-input-label for="name" class="font-bold" :value="__('Name')" />
                <x-text-input id="name" class="w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500" type="text" name="name" required autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />

            </div>
            <div class="mb-4">
                {{-- <label class="block mb-2 font-bold">Description</label>
                <textarea 
                    id="product-description" 
                    class="w-full p-2 border rounded" 
                    rows="3"
                    required
                ></textarea> --}}
                <x-input-label for="description" :value="__('Description')" />
                <textarea id="description" class="block w-full p-2 mt-1 border rounded" name="description"></textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>
            <div class="mb-4">
                {{-- <label class="block mb-2 font-bold">Price</label>
                <input 
                    type="number" 
                    id="product-price" 
                    class="w-full p-2 border rounded" 
                    required
                > --}}
                <x-input-label for="price" :value="__('Price')" />
                <x-text-input id="price" class="block w-full p-2 mt-1" type="number" name="price" required min="1" step="1" autocomplete='0'/>
                <x-input-error :messages="$errors->get('price')" class="mt-2" />
            </div>
            <div class="mb-4">
                {{-- <label class="block mb-2 font-bold">Stock</label>
                <input 
                    type="number" 
                    id="product-stock" 
                    class="w-full p-2 border rounded" 
                    required
                > --}}
                <x-input-label for="stock" :value="__('Stock')" />
                <x-text-input id="stock" class="block w-full p-2 mt-1" type="number" name="stock" required />
                <x-input-error :messages="$errors->get('stock')" class="mt-2" />
            </div>
            <div class="mb-4">
                {{-- <label class="block mb-2 font-bold">Image</label>
                <input 
                    type="file" 
                    id="product-image" 
                    class="w-full p-2 border rounded"
                    accept="image/*"
                > --}}
                <x-input-label for="image" :value="__('Image')" />
                <x-text-input id="image" class="block w-full mt-1" type="file" name="image" />
                <x-input-error :messages="$errors->get('image')" class="mt-2" />
            </div>
            <div class="flex justify-between">
                <button 
                    type="button" 
                    class="px-4 py-2 text-white bg-red-600 rounded hover:bg-red-700"
                    id="close-upload-modal"
                >
                    Cancel
                </button>
                <button 
                    type="submit" 
                    class="px-4 py-2 text-white bg-green-700 rounded hover:bg-green-800"
                >
                    Upload
                </button>
            </div>
        </form>
    </div>
</x-app-layout>