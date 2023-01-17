<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($shop, OrderRequest $request)
    {
        $orders = Order::with(['user', 'items.product'])
                    ->where('shops_id', $shop)
                    ->where('status', 'LIKE', '%'.$request->status.'%')
                    ->paginate(5);

        $orders->setPath('order');
        $orders->appends($request->all());

        return view('pages.dashboard.order.index', [
            'orders' => $orders,
            'shop' => $shop
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($shop)
    {
        return view('pages.dashboard.order.create', [
            'shop' => $shop
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($shop, OrderRequest $request)
    {
        $order = Order::create([
            'shops_id' => $shop,
            'users_id' => Auth()->user()->id,
            'customer_name' => $request->customer_name,
            'status' => $request->status,
            'notes' => $request->notes,
        ]);

        return redirect()->route('dashboard.shop.order.index', [
            'shop' => $shop
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($shop, Order $order)
    {
        return view('pages.dashboard.order.show', [
            'order' => $order,
            'shop' => $shop,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit($shop, Order $order)
    {
        $order_detail =  Order::with('items.product')
                        ->find($order->id);

        return view('pages.dashboard.order.edit', [
            'order' => $order_detail,
            'shop' => $shop
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update($shop, OrderRequest $request, Order $order)
    {
        $order->update([
            'status' => $request->status
        ]);

        return redirect()->route('dashboard.shop.order.index', $shop);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($shop, Order $order)
    {
        $order->delete();

        return redirect()->route('dashboard.shop.order.index', $shop);
    }
}
