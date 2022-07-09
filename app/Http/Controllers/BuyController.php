<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Buy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Product;


class BuyController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Shop.Add')->only('Add');

    }

    //agrega la cantidad de productos para comprarlos
    public function Add($Productid, Request $request){
        $id = Auth::id();
        $Sales = DB::select('select max(id) AS id from Sales where id_user = :id limit 1', ['id' => $id]);

        if(!Product::find($Productid)){
            return response()->json(["message"=>"Product dont exists."],400);
        }
        $PriceTemp = Product::find($Productid)->Price;


        if($request->get('Stock') > Product::find($Productid)->Stock){
            return response()->json(["message"=>" No Stock for ". Product::find($Productid)->Stock ." Products"],400);
        }
        $Price = $PriceTemp * $request->get('Stock');

        foreach ($Sales as $Sale) {
            $Saleid = $Sale->id;
        }
        $Buys= Buy::create([
            'id_sale' => $Saleid,
            'id_Product' => $Productid,
            'Amount' => $request->get('Stock'),
            'Price' => $Price,
        ]);
       // var_dump($ventaid, $valorInit, $ventas, $id, $Productid);

        return response()->json(compact('Buys'));
    }
}