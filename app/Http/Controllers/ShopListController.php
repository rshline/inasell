<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShopListRequest;
use App\Models\Shop;
use App\Models\ShopList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

use function PHPUnit\Framework\isNull;

class ShopListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($shop)
    {
        $shoplist = ShopList::with('user')->where('shops_id', $shop)->get();
        
        return view('pages.dashboard.shoplist.index', [
            'shop' => $shop,
            'shoplist' => $shoplist
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dashboard.shoplist.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $shop = Shop::where('invitation_id', $request->invitation_id)->firstOrFail();

        $input = ([
            'users_id' => Auth()->user()->id,
            'shops_id' => $shop->id,
            'is_owner'=> false,
            'status' => 'PENDING',
        ]);

        Validator::make($input, [
            'users_id' => 'required|exists:users,id',
            'shops_id' => 'required|exists:shops,id',
            'is_owner'=> 'boolean',
            'status' => 'in:PENDING,MEMBER,REJECTED',
        ])->validate();

        ShopList::create($input);            

        return redirect()->route('dashboard.shop.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShopList  $shopList
     * @return \Illuminate\Http\Response
     */
    public function show(ShopList $shopList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShopList  $shopList
     * @return \Illuminate\Http\Response
     */
    public function edit(ShopList $shopList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShopList  $shopList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShopList $shopList)
    {
        $shopList->update([
            'status' => 'MEMBER'
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShopList  $shopList
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShopList $shopList)
    {
        $item = ShopList::find($shopList->id);

        $item->delete();
        
        return redirect()->back();
    }
}
