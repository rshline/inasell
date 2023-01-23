<x-shop-layout>
    <h1 class="text-xl font-bold mb-6">{{ $item->name }}</h1>
    @foreach ($item->products as $product)
        <div class="flex space-x-8 mb-4 items-center">
            @if (count($product->galleries)>0)
                <img src="{{ URL::to('/') }}/images/product/{{ $product->galleries->first()->url }}" class="w-16" />
            @else 
                <img src="https://bit.ly/3ubuq5o" class="w-16" />
            @endif
            <a href="{{ route('dashboard.shop.product.show', ['shop'=>$item->shops_id, 'product'=>$product->id]) }}" class="hover:font-bold">{{ $product->name }}</a>
        </div>    
    @endforeach
</x-shop-layout>