<?php

namespace App\Http\Controllers;

use App\Product;
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
        $data = Product::with('vendor')->orderBy('name')->paginate(25);

        return view('product.index', compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Product::with('vendor')->findOrFail($id);

        return view('product.show', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \App\Product
     */
    public function update(Request $request, $id)
    {
        $data = $this->validate($request, [
            'price' => 'required|integer',
        ]);

        /** @var Product $order */
        $order = Product::findOrFail($id);

        $order->update($data);

        return $order;
    }
}
