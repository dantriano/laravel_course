<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\ProductListRequest;

class ProductController extends Controller
{
    public $product;

    public function __construct()
    {
        $this->product = new Product();
    }
    public function save(ProductListRequest $request)
    {
        //Metodo A (carpeta privada y nombre del file aleatorio)
        //Esta sentencia guarda facilmente el archivo en la ruta  storage/app/products
        //El problema es que esa carpeta es privada asi que si queremos que los usuarios vean ls fotos
        //de los productos guardaremos la foto en una carpeta publica
        //$request->imagen->store('products');
        
        //Metodo B (carpeta publica y nombre del file original)
        //guardamos la imagen en public/src/products para que los usuarios puedan
        //tener acceso
        $file = $request->file('imagen');
        $destinationPath = 'storage/products';
        $originalFile = $file->getClientOriginalName();
        $file->move($destinationPath, $originalFile);
        
        
        //Creamos un nuevo producto
        $product = new Product;
        $product->name = $request->input('name');
        $product->desc  = $request->input('desc');
        $product->price  = $request->input('price');
        $product->type  = $request->input('type');
        $product->imagen  = $request->imagen->getClientOriginalName();
        $success = $product->save();

        //Redirigimos a la pagina del formulario de nuevo producto pasandole el resultado de registro
        return redirect()->action([ProductController::class, 'new'], ['success' => $success]);
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


    public function new()
    {
        return view('new_product');
    }
}
