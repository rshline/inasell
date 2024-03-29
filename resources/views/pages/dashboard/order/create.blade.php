<x-shop-layout>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight p-3">
        Create Order
    </h2>

    <div class="p-3">
        <div class="max-w-7xl mx-auto">
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
                <form class="w-full" action="{{ route('dashboard.shop.order.store', ['shop'=>$shop]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-wrap">
                        <div class="w-full px-3 mb-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                Customer Name
                            </label>
                            <input value="{{ old('customer_name') }}" name="customer_name" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Customer Name">
                        </div>
                        <div class="w-full px-3 mb-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                Notes
                            </label>
                            <input value="{{ old('notes') }}" name="notes" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Notes">
                        </div>
                        <div class="w-full px-3 mb-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                                Status
                            </label>
                            <select name="status" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name">
                                <option disabled>-------</option>
                                <option value="PENDING">PENDING</option>
                                <option value="PROCESSED">PROCESSED</option>
                                <option value="DELIVERED">DELIVERED</option>
                                <option value="SUCCESS">SUCCESS</option>
                                <option value="CANCELLED">CANCELLED</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex flex-wrap mx-3 mb-6">
                        <div class="w-full px-3 text-right">
                            <button type="submit" class="btn-primary">
                                Add
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-shop-layout>
