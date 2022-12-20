<x-shop-layout>
    <div class="p-3 flex justify-between">
        <h2 class="font-semibold text-xl">
            {{ __('Order') }}
        </h2>
        <a href="{{ route('dashboard.shop.order.create', $shop) }}" class="border border-transparent rounded font-semibold tracking-wide text-lg md:text-sm px-5 py-3 md:py-2 focus:outline-none focus:shadow-outline bg-indigo-600 text-gray-100 hover:bg-indigo-800 hover:text-gray-200 transition-all duration-300 ease-in-out my-4 md:my-0 w-full md:w-auto">
            + Add
        </a>        
    </div>
    <div class="max-w-7xl mx-auto p-3 flex flex-wrap">
        @foreach ($orders as $order)
            <div class="mt-4 relative w-full overflow-hidden">
                <div class="px-6 py-4 bg-white rounded drop-shadow-md w-full">
                    <div class="flex justify-between">
                        <div>
                            <!-- <a href="{{ route('dashboard.shop.order.show', ['shop'=>$shop, 'order'=>$order->id]) }}" class="font-black"> -->
                            <h1 class="font-bold">{{ $order->customer_name }}</h1>
                            <!-- </a> -->
                        </div>
                        <div class="flex">
                            <a href="" class="border border-transparent text-sm p-1 mr-2 bg-yellow-300 text-yellow-900">
                                {{ $order->status }}
                            </a>
                            <iconify-icon 
                                icon="material-symbols:expand-circle-down-outline-rounded"
                                class="transition-transform duration-500 rotate-0 mt-1"
                            ></iconify-icon>
                        </div>
                    </div>
                    <div>
                        <p class="font-sans"><b>Notes:</b> {{ $order->notes }}</p>
                    </div>
                    <div class="flex w-full justify-end">
                        <a href="{{ route('dashboard.shop.order.orderitem.create', ['shop'=>$shop, 'order'=>$order->id]) }}">
                            <iconify-icon icon="material-symbols:add-circle-outline-rounded" class="mr-3"></iconify-icon>
                        </a>
                        <a href="{{ route('dashboard.shop.order.edit', ['shop'=>$shop, 'order'=>$order->id]) }}">
                            <iconify-icon icon="material-symbols:edit-outline-rounded"></iconify-icon>
                        </a>
                    </div>
                </div>
            </div>
            @foreach ($order->items as $item)
                <div class="mt-2 mx-2 px-4 py-2 flex bg-white overflow-hidden rounded drop-shadow-md w-full justify-between">
                    <h2>{{ $item->product->name }}</h2>
                    <p><b>{{ $item->qty }} </b>items</p>
                </div>            
            @endforeach
        @endforeach
    </div>
</x-shop-layout>
