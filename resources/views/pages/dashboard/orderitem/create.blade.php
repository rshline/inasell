<x-shop-layout>
    <h2 class="font-semibold text-xl p-3">
        {{ __('Add product to order') }}
    </h2>
    <div class="p-3 flex flex-col">
      @foreach ($products as $product)
        <div class="p-2 w-full bg-white rounded ">
          <div class="flex">
            <div class="flex-1">
              <h1 class="text-xl">{{ $product->name }}</h1>
              <p class="font-mono">{{ $product->productcategory->name }}</p>                  
            </div>
            <form class="flex flex-1" action="{{ route('dashboard.shop.order.orderitem.store', ['shop'=>$shop, 'order'=>$order, 'product'=>$product->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <input name="orders_id" type="hidden" value="{{$order}}">
                <input name="products_id" type="hidden" value="{{$product->id}}">
                <div class="custom-number-input rounded bg-slate-400 p-2">
                  <div class="flex flex-row h-10 rounded-lg relative bg-transparent mt-1">
                    <button data-action="decrement" class=" bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer outline-none">
                      <span class="m-auto text-2xl font-thin">−</span>
                    </button>
                    <input name="qty" type="number" min="0" class="px-2 max-w-10 text-center appearance-none outline-none text-gray-800 bg-transparent" value="0"  ></input>
                    <button data-action="increment" class="bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer">
                      <span class="m-auto text-2xl font-thin">+</span>
                    </button>
                  </div>
                </div>
                <button type="submit" class="border border-transparent rounded font-semibold tracking-wide text-lg md:text-sm px-5 py-3 md:py-2 focus:outline-none focus:shadow-outline bg-indigo-600 text-gray-100 hover:bg-indigo-800 hover:text-gray-200 transition-all duration-300 ease-in-out my-4 md:my-0 md:w-auto">
                  Add
                </button>
            </form>
          </div>

        </div>
      @endforeach
    </div>
</x-shop-layout>

<script>
  function decrement(e) {
    const btn = e.target.parentNode.parentElement.querySelector(
      'button[data-action="decrement"]'
    );
    const target = btn.nextElementSibling;
    let value = Number(target.value);
    value--;
    target.value = value;
  }

  function increment(e) {
    const btn = e.target.parentNode.parentElement.querySelector(
      'button[data-action="decrement"]'
    );
    const target = btn.nextElementSibling;
    let value = Number(target.value);
    value++;
    target.value = value;
  }

  const decrementButtons = document.querySelectorAll(
    `button[data-action="decrement"]`
  );

  const incrementButtons = document.querySelectorAll(
    `button[data-action="increment"]`
  );

  decrementButtons.forEach(btn => {
    btn.addEventListener("click", decrement);
  });

  incrementButtons.forEach(btn => {
    btn.addEventListener("click", increment);
  });
</script>
