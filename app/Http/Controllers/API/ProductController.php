<?php

namespace App\Http\Controllers\API;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::all();
        return response() -> json($data, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->categori_id = $request->categori_id;
        $product->save();

        return response()->json([
            'name' => $product->name,
            'description' => $product->description,
            'price' => $product->price,
            'categori_id' => $product->categori_id,
            'result' => 'Data Created Successfully'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $id)
    {
        return response()->json($id, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $name = $request->name;
        $description = $request->description;
        $price = $request->price;
        $categori_id = $request->categori_id;

        $product = Product::find($id);
        $product->name = $name;
        $product->description = $description;
        $product->price = $price;
        $product->categori_id = $categori_id;
        $product->save();

        return response()->json([
            'name' => $product->name,
            'description' => $product->description,
            'price' => $product->price,
            'categori_id' => $product->categori_id,
            'result' => 'Data Updated Successfully'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return 'Data Successfully Deleted!';
    }
}
