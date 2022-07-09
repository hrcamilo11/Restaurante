<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Buys', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_Sale')
                  ->onUpdate('cascade')
                  ->onDelete('cascade')
                  ->constrained('Sales');

            $table->foreignId('id_Product')
                  ->onUpdate('cascade')
                  ->onDelete('cascade')
                  ->constrained('Products');


            $table->float("Price");
            $table->integer("Amount");
            $table->timestamps();
        });

    }

//$table->foreignId('id_rol')
//                  ->onUpdate('cascade')
//                  ->onDelete('cascade')
//                  ->constrained('roles');
//
    public function down()
    {
        Schema::dropIfExists('Buys');
    }
}
