<x-shop-layout>
    <div class="flex space-x-6 justify-between bg-white rounded-lg px-8 py-4">
        <!-- left -->        
        <div class="flex flex-col space-y-5">
            <div>
                <p class="text-xl font-bold">{{ $product->name }}</p>
                <p class="font-bold">{{ $product->productcategory->name }}</p>                
            </div>

            <div>
                <h3 class="font-bold">Description:</h3>
                <p>{{ $product->desc }}</p>    
            </div>
            
            @if (count($product->variants) > 0)
            <div >
                <h3 class="font-bold">Variants: </h3>
                <ul class="list-disc list-inside">
                    @foreach ($product->variants as $variant)
                        <li>{{$variant->name}}</li>
                    @endforeach                 
                </ul>        
            </div>
            @endif             
        </div>
        <!-- Right -->
        @if (count($product->galleries) > 0)
        <div>
            <h1>Gallery</h1>
            <div>
                @foreach ($product->galleries as $image)
                    <img src="{{ URL::to('/') }}/images/product/{{$image->url}}" class="w-20" />
                @endforeach               
            </div>       
        </div>
        @endif          
    </div>



</x-shop-layout>