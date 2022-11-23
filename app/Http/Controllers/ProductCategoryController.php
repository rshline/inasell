<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Http\Requests\ProductCategoryRequest;
use App\Models\ProductCategory;
use Yajra\DataTables\Facades\DataTables;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($shop)
    {
        if (request()->ajax()) {
            $query = ProductCategory::where('shops_id', $shop)
                    ->get(); 

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <div class="flex flex-row justify-center">
                            <a class="border border-transparent rounded font-semibold tracking-wide text-lg md:text-sm px-1 py-2 focus:outline-none focus:shadow-outline bg-indigo-600 text-gray-100 hover:bg-indigo-800 hover:text-gray-200 transition-all duration-300 ease-in-out m-2 w-full md:w-auto" 
                                href="' . route('dashboard.shop.productcategory.show', ['shop'=>$item->shops_id, 'productcategory'=>$item->id]) . '">
                                Show
                            </a>
                            <a class="border border-transparent rounded font-semibold tracking-wide text-lg md:text-sm px-1 py-2 focus:outline-none focus:shadow-outline bg-indigo-600 text-gray-100 hover:bg-indigo-800 hover:text-gray-200 transition-all duration-300 ease-in-out m-2 w-full md:w-auto" 
                                href="' . route('dashboard.shop.productcategory.edit', ['shop'=>$item->shops_id, 'productcategory'=>$item->id]) . '">
                                Edit
                            </a>
                            <form class="inline-block" action="' . route('dashboard.shop.productcategory.destroy',  ['shop'=>$item->shops_id, 'productcategory'=>$item->id]) . '" method="POST">
                            <button class="border border-red-500 bg-red-500 hover:bg-red-600 border-transparent rounded font-semibold tracking-wide text-lg md:text-sm px-1 py-2 focus:outline-none focus:shadow-outline text-gray-100 hover:text-gray-200 transition-all duration-300 ease-in-out m-2 w-full md:w-auto" >
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

        return view('pages.dashboard.productcategory.index', ['shop'=>$shop]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($shop)
    {
        return view('pages.dashboard.productcategory.create', compact('shop'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store($shop, ProductCategoryRequest $request)
    {
        ProductCategory::create([
            'shops_id' => $shop,
            'name' => $request->name
        ]);

        return redirect()->route('dashboard.shop.productcategory.index', ['shop'=> $shop]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productcategory
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show($shop, ProductCategory $productcategory)
    {
        if($productcategory){
            $category = ProductCategory::with(['products'])
                        ->where('shops_id', $shop)
                        ->find($productcategory)
                        ->first();

            if ($category) {
                $category->paginate(5);
            } else {
                return null;
            }
        }

        return view('pages.dashboard.productcategory.show', [
            'item' => $category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productcategory
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($shop, ProductCategory $productcategory)
    {
        return view('pages.dashboard.productcategory.edit', [
            'item' => $productcategory,
            'shop' => $shop
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductCategory  $productcategory
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($shop, ProductCategoryRequest $request, ProductCategory $productcategory)
    {
        $data = $request->all();

        $productcategory->update($data);

        return redirect()->route('dashboard.shop.productcategory.index', ['shop'=> $shop]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductCategory  $productcategory
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($shop, ProductCategory $productcategory)
    {
        $productcategory->delete();

        return redirect()->route('dashboard.shop.productcategory.index', ['shop'=> $shop]);
    }
}
