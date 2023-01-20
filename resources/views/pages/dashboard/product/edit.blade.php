<x-shop-layout>
    <div class="flex justify-between p-3">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Product &raquo; {{ $product->name }}
        </h2>  
    </div>

    <div class="py-4">
        <!-- show error  -->
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

        <!-- Main form -->
        <div class="flex space-x-6 w-full px-8 py-4 mb-4 bg-white rounded-lg">
            <!-- Image -->
            <div class="w-40 cursor-pointer">
                <form 
                    action="{{ route('dashboard.product.productgallery.store', ['product'=>$product]) }}" 
                    method="post" 
                    enctype="multipart/form-data"
                    class="flex flex-col justify-center" 
                >
                    @csrf
                    <div class="w-full">
                        <input type="file" name="url[]" id="image" accept="image/*" class="hidden" multiple>
                        <label for="image">
                            <img src="https://bit.ly/3ubuq5o" alt="" class="object-cover" id="image-preview" class="-z-30">
                            <div class="w-full py-2 relative bottom-0 bg-black/20 text-white text-center">
                                <span class="font-bold ">+ Add</span>    
                            </div>
                        </label>                        
                    </div>
                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                        Add Image
                </button>
                </form> 
                @if (count($product->galleries) > 0)
                    @foreach ($product->galleries as $image)
                        <h1>Gallery</h1>
                        <div class="flex w-40 overflow-x-scroll my-6">
                            <img src="{{ URL::to('/') }}/images/product/{{$image->url}}" class="h-8" />
                        </div>                                              
                    @endforeach

                @endif
             
            </div>


            <!-- Data Product  -->
            <form class="w-full" action="{{ route('dashboard.shop.product.update', ['shop'=>$shop, 'product'=>$product->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="form-name">
                            Name
                        </label>
                        <input value="{{ old('name') ?? $product->name }}" name="name" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="form-name" type="text" placeholder="Product Name">
                    </div>
                </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="form-categories">
                            Categories
                        </label>
                        <select name="categories_id" id="form-categories" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            <option value="{{ $product->categories_id }}">{{ \App\Models\ProductCategory::find($product->categories_id)->name }}</option>
                            <option disabled>----</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="form-desc">
                            Description
                        </label>
                        <textarea name="desc" id="form-desc" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="Product Description">{{ old('desc') ?? $product->desc }}</textarea>
                    </div>
                </div>
                
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="form-qty">
                            Quantity
                        </label>
                        <input value="{{ old('qty') ?? $product->qty }}" name="qty" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="form-qty" type="number" placeholder="Product Quantity">
                    </div>
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3 text-right">
                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            Update Product
                        </button>
                    </div>
                </div>
            </form>            
        </div>


        <!-- Variant -->
        <div>
            <h1 class="block uppercase tracking-wide text-gray-700 font-bold mb-2" for="form-qty">
                Variants
            </h1> 
            <div class="flex space-x-6">
                <!-- Variants List -->
                @if (count($product->variants) > 0)
                    <div class="flex flex-wrap w-fit px-8 py-4 bg-white rounded-lg">
                        <ul class="list-disc">
                            @foreach ($product->variants as $variant)
                                <li>{{$variant->name}}</li>
                            @endforeach                    
                        </ul>
                    </div>                     
                @endif
  

                <!-- Add Variants -->
                <form 
                    action="{{ route('dashboard.product.productvariant.store', ['product'=>$product->id]) }}" 
                    method="post" 
                    enctype="multipart/form-data"
                    class="w-full px-8 py-4 bg-white rounded-lg"
                >
                    @csrf
                    <div class="flex -mx-3 mb-6">
                        <div class="w-full px-3">
                            <div class="flex space-x-8 mb-2">
                                <input value="{{ old('name') }}" name="name[]" class="appearance-none block bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Product Variant">
                                <a href="#" class="addVariant btn-primary flex items-center text-lg">+</a>
                            </div>
                            <div class="variant"></div>
                        </div>
                    </div>                     
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3 text-right">
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                Add Variant
                            </button>
                        </div>
                    </div>
                </form>                
            </div>
        </div>
    </div>
</x-shop-layout>

<script type="text/javascript">
    function previewBeforeUpload(id){
  document.querySelector("#"+id).addEventListener("change",function(e){
    if(e.target.files.length == 0){
      return;
    }
    let file = e.target.files[0];
    let url = URL.createObjectURL(file);
    document.querySelector("#"+id+"-preview div").innerText = file.name;
    document.querySelector("#"+id+"-preview img").src = url;
  });
}

$('#image').on('change', function(e) {
    if(e.target.files.length == 0) {
        return
    }
    let file = e.target.files[0];
    let url = URL.createObjectURL(file);
    $('#image').html(file);
    $('#image-preview').attr("src", url);
})

    $('.addVariant').on('click', function () {
        addVariantInput();
    })

    function addVariantInput() {
        var variantHTML = '<div class="flex flex-wrap space-x-8 mb-2"> <input value="{{ old('variant_name') }}" name="name[]" class="appearance-none block bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Product Variant" ><a href="#" class="addVariant btn-primary flex items-center text-lg">+</a></div>';
        $('.variant').append(variantHTML);
    }


    
</script>