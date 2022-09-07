<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Test\Constraint\ResponseFormatSame;

class ProductController extends Controller
{
    //
    public function all(Request $request){
        $id = $request->input('id');
        $limit = $request->input('limit');
        $name = $request->input('name');
        $categories = $request->input('categories');

        if($id){
            $product = Product::with(['category', 'galleries', 'variants'])->find($id);

            if ($product) {
                return ResponseFormatter::success(
                    $product,
                    'Product Data - success'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'Product Data - error',
                    404
                );
            }
        }

        $product = Product::with(['category', 'galleries', 'variants']);

        if ($name) {
            $product->where('name', 'like', '%'.$name.'%');
        }

        if ($categories) {
            $product->where('categories', $categories);
        }

        return ResponseFormatter::success(
            $product->paginate($limit),
            'Product Data success'
        );
    }
}
