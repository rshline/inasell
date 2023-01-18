<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderItemRequest;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($shop, $order)
    {
        $products = Product::with(['productcategory'])
                    ->where('shops_id', $shop)
                    ->get();

        return view('pages.dashboard.orderitem.create', [
            'order' => $order,
            'shop' => $shop,
            'products' => $products
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($shop, $order, Request $request)
    {
        $order = OrderItem::firstOrNew(
            ['products_id' => $request->products_id, 'orders_id' => $request->orders_id]
        );

        $order->qty = ($order->qty + $request->qty);
        $order->save();

        // decrease quantity
        $product = Product::where('shops_id', $shop)
                    ->find($request->products_id);

        $product->update([
            'qty' => ($product->qty - $request->qty),
        ]);

        return redirect()->route('dashboard.shop.order.index', [
            'order' => $order,
            'shop' => $shop
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderItem  $orderItem
     * @return \Illuminate\Http\Response
     */
    public function show(OrderItem $orderItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderItem  $orderItem
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderItem $orderItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrderItem  $orderItem
     * @return \Illuminate\Http\Response
     */
    public function update($shop, OrderItemRequest $request, Order $order,  OrderItem $orderItem)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderItem  $orderItem
     * @return \Illuminate\Http\Response
     */
    public function destroy($shop, OrderItem $orderItem)
    {
        $orderItem->delete();

        return redirect()->route('dashboard.shop.order.index', $shop);
    }
}
