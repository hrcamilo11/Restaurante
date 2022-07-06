<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index']]);
    }

    public function index()
    {
        $Product = Product::all();
        return $Product;
    }

    public function store(Request $request)
    {
        $Product = Product::create([
            'Description' => $request->Description,
            'Price' => $request->Price,
            'Stock' => $request->Stock,
        ]);
        $Product->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Product created successfully',
            'Product' => $Product,
            ],201);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {
        $Product = Product::FindOrFail($request->id);

            $Product->Description = $request->Description;
            $Product->Price = $request->Price;
            $Product->Stock = $request->Stock;

            $Product->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Product updated successfully',
            'Product' => $Product,
            ]);
    }

    public function destroy(Request $request)
    {
        $Product = Product::destroy($request->id);
        return response()->json([
            'status' => 'success',
            'message' => 'Product deleted successfully',
            'Product' => $Product,
            ]);;
    }

}
