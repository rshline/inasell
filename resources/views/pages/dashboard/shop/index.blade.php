<x-app-layout>
    <div class="flex flex-col p-6 mx-auto">
        <h2 class="font-semibold text-3xl text-gray-600 leading-tight mx-2 mb-4">
            {{ __('Your Shop') }}
        </h2>
        <div class="flex justify-end space-x-4 my-3">
            <a href="{{ route('dashboard.shoplist.create') }}" class="btn-primary">
                Join Shop
            </a> 
            <a href="{{ route('dashboard.shop.create') }}" class="btn-primary">
                + Create New Shop
            </a>       
        </div>
        
        @if (count($shops) > 0)
            <div class="grid grid-cols-4 gap-4 my-3">
                @foreach ($shops as $shop)
                    <div class="flex flex-col items-center justify-center p-3 bg-white rounded-md shadow-xl border-l-4 border-purple-300">
                        <h5 class="text-gray-900 text-xl leading-tight font-medium mb-2">{{ $shop->name }}</h5>
                        <a href="{{ route('dashboard.shop.show', $shop->id) }}" class="btn-primary">
                            Manage
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center my-6">
                <p>You don't have a shop yet.</p>
            </div>
        @endif

        @if (count($pending_shops) > 0)
            <h1 class="text-gray-900 text-xl leading-tight font-medium mb-2">Pending</h1>
            <div class="grid grid-cols-4 gap-4 my-3">
                @foreach ($pending_shops as $shop)
                    <div class="flex flex-col items-center justify-center p-3 bg-white rounded-md shadow-xl border-l-4 border-yellow-200">
                        <h5 class="text-gray-900 text-xl leading-tight font-medium mb-2">{{ $shop->name }}</h5>
                    </div>
                @endforeach
            </div>
        @endif
        
    </div>      
</x-app-layout>
