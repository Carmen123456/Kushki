<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(table:'asignacion', callback: function (Blueprint $table) {
            $table->bigInteger('user_id')->unsigned()->nullable();
             $table->foreign('user_id')->references('id')->on('users');
             $table->foreign('cliente_id')->references('idCliente')->on('clientes');
        
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
