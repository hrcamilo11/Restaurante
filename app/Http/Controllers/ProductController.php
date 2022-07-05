<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

    public function index() {

    $Product = Product::all();
   return View::make('Product.index')->with('Product', $Product);

   }

   public function show($id) {

    $Product = Product::find($id);
   return View::make('Product.show')->with('Product', $Product);
   }

   public function create() {
   }

   public function store() {
   }

   public function edit($id) {
   }

   public function update($id) {
   }

   public function destroy($id) {

    $Product = Product::find($id);
    $Product->delete();
   return Redirect::to('Product')->with('notice', 'El Producto {$id} ha sido eliminado correctamente.');

   }


}
