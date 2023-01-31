<div class="flex justify-center mt-5">
    <h1 class="text-lg text-center">Orders</h1>
    <table class="table-auto border-collapse mt-5">
        <thead>
            <tr class="text-center">
                <th scope="col" class="bg-neutral-200 border px-4 py-2">No</th>
                <th scope="col" class="bg-neutral-200 border px-4 py-2">Customer Name</th>
                <th scope="col" class="bg-neutral-200 border px-4 py-2">Status</th>
                <th scope="col" class="bg-neutral-200 border px-4 py-2">Items</th>
                <th scope="col" class="bg-neutral-200 border px-4 py-2">Notes</th>
                <th scope="col" class="bg-neutral-200 border px-4 py-2">Date</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 0;
            @endphp
            @foreach ($orders as $order)
                <tr class="text-center">
                    <th scope="row" class="border px-4 py-2">{{ ++$no}}</th>
                    <td class="border px-4 py-2">{{ $order->customer_name }}</td>
                    <td class="border px-4 py-2">{{ $order->status }}</td>
                    <td class="border px-4 py-2">
                    <ul class="list-disc">
                        @foreach ($order->items as $item)
                            <li>{{ $item->product->name }} - {{ $item->qty }} item(s)</li>
                        @endforeach                                            
                    </ul>
                    </td>
                    <td class="border px-4 py-2">{{ $order->notes }}</td>
                    <td class="border px-4 py-2">{{ date_format($order->created_at , "d M Y") }}</td>
                </tr>                
            @endforeach

        </tbody>
    </table>    
</div>
