<x-shop-layout>
    <h2 class="font-semibold text-xl text-gray-600 leading-tight mb-4">
        {{ __('Manage Staff') }}
    </h2>

    <div class="bg-white px-3 py-2 rounded-md">
        @foreach ($shoplist as $staff)
            <div class="grid grid-cols-3 py-2 items-center border-solid border-b-1 border-neutral-600">
                <div>
                    <p>{{ $staff->user->name }}</p> 
                    <p class="text-sm">{{ $staff->is_owner ? 'Owner' : 'Staff' }}</p>   
                </div>
                
                <div>
                    <p>{{ $staff->status }}</p>
                </div>
                
                
                <div class="flex space-x-2 justify-center items-center">
                    @switch($staff->status)
                        @case('MEMBER')
                            @if (!$staff->is_owner)
                                <form action="{{ route('dashboard.shoplist.destroy', ['shopList'=>$staff]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-danger">
                                        Remove
                                    </button>
                                </form>
                            @else
                                <p>-</p>                                 
                            @endif
                            @break

                        @default
                            <form action="{{ route('dashboard.shoplist.update', ['shopList'=>$staff]) }}" method="post">
                                @csrf
                                @method('patch')
                                <button class="btn-primary" type="submit">
                                    Accept
                                </button>
                            </form>
                            <form action="{{ route('dashboard.shoplist.destroy', ['shopList'=>$staff]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-danger">
                                    Reject
                                </button>
                            </form>
                    @endswitch
                </div>
            </div>
        @endforeach            
    </div>

</x-shop-layout>