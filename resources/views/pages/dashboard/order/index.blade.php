<x-shop-layout>
    <h2 class="font-semibold text-xl p-3">
        {{ __('Order') }}
    </h2>
    <div class="p-3 flex justify-end">
        <a href="{{ route('dashboard.shop.order.create', $shop) }}" class="border border-transparent rounded font-semibold tracking-wide text-lg md:text-sm px-5 py-3 md:py-2 focus:outline-none focus:shadow-outline bg-indigo-600 text-gray-100 hover:bg-indigo-800 hover:text-gray-200 transition-all duration-300 ease-in-out my-4 md:my-0 w-full md:w-auto">
            + Add
        </a>        
    </div>
    <div class="max-w-7xl mx-auto p-3 flex flex-wrap">
        @foreach ($orders as $order)
            <div class="px-6 py-4 bg-white rounded drop-shadow-md w-full">
                <div class="flex justify-between">
                    <a href="{{ route('dashboard.shop.order.show', ['shop'=>$shop, 'order'=>$order->id]) }}" class="font-black">
                        {{ $order->customer_name }}
                    </a>
                    <a href="" class="border border-transparent text-sm p-1 bg-yellow-300 text-yellow-900">
                        {{ $order->status }}
                    </a>  
                </div>
                <p class="font-sans"><b>Notes:</b> {{ $order->notes }}</p>
            </div>
        @endforeach
    </div>
</x-shop-layout>
