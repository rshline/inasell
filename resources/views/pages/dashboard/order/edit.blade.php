<x-shop-layout>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Edit Order
    </h2>

    <div class="my-4 max-w-7xl mx-auto">
        <div>
            @if ($errors->any())
                <div class="mb-5" role="alert">
                    <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                        There's something wrong!
                    </div>
                    <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                        <p>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        </p>
                    </div>
                </div>
            @endif
            <form class="w-full" action="{{ route('dashboard.shop.order.update', ['shop'=>$shop, 'order'=>$order->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="flex flex-wrap mb-6">
                    <div class="w-full">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                            Status
                        </label>
                        <select name="status" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name">
                            <option value="{{ $order->status }}">{{ $order->status }}</option>
                            <option disabled>-------</option>
                            <option value="PENDING">PENDING</option>
                            <option value="PROCESSED">PROCESSED</option>
                            <option value="DELIVERED">DELIVERED</option>
                            <option value="SUCCESS">SUCCESS</option>
                            <option value="CANCELLED">CANCELLED</option>
                        </select>
                    </div>
                </div>
                <div class="flex flex-wrap mb-6">
                    <div class="w-full text-right">
                        <button type="submit" class="border border-transparent rounded font-semibold tracking-wide text-lg md:text-sm px-5 py-3 md:py-2 focus:outline-none focus:shadow-outline bg-indigo-600 text-gray-100 hover:bg-indigo-800 hover:text-gray-200 transition-all duration-300 ease-in-out my-4 md:my-0 w-full md:w-auto">
                            Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div>
        <h3 class="font-bold mb-4">Order Items</h3>
        <div class="grid grid-cols-2 gap-4">
            <!-- Items -->
            @foreach ($order->items as $item)
                <div class="flex px-4 py-2 justify-between bg-white rounded-lg items-center">
                    <p>{{ $item->product->name }}</p>
                    <div class="flex spacex-2">
                        <p>{{ $item->qty }} item(s)</p>  
                        <form class="inline-block" action="{{ route('dashboard.shop.order.orderitem.destroy',  ['shop'=>$shop, 'order'=>$order, 'orderitem'=>$item]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                                <button type="submit">
                                    <iconify-icon  icon="ic:round-delete-forever"></iconify-icon>
                                </button>
                        </form>                               
                    </div>
     
                </div>  
            @endforeach
        </div>
    </div>
</x-shop-layout>
