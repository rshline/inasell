<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCategoryRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Http\Requests\ProductRequest;
use App\Models\ProductVariant;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductRequest $request, ProductCategoryRequest $catRequest, $shop)
    {
        // Get only shop product
        $products = Product::with(['productcategory'])
                    ->where('shops_id', '=', $shop)
                    ->get();

        // Filter data by category 
        if ($catRequest->get('productcategory')) {
            $productcategory = $catRequest->productcategory;
            $products->whereHas(
                'productcategory',
                function ($query) use ($productcategory) {
                    $query->where('name', 'LIKE', "%{$productcategory}%");
                }
            );
        }

        // Search data 
        if ($request->get('keyword')) {
            $products->search($request->keyword);
        }

        return view('pages.dashboard.product.index', [
            'products' => $products->paginate(10),
            'productcategories' => ProductCategory::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($shop)
    {
        $categories = ProductCategory::all();
        return view('pages.dashboard.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($shop, ProductRequest $request)
    {
        $data = $request->all();

        Product::create($data);

        return redirect()->route('dashboard.shop.product.index', $shop);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($shop, ProductRequest $request, Product $product)
    {
        $id = $request->input('id');
        $limit = $request->input('limit');
        $name = $request->input('name');
        $categories = $request->input('categories');

        if($id){
            $product = Product::with(['category', 'galleries', 'variants'])
                        ->where('shops_id', '=', $shop)
                        ->find($id);

            if ($product) {
                return $product;
            } else {
                return null;
            }
        }

        if ($name) {
            $product->where('name', 'like', '%'.$name.'%');
        }

        if ($categories) {
            $product->where('categories', $categories);
        }

        return view('pages.dashboard.product.show', [
            'item' =>$product->paginate($limit)
        ]); 

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = ProductCategory::all();
        $product = Product::with(['galleries', 'variants']);
        
        return view('pages.dashboard.product.edit', [
            'product' => $product,
            'categories' => $categories
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
        $data = $request->all();

        $product->update($data);

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
