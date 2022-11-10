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
            $query = ProductCategory::with('shop')
                    ->where('shops_id', '=', $shop)
                    ->get();

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <a class="inline-block border border-gray-700 bg-gray-700 text-white rounded-md px-2 py-1 m-1 transition duration-500 ease select-none hover:bg-gray-800 focus:outline-none focus:shadow-outline" 
                            href="' . route('dashboard.shop.productcategory.edit', $item->id) . '">
                            Edit
                        </a>
                        <form class="inline-block" action="' . route('dashboard.shop.productcategory.destroy', $item->id) . '" method="POST">
                        <button class="border border-red-500 bg-red-500 text-white rounded-md px-2 py-1 m-2 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline" >
                            Hapus
                        </button>
                            ' . method_field('delete') . csrf_field() . '
                        </form>';
                })
                ->rawColumns(['action'])
                ->make();
        }

        return view('pages.dashboard.productcategory.index', $shop);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($shop)
    {
        return view('pages.dashboard.productcategory.create', $shop);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store($shop, ProductCategoryRequest $request)
    {
        $data = $request->all();

        ProductCategory::create($data);

        return redirect()->route('dashboard.shop.productcategory.index', $shop);
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
                        ->where('shops_id', '=', $shop)
                        ->find($productcategory);

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
    public function edit(ProductCategory $productcategory)
    {
        return view('pages.dashboard.productcategory.edit',[
            'item' => $productcategory
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

        return redirect()->route('dashboard.shop.productcategory.index', $shop);
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

        return redirect()->route('dashboard.shop.productcategory.index', $shop);
    }
}
