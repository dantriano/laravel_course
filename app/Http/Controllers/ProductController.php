<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public $product;
    public $a;
    public $b;

    public function __construct(){
        $this->product=new Product();
    }
    public function save(){
    }
    public function list(){

        $products = $this->product->query();
        
        if($priceChecked)
            $products->priceMax('15');
        if($typeChecked)
            $products->type('bebidas');
        
       /* $product = new Product;
        $product->name = 'Pastel Richos Style';
        $product->desc  = 'chessecake';
        $product->price  = 40.20;
        $product->save();
        */
        return view('products')->with('productos',$products->get());
    }
}
