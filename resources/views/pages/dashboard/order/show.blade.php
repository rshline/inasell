<x-shop-layout>
    <h2 class="font-semibold text-xl p-3">
        {{ __('Order') }}
    </h2>
    <div class="p-3 flex justify-end">
        <a href="{{ route('dashboard.shop.order.create', $shop) }}" class="border border-transparent rounded font-semibold tracking-wide text-lg md:text-sm px-5 py-3 md:py-2 focus:outline-none focus:shadow-outline bg-indigo-600 text-gray-100 hover:bg-indigo-800 hover:text-gray-200 transition-all duration-300 ease-in-out my-4 md:my-0 w-full md:w-auto">
            + Add
        </a>        
    </div>
</x-shop-layout>
