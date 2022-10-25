<x-app-layout>
    <div class="bg-white mt-5 min-h-full">
        <div class="m-3 p-3 rounded shadow-lg flex justify-between align-middle">
            <h2 class="font-semibold text-xl">
                {{ __('Product') }}
            </h2>
            <a href="{{ route('dashboard.addProduct') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded shadow-lg">
                + Add Product
            </a>
        </div>

        <div class="flex m-3 p-3">
            @foreach($products as $product)
            <div class="flex-1 m-3 p-3 w-2/6 rounded shadow-lg">
                <h3 class="font-semibold text-gray-800">
                    {{ $product->name }}
                </h3>
                <a href="{{ route('dashboard.showProduct') }}" class="">
                    Show Details
                </a>
            </div>
            @endforeach 
        </div>
    </div>
</x-app-layout>
