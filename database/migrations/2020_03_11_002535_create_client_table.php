<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->unsignedBigInteger('id',true); /* autoincremento (true)*/
            $table->string('name');
            $table->unsignedBigInteger('cpf');
            $table->string('email');
            $table->boolean('active_flag')->default(true);
            $table->string('endereco')->nullable(); // null - por padrão os campos são not null
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
