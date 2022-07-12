<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\validator;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index']]);
        $this->middleware('can:Product.Create')->only('store');
        $this->middleware('can:Product.Edit')->only('update');
        $this->middleware('can:Product.Delete')->only('destroy');
    }

    public function index()
    {
        $Product = Product::all();
        return $Product;
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'Description' => 'required|string|max:255|unique:products',
            'Price' => 'required|numeric',
            'Stock' => 'required|numeric',

        ]);
        if($validator->fails()){
            return response()->json([
                $validator->errors()->toJson(),
                'status'  => false,
                'code' => 409
            ]);
        }

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
            $validator = Validator::make($request->all(),[
            'Description' => 'required|string|max:255',
            'Price' => 'required|numeric',
            'Stock' => 'required|numeric',

        ]);
        if($validator->fails()){
            return response()->json([
                $validator->errors()->toJson(),
                'status'  => false,
                'code' => 409
            ]);
        }

        $Product = Product::findOrFail($request->id);
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
        $ProductTemp=Product::findOrFail($request->id);

        $Product = Product::destroy($request->id);
        return response()->json([
            'status' => 'success',
            'message' => 'Product deleted successfully',
            'User' => $ProductTemp,
            ]);;
    }

}
