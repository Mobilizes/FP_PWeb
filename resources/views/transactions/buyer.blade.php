<x-app-layout>
    <div class="container mx-auto py-8">
        <h2 class="text-2xl font-bold mb-6">Transactions Buy</h2>

        @foreach ($inProgressTransactions as $transaction)
            <div class="bg-white shadow-md rounded-lg p-6 mb-4">
                <h3 class="text-xl font-semibold mb-2">Transaction ID: {{ $transaction->id }}</h3>
                <p>Status: {{ $transaction->status }}</p>
                <p>Created At: {{ $transaction->created_at }}</p>
                <p>Updated At: {{ $transaction->updated_at }}</p>

                <h4 class="text-lg font-semibold mt-4">Products:</h4>
                <ul class="list-disc pl-6">
                    @foreach ($transaction->cart->products as $product)
                        <li>
                            {{ $product->name }} - Quantity: {{ $product->pivot->quantity }} - Price: {{ $product->price }}
                        </li>
                    @endforeach
                </ul>

                <div class="mt-4">
                    <form method="POST" action="{{ route('transactions.buyerConfirm', $transaction->id) }}" class="inline-block">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Confirm</button>
                    </form>
                </div>
            </div>
        @endforeach

        @foreach ($pendingTransactions as $transaction)
            <div class="bg-white shadow-md rounded-lg p-6 mb-4">
                <h3 class="text-xl font-semibold mb-2">Transaction ID: {{ $transaction->id }}</h3>
                <p>Status: {{ $transaction->status }}</p>
                <p>Created At: {{ $transaction->created_at }}</p>
                <p>Updated At: {{ $transaction->updated_at }}</p>

                <h4 class="text-lg font-semibold mt-4">Products:</h4>
                <ul class="list-disc pl-6">
                    @foreach ($transaction->cart->products as $product)
                        <li>
                            {{ $product->name }} - Quantity: {{ $product->pivot->quantity }} - Price: {{ $product->price }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>
</x-app-layout>