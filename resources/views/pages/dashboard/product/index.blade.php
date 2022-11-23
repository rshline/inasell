<x-shop-layout>
    <h2 class="font-semibold text-xl p-3">
        {{ __('Product') }}
    </h2>
    <div class="p-3 flex justify-end">
        <a href="{{ route('dashboard.shop.product.create', $shop) }}" class="border border-transparent rounded font-semibold tracking-wide text-lg md:text-sm px-5 py-3 md:py-2 focus:outline-none focus:shadow-outline bg-indigo-600 text-gray-100 hover:bg-indigo-800 hover:text-gray-200 transition-all duration-300 ease-in-out my-4 md:my-0 w-full md:w-auto">
            + Add Product
        </a>        
    </div>

    <x-slot name="script">
        <script>
            // AJAX DataTable
            var datatable = $('#crudTable').DataTable({
                ajax: {
                    url: '{!! url()->current() !!}',
                },
                columns: [
                    { data: 'name', name: 'name' },
                    { data: 'productcategory.name', name: 'productcategory.name' },
                    { data: 'qty', name: 'qty', width: '5%' },
                    {
                        data: 'action',
                        name: 'action',
                        orderable:  false,
                        searchable: false,
                        width: '30%'
                    },
                ],
            });
        </script>
    </x-slot>

    <div class="p-3">
        <div class="max-w-7xl mx-auto">
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <table id="crudTable">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Categories</th>
                            <th>Qty</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-shop-layout>
