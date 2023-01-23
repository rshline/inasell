<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShopRequest;
use App\Models\Shop;
use App\Models\ShopList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shops = Shop::whereHas('shoplists', function($query) {
                $query->where('users_id', Auth()->user()->id)->where('status', 'MEMBER');
        })->get();

        $pending_shops = Shop::whereHas('shoplists', function($query) {
            $query->where('users_id', Auth()->user()->id)->where('status', 'PENDING');
        })->get();

        return view('pages.dashboard.shop.index', [
            'shops' => $shops,
            'pending_shops' => $pending_shops
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dashboard.shop.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShopRequest $request)
    {
        $randomString = Str::random(10);

        $shop = Shop::create([
                    'name' => $request->name,
                    'invitation_id' => $randomString,
                    'address' => $request->address,
                    'phone' => $request->phone,
                ]);

        ShopList::create([
            'users_id' => Auth()->user()->id,
            'shops_id' => $shop->id,
            'is_owner' => true,
            'status' => 'MEMBER',
        ]);

        return redirect()->route('dashboard.shop.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function show(Shop $shop)
    {
        $shop_info = Shop::with(['shoplists' => function($query) {
                        $query->where('status', '=', 'MEMBER');
                    }, 'shoplists.user'])
                    ->where('id', $shop->id)
                    ->first();

        return view('pages.dashboard.shop.show',[
            'shop' => $shop_info
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function edit(Shop $shop)
    {
        return view('pages.dashboard.shop.edit',[
            'shop' => $shop
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function update(ShopRequest $request, Shop $shop)
    {
        $data = $request->all();

        $shop->update($data);

        return redirect()->route('dashboard.shop.show', $shop->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $shop)
    {
        $shop->delete();

        return redirect()->route('dashboard.shop.show', $shop->id);
    }
}
