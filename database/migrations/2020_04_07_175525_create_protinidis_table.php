<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProtinidisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('protinidis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('upozila_id');
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
        Schema::dropIfExists('protinidis');
    }
}
