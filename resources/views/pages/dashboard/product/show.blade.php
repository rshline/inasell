<x-shop-layout>
    <p>{{ $product->name }}</p>
    <p>{{ $product->desc }}</p>
    <p>{{ $product->productcategory->name }}</p>

    <h1>Galeri</h1>
    <p>{{ $product->galleries }}</p>

    <h1>Variants</h1>
    <ul class="list-disc">
        @if (count($product->variants) > 0)
            @foreach ($product->variants as $variant)
                <li>{{$variant->name}}</li>
            @endforeach
        @endif                        
    </ul>
</x-shop-layout>