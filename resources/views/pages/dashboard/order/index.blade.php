<x-shop-layout>
    <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl">
            {{ __('Order') }}
        </h2>
        <a href="{{ route('dashboard.shop.order.create', $shop) }}" class="btn-primary">
            + Add
        </a>        
    </div>
    <div class="my-3">
        <form action="{{ route('dashboard.shop.order.index', $shop) }}" method="get" class="flex w-full justify-between">
            @csrf
            <select name="status" class="h-fit">
                <option value="" {{(isset($_GET['status']) && $_GET['status'] == '')?'selected': ''}}>---</option>
                <option value="PENDING" {{(isset($_GET['status']) && $_GET['status'] == 'PENDING')?'selected': ''}}>PENDING</option>
                <option value="PROCESSED" {{(isset($_GET['status']) && $_GET['status'] == 'PROCESSED')?'selected': ''}}>PROCESSED</option>
                <option value="DELIVERED" {{(isset($_GET['status']) && $_GET['status'] == 'DELIVERED')?'selected': ''}}>DELIVERED</option>
                <option value="SUCCESS" {{(isset($_GET['status']) && $_GET['status'] == 'SUCCESS')?'selected': ''}}>SUCCESS</option>
                <option value="CANCELLED" {{(isset($_GET['status']) && $_GET['status'] == 'CANCELLED')?'selected': ''}}>CANCELLED</option>
            </select>
            <button type="submit" class="btn-primary">Filter</button>
        </form>
    </div>
    <div class="max-w-7xl mx-auto flex flex-wrap">

        @foreach ($orders as $order)
        
            @if ($order->status == 'SUCCESS') 
                @php($status_color = "bg-green-300 text-green-900")
            @elseif ($order->status == 'CANCELLED')
                @php($status_color = "bg-red-300 text-red-900")
            @else
                @php($status_color = "bg-yellow-300 text-yellow-900")
            @endif

            <div class="mt-4 relative w-full overflow-hidden">
                <div class="px-6 py-4 bg-white rounded drop-shadow-md w-full">
                    <div class="flex justify-between">
                        <div>
                            <!-- <a href="{{ route('dashboard.shop.order.show', ['shop'=>$shop, 'order'=>$order->id]) }}" class="font-black"> -->
                            <h1 class="font-bold">{{ $order->customer_name }}</h1>
                            <!-- </a> -->
                        </div>
                        <div class="flex">
                            <a href="" class="border border-transparent text-sm p-1 mr-2 {{$status_color}}">
                                {{ $order->status }}
                            </a>
                            <iconify-icon 
                                icon="material-symbols:expand-circle-down-outline-rounded"
                                class="mt-1 transition-transform duration-500 cursor-pointer"
                                id="open-{{$order->id}}" 
                                href="#" 
                                onclick="$('.items-{{$order->id}}').slideToggle(
                                    function(){
                                        $('#open-{{$order->id}}')
                                        .toggleClass('rotate')
                                    });"
                            ></iconify-icon>
                            <!-- </a> -->
                        </div>
                    </div>
                    <div>
                        <p class="font-sans"><b>Notes:</b> {{ $order->notes }}</p>
                    </div>
                    <div class="flex w-full justify-between">
                        <div>
                            <p>Last Update: {{ date_format($order->updated_at , "d M Y") }}</p>
                        </div>
                        <div>
                            <a href="{{ route('dashboard.shop.order.orderitem.create', ['shop'=>$shop, 'order'=>$order->id]) }}">
                                <iconify-icon icon="material-symbols:add-circle-outline-rounded" class="mr-3"></iconify-icon>
                            </a>
                            <a href="{{ route('dashboard.shop.order.edit', ['shop'=>$shop, 'order'=>$order->id]) }}">
                                <iconify-icon icon="material-symbols:edit-outline-rounded"></iconify-icon>
                            </a>                            
                        </div>

                    </div>
                </div>
            </div>

            <!-- Order Items -->
            @foreach ($order->items as $item)
                <div class="items-{{$order->id}} mt-2 mx-2 px-4 py-2 flex bg-white overflow-hidden rounded drop-shadow-md w-full justify-between">
                    <a href="{{ route('dashboard.shop.product.show', ['shop'=>$shop, 'product'=>$item->product->id]) }}">{{ $item->product->name }}</a>
                    <p><b>{{ $item->qty }} </b>items</p>
                </div>            
            @endforeach
        @endforeach
    </div>

    <div class="my-4">
        {{ $orders->links() }}
    </div>
</x-shop-layout>
