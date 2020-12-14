<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\ProductListRequest;

class ProductController extends Controller
{
    public $product;
    public $a;
    public $b;

    public function __construct(){
        $this->product=new Product();
    }
    public function save(){
        /* $product = new Product;
         $product->name = 'Pastel Richos Style';
         $product->desc  = 'chessecake';
         $product->price  = 40.20;
         $product->save();
         */ 
    }
    public function list(ProductListRequest $request){        
        //$request->flash();
        //old('price');

        $products = $this->product->query();
        if($request->filled('price')){
            $products->priceMin($request->input('price'));
        }
       if($request->ajax()){
           return $products->get();
       }
        return view('products')->with('productos',$products->get());
    }
}
