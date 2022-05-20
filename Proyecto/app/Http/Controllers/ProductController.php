<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductEditRequest;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('product_index'), 403);
        $products = Product::paginate(5);
        return view('Productviews.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('product_create'), 403);
        return view('Productviews.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCreateRequest $request)
    {
             
             $product = new Product();
             $product->productName=$request['productName'];
             $product->productPrice=$request['productPrice'];
             $product->ProductDescription=$request['ProductDescription'];
             $product->productQualication=$request['productQualication'];
             $ruta_imagen = $request['imagenes']->store('productos', 'public');
             $product->img=$ruta_imagen;
             $product->save();
             return redirect()-> route('product.show', $product->id)->with('success', ' Su producto fue creado correctamente');
        //  }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        abort_if(Gate::denies('product_show'), 403);
      //  $product = Product::findOrfail($id);

         return view('Productviews.show', compact ('product'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        abort_if(Gate::denies('product_edit'), 403);
        return view('Productviews.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductEditRequest $request, Product $product)

    {
        if($request['imagenes']){
        $ruta_imagen = $request['imagenes']->store('productos', 'public');

        $product->img=$ruta_imagen;

        }
        $product->productName=$request['productName'];
        $product->productPrice=$request['productPrice'];
        $product->ProductDescription=$request['ProductDescription'];
        $product->productQualication=$request['productQualication'];
        $product->save();

        return redirect()->route('product.show', $product->id)->with('success','Producto actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        abort_if(Gate::denies('product_destroy'), 403);
        $product->delete();
        return back()->with('succes','usuario eliminado correctamente');
    }


    public function menu()
    {
       $products = Product::paginate(6);
        return view('cart.menu', compact('products'));
    }


    public function carrito(Product $product)
    {
        // $products = Product::paginate(6);
        return view('cart.carrito', compact('product'));
    }

}
