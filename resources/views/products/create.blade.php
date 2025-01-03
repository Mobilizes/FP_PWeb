<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          {{ __('Create Product') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900 dark:text-gray-100">
                  <div class="m-2 p-2"> 
                    @foreach ($products as $product)
                      <h2>{{ $product->name }}</h2>
                      <div class="p-2 m-2 w-72">
                        <img src="{{ Storage::url($product->image_path) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                        <p class="text-sm">{{ $product->description }}</p>
                        <p class="text-sm">{{ $product->price }}</p>
                        <p class="text-sm">{{ $product->stock }}</p>
                      </div>
                    @endforeach
                  </div>
                  <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                      @csrf
                      <div class="mb-4">
                          <x-input-label for="name" :value="__('Name')" />
                          <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" required autofocus />
                          <x-input-error :messages="$errors->get('name')" class="mt-2" />
                      </div>

                      <div class="mb-4">
                          <x-input-label for="price" :value="__('Price')" />
                          <x-text-input id="price" class="block mt-1 w-full" type="number" name="price" required />
                          <x-input-error :messages="$errors->get('price')" class="mt-2" />
                      </div>

                      <div class="mb-4">
                          <x-input-label for="description" :value="__('Description')" />
                          <textarea id="description" class="block mt-1 w-full" name="description"></textarea>
                          <x-input-error :messages="$errors->get('description')" class="mt-2" />
                      </div>

                      <div class="mb-4">
                          <x-input-label for="stock" :value="__('Stock')" />
                          <x-text-input id="stock" class="block mt-1 w-full" type="number" name="stock" required />
                          <x-input-error :messages="$errors->get('stock')" class="mt-2" />
                      </div>

                      <div class="mb-4">
                          <x-input-label for="image" :value="__('Image')" />
                          <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" />
                          <x-input-error :messages="$errors->get('image')" class="mt-2" />
                      </div>

                      <div class="flex items-center justify-end mt-4">
                          <x-primary-button class="ml-4">
                              {{ __('Create Product') }}
                          </x-primary-button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>