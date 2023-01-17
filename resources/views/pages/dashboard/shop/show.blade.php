<x-shop-layout>
    <header>
        <div class="max-w-7xl mx-auto p-3">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {!! __('Edit Shop Info') !!}
            </h2>
        </div>
    </header>
    <div class="max-w-7xl mx-auto p-3">
        <div class="flex flex-col p-3 bg-white rounded-lg mb-6">
            <h2>Name    : {{ $shop->name }}</h2>
            <h5>Phone   : {{ $shop->phone }}</h5>
            <h5>Address : {{ $shop->address }}</h5>
            <div class="flex justify-end">
                <a href="{{ route('dashboard.shop.edit', $shop->id) }}" class="btn-primary">
                    Edit Info
                </a>
            </div>
        </div>
        <div class="p-3 bg-white rounded-lg text-center">
            <h2 class="border-b-neutral-800 mb-2"><b>Staff</b></h2>
            <ol>
                @foreach ( $shop->shoplists as $member)
                    <li>{{ $member->user->name }}</li>
                @endforeach                    
            </ol>
    
        </div>
    </div>
</x-shop-layout>