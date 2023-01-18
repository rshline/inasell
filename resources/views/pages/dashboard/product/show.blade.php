<x-shop-layout>
    <p>{{ $product->name }}</p>
    <p>{{ $product->desc }}</p>
    <p>{{ $product->productcategory->name }}</p>

    <h1>Galeri</h1>
    <p>{{ $product->galleries }}</p>

    <h1>Variants</h1>
    <p>{{ $product->variants }}</p>
</x-shop-layout>