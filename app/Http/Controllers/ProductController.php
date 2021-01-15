<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\ProductListRequest;

class ProductController extends Controller
{
    public $product;
    //public $a;
    //public $b;

    public function __construct()
    {
        $this->product = new Product();
    }
    public function save()
    {
        /* $product = new Product;
         $product->name = 'Pastel Richos Style';
         $product->desc  = 'chessecake';
         $product->price  = 40.20;
         $product->save();
         */
    }
    public function list(ProductListRequest $request)
    {
        //This option allow to keep the value in the view Form using:
        //{{old('priceMin')}}
        $request->flash();

        $products = $this->product->query();

        if ($request->filled('priceMin')) {
            $products->priceMin($request->input('priceMin'));
        }

        if ($request->filled('priceMax')) {
            $products->priceMax($request->input('priceMax'));
        }

        if ($request->filled('name')) {
            $products->name($request->input('name'));
        }

        if ($request->filled('type')) {
            $products->type($request->input('type'));
        }
        
        //To work with API, we will return the data as json (no used for now)
        //if ($request->ajax()) return response()->json($products->get());
        return view('products')->with('productos', $products->get());
    }
}
