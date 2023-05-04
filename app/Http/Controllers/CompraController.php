<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Produto;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Compra::with(['produto'])->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $produto = Produto::findOrFail($request->produto_id);
        $compra = new Compra();
        $compra->produto_id = $produto->id;
        $compra->quantity = $request->quantity;

        if ($compra->save()) {
            return $compra;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        return Compra::with('produto')->find($request->id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $compra = Compra::findOrFail($id);
        $compra->quantity = $request->quantity;
        $compra->produto_id = $request->produto_id;
        if($compra->save()) {
            return $compra;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $compra = Compra::findOrFail($id);
        if($compra->delete()) {
            return $compra;
        }
    }
}
