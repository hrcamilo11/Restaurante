<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_User')
                  ->onUpdate('cascade')
                  ->onDelete('cascade')
                  ->constrained('Users');
            $table->float('Total_Price');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('Sales');
    }
}
