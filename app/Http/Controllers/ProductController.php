<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\ProductListRequest;
use App\Services\UploadFileService;

use App\Exceptions\UploadFileException;

class ProductController extends Controller
{
    private $product;
    private $uploadService;
    private $error = '';
    public function __construct()
    {
        $this->product = new Product();
    }
    public function save(ProductListRequest $request, UploadFileService $UploadFileService)
    {
        $success = false;
        try {
            //Use uploadService (can throw UploadFileException)
            $this->uploadService = $UploadFileService;
            $this->uploadService->uploadFile($request->file('imagen'));
            
            //Creamos un nuevo producto
            $product = new Product;
            $product->imagen  = $request->imagen->getClientOriginalName();
            $product->name = $request->input('name');
            $product->desc  = $request->input('desc');
            $product->price  = $request->input('price');
            $product->type  = $request->input('type');
            //Save new product (can throw QueryException)
            $success = $product->save();
        } catch (UploadFileException $exception) {
            //$this->error = $exception->getMessage();
            $this->error = $exception->customMessage();
        } catch ( \Illuminate\Database\QueryException $exception) {
            $this->error = "Error con los datos introducidos";
        }
        //Redirigimos a la pagina del formulario de nuevo producto pasandole el resultado de registro
        return redirect()->action([ProductController::class, 'new'], ['success' => $success])->withError($this->error);
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
    public function addToChart(ProductListRequest $request)
    {
        $carrito = $request->session()->get('carrito', []);
        array_push($carrito, $request->input('productname'));
        $request->session()->put('carrito', $carrito);

        //Redirect to page who send the request:
        return redirect(url()->previous());
    }
    public function removeToChart(ProductListRequest $request)
    {
        //Hacer la función para borrar
    }
}
