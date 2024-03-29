<x-shop-layout>
    <div class="flex justify-between p-3 mb-6">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product') }}
        </h2>
        <a href="{{ route('dashboard.shop.product.create', $shop) }}" class="btn-primary">
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
