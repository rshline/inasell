<x-app-layout>
    <div class="flex flex-col p-6 mx-auto">
        <h2 class="font-semibold text-3xl text-gray-600 leading-tight mx-2 mb-4">
            {{ __('Your Shop') }}
        </h2>
        <div class="flex justify-end mb-6 mx-2">
            <a href="{{ route('dashboard.shop.create') }}" class="border border-transparent rounded font-semibold tracking-wide text-lg md:text-sm px-5 py-3 md:py-2 focus:outline-none focus:shadow-outline bg-indigo-600 text-gray-100 hover:bg-indigo-800 hover:text-gray-200 transition-all duration-300 ease-in-out my-4 md:my-0 w-full md:w-auto">
                + Create New Shop
            </a>                
        </div>
        <div class="flex flex-wrap flex-row">
        @if (!is_null($shops))
            <div class="flex flex-wrap flex-col justify-center items-center w-1/4 p-3 m-2 bg-white rounded-md shadow-xl border-l-4 border-purple-300">
                <a href="{{ route('dashboard.shop.create') }}" class="border border-transparent rounded font-semibold tracking-wide text-lg md:text-sm px-5 py-3 md:py-2 focus:outline-none focus:shadow-outline bg-indigo-600 text-gray-100 hover:bg-indigo-800 hover:text-gray-200 transition-all duration-300 ease-in-out my-4 md:my-0 w-full md:w-auto">
                    Join Shop
                </a> 
            </div>
            @foreach ($shops as $shop)
                <div class="flex flex-wrap flex-col justify-center items-center w-1/4 p-3 m-2 bg-white rounded-md shadow-xl border-l-4 border-purple-300">
                    <h5 class="text-gray-900 text-xl leading-tight font-medium mb-2">{{ $shop->name }}</h5>
                    <a href="{{ route('dashboard.shop.show', $shop->id) }}" class="border border-transparent rounded font-semibold tracking-wide text-lg md:text-sm px-5 py-3 md:py-2 focus:outline-none focus:shadow-outline bg-indigo-600 text-gray-100 hover:bg-indigo-800 hover:text-gray-200 transition-all duration-300 ease-in-out my-4 md:my-0 w-full md:w-auto">
                        Manage
                    </a>
                </div>
            @endforeach
        @endif
        </div>
    </div>      
</x-app-layout>
