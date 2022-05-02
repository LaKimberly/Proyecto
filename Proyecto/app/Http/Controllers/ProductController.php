<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        return view('Productviews.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //  $validator = validator::make($request->all(),[
        //      // 'productName' => 'required|productName|unique:products|min:4|max:30|unique:products',
        //      'productName' => 'required|productName|unique:products',
        //      'productPrice' => 'required',
        //      // 'ProductDescription' => '',
        //      // 'productQualication' => '',
        //      'img' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        //  ]);
        //  if($validator ->fails()){
        //      return back()
        //      ->withInput()
        //      ->with('ErrorInsert','Favor de llenar los datos correctamente')
        //      ->withErrors($validator);
        //  }
        //  else{

            // $imagen = $request -> hasFile('img');
            //  $nombre= time().'.'.$imagen->getClientOriginalExtension();

             $ruta_imagen = $request['imagenes']->store('productos', 'public');


             $product = new Product();
             $product->productName=$request['productName'];
             $product->productPrice=$request['productPrice'];
             $product->ProductDescription=$request['ProductDescription'];
             $product->productQualication=$request['productQualication'];
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
        return view('Productviews.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)

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
     $product->delete();
     return back()->with('succes','usuario eliminado correctamente');
    }


    public function menu()
    {
       $products = Product::paginate(6);
        return view('Productviews.menu', compact('products'));
    }


    public function carrito(Product $product)
    {
        // $products = Product::paginate(6);
        return view('Productviews.carrito', compact('product'));
    }

}
