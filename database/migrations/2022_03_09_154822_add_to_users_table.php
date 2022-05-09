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
        Schema::table(table:'users', callback: function (Blueprint $table) {


            $table->boolean('estadoUsuario')->default(true);
            $table->bigInteger('idTipoUsuarioFK')->nullable()->default(1);
            $table->foreign('idTipoUsuarioFK')->references('idTipoUsuario')->on('tipoUsuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
