<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purcharse;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PurcharseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        abort_if(Gate::denies('purcharse_index'), 403);
        $purcharses = Purcharse::paginate(5);
        return view('purcharses.index', compact('purcharses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        abort_if(Gate::denies('purcharse_create'), 403);
        $products = Product::all()->pluck('productName', 'id');
        return view('purcharses.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $purcharse = Purcharse::create();
        $purcharse->user_id=Auth::user()->id;
        $purcharse->products()->sync($request->input('products', []));
        $aux = 0;
        foreach($purcharse->products as $product){
            $aux += $product->productPrice;
        }
        $purcharse->purcharsePrice=$aux;
        $purcharse->save();
        return redirect()->route('purcharses.index')->with('success', 'Venta realizada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purcharse  $purcharse
     * @return \Illuminate\Http\Response
     */
    public function show(Purcharse $purcharse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Purcharse  $purcharse
     * @return \Illuminate\Http\Response
     */
    public function edit(Purcharse $purcharse)
    {
        //
        abort_if(Gate::denies('purcharse_edit'), 403);
        $products = Product::all()->pluck('productName','id');
        $purcharse->load('products');
        return view('purcharses.edit', compact('purcharse', 'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Purcharse  $purcharse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purcharse $purcharse)
    {
        //
        $purcharse->products()->sync($request->input('products', []));
        $aux = 0;
        foreach($purcharse->products as $product){
            $aux += $product->productPrice;
        }
        $purcharse->purcharsePrice=$aux;
        $purcharse->save();
        return redirect()->route('purcharses.index')->with('success', 'Venta actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purcharse  $purcharse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purcharse $purcharse)
    {
        //
        abort_if(Gate::denies('purcharse_destroy'), 403);
        $purcharse->delete();
        return back()->with('success', 'Venta eliminada correctamente');
    }
}
