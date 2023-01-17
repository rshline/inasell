<x-shop-layout>
    <h2 class="font-semibold text-xl p-3">
        {{ __('Add product to order') }}
    </h2>
    <div class="p-3 flex flex-col space-y-5">
      @foreach ($products as $product)
        <div class="grid grid-cols-2 p-2 w-full bg-white rounded">
          <div>
            <h1 class="text-xl">{{ $product->name }}</h1>
            <p class="font-mono">{{ $product->productcategory->name }}</p>                  
          </div>
          <div class="flex justify-end mx-2 my-1">
            <form class="flex space-x-2" action="{{ route('dashboard.shop.order.orderitem.store', ['shop'=>$shop, 'order'=>$order, 'product'=>$product->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <input name="orders_id" type="hidden" value="{{$order}}">
                <input name="products_id" type="hidden" value="{{$product->id}}">
                <input name="qty" type="number" min="0" class="text-center w-12 p-0" value="1"></input>
                <button type="submit" class="btn-primary">
                  Add
                </button>
            </form>              
          </div>
        </div>
      @endforeach
    </div>
</x-shop-layout>
