<x-shop-layout>
    @foreach ($item->products as $product)
        <p>{{ $product->name }}</p>
    @endforeach
</x-shop-layout>