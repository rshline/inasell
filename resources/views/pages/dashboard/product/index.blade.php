<x-app-layout>
    <div class="bg-white mt-5 min-h-full">
        <div class="m-3 p-3 rounded shadow-lg flex justify-between align-middle">
            <h2 class="font-semibold text-xl">
                {{ __('Product') }}
            </h2>
            <a href="{{ route('dashboard.product.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded shadow-lg">
                + Add Product
            </a>
        </div>

        <form class="row g-3" method="GET">
            <div class="col-auto">
                <select name="city" class="form-select">
                    <option value="" selected>All</option>
                    @foreach ($productcategories as $productcategory)
                    <option value="{{ $productcategory->name }}" {{ request('productcategory') === $productcategory->name ? 'selected' : null }}>
                        {{ $productcategory->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-auto">
                <input name="keyword" value="{{ request('keyword') }}" type="search" class="form-control"
                    placeholder="Search...">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">Search</button>
            </div>
        </form>

        <div class="flex m-3 p-3">
            @forelse($products as $product)
                <div class="flex-1 m-3 p-3 w-2/6 rounded shadow-lg">
                    <h3 class="font-semibold text-gray-800">
                        {{ $product->name }}
                    </h3>
                    <a href="{{ route('dashboard.product.show') }}" class="">
                        Show Details
                    </a>
                </div>
            @empty
                <h4>No product found.</h4>
            @endforelse 
        </div>

        @if ($stores->hasPages())
            <div class="row">
                <div class="col">
                    {{ $stores->links('pagination::bootstrap-4') }}
                </div>
            </div>
        @endif

    </div>
</x-app-layout>
