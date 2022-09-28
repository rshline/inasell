<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $status = $request->input('status');

        if($id)
        {
            $order = Order::with(['items.product'])->find($id);

            if($order)
                return ResponseFormatter::success(
                    $order,
                    'Data order berhasil diambil',
                );
            else
                return ResponseFormatter::error(
                    null,
                    'Data order tidak ada',
                    404
                );
        }

        $order = Order::with(['items.product'])->where('users_id', Auth::user()->id);

        if($status)
            $order->where('status', $status);

        return ResponseFormatter::success(
            $order->paginate($limit),
            'Data list transaksi berhasil diambil'
        );
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function checklist(Request $request)
    {
        $request->validate([
            'items' => 'required|array',
            'items.*.id' => 'exists:products,id',
            'status' => 'required|in:PENDING,PROCESSED,SUCCESS,CANCELLED,FAILED,SHIPPING,SHIPPED',
        ]);

        $order = Order::create([
            'users_id' => Auth::user()->id,
            'address' => $request->address,
            'status' => $request->status,
            'notes' => $request->notes,
        ]);
        
        foreach ($request->items as $product) {
            OrderItem::create([
                'users_id' => Auth::user()->id,
                'products_id' => $product['id'],
                'orders_id' => $order->id,
                'quantity' => $product['quantity']
            ]);
        }

        return ResponseFormatter::success($order->load('items.product'), 'Success');
    }
}
