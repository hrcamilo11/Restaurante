<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Articulo;
use App\Models\Compra;


class SaleController extends Controller
{
    public function __construct()
    {

        $this->middleware('can:Shop.Sale')->only('Sale');
        $this->middleware('can:Shop.Pay')->only('Pay');
    }

    //especie de factura temporal
    public function Sale()
    {
        $id = Auth::id();
        $Sales = Sale::create([
            'id_User'=> $id,
            'Total_Price'=> '0',
        ]);

        //return response()->json(compact('ventas'));
    }

    //Venta definitiva
    public function Pay()
    {
        $id = Auth::id();
        $Sales = DB::select('select max(id) AS id from Sales where id_user = :id limit 1',['id' => $id]);

        foreach ($Sales as $Sale) {
            $Saleid = $Sale->id;
        }
        $Buys = DB::select('select id_Product, Amount from Buys where id_sales = :id', ['id' => $Saleid]);

        foreach ($Buys as $Buy) {
            $Product = Product::find($Buy->id_Product);
            $Product->Stock = $Product->Stock - $Buy->Amount;
            $Product->save();
        }
        return response()->json(["message" => "Thanks for your purchase, See you soon!"]);
    }

}