<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCategoryRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Http\Requests\ProductRequest;
use App\Models\ProductVariant;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($shop)
    {
        // Get only shop product
        if (request()->ajax()) {
            $query = Product::with(['productcategory'])
                    ->where('shops_id', $shop)
                    ->get();

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <div class="flex flex-row space-x-2 justify-center">
                            <a class="my-4 px-3 py-1 w-auto border border-transparent rounded font-semibold text-sm focus:outline-none bg-indigo-600 text-gray-100 hover:bg-indigo-800 hover:text-gray-200 transition-all duration-300 ease-in-out" 
                                href="' . route('dashboard.shop.product.show', ['shop'=>$item->shops_id, 'product'=>$item->id]) . '">
                                Show
                            </a>
                            <a class="my-4 px-3 py-1 w-auto border border-transparent rounded font-semibold text-sm focus:outline-none bg-indigo-600 text-gray-100 hover:bg-indigo-800 hover:text-gray-200 transition-all duration-300 ease-in-out" 
                                href="' . route('dashboard.shop.product.edit', ['shop'=>$item->shops_id, 'product'=>$item->id]) . '">
                                Edit
                            </a>
                            <form class="inline-block" action="' . route('dashboard.shop.product.destroy',  ['shop'=>$item->shops_id, 'product'=>$item->id]) . '" method="POST">
                            <button class="my-4 px-3 py-1 w-auto border border-transparent rounded font-semibold text-sm focus:outline-none bg-red-600 text-gray-100 hover:bg-red-800 hover:text-gray-200 transition-all duration-300 ease-in-out" >
                                Delete
                            </button>
                                ' . method_field('delete') . csrf_field() . '
                            </form>                        
                        </div>
                        ';
                })
                ->rawColumns(['action'])
                ->make();
        }
            

        return view('pages.dashboard.product.index', [
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
        $categories = ProductCategory::where('shops_id', $shop)->get();
        return view('pages.dashboard.product.create', compact('categories', 'shop'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
     */
    public function store($shop, ProductRequest $request)
    {
        Product::create([
            'shops_id' => $shop,
            'name' => $request->name,
            'qty' => $request->qty,
            'desc' => $request->desc,
            'categories_id' => $request->categories_id
        ]);

        return redirect()->route('dashboard.shop.product.index', $shop);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($shop, Product $product)
    {
        $product = Product::with(['productcategory', 'galleries', 'variants'])
                    ->where('shops_id', $shop)
                    ->findOrFail($product->id);

        return view('pages.dashboard.product.show', [
            'product' =>$product,
            'shop' => $shop
        ]); 

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($shop, Product $product)
    {
        $categories = ProductCategory::where('shops_id', $shop)->get();
        $product = Product::with(['galleries', 'variants'])
                    ->where('shops_id', $shop)
                    ->firstWhere('id', $product->id);
        
        return view('pages.dashboard.product.edit', [
            'product' => $product,
            'categories' => $categories,
            'shop' => $shop
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update($shop, ProductRequest $request, Product $product)
    {
        $product->update([
            'shops_id' => $shop,
            'name' => $request->name,
            'qty' => $request->qty,
            'desc' => $request->desc,
            'categories_id' => $request->categories_id
        ]);

        return redirect()->route('dashboard.shop.product.index', $shop);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($shop, Product $product)
    {
        $product->delete();

        return redirect()->route('dashboard.shop.product.index', $shop);
    }
}
