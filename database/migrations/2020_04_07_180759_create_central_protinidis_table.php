<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCentralProtinidisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('central_protinidis', function (Blueprint $table) {
             $table->increments('id');
            $table->string('name');
            $table->string('position');
            $table->string('mobile');
            $table->string('blood_group');
            $table->string('address');
            $table->string('image');
            $table->string('priority');
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
        Schema::dropIfExists('central_protinidis');
    }
}
