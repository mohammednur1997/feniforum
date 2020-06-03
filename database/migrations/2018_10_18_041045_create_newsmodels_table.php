<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsmodelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newsmodels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('news_image')->nullable();
            $table->text('description');
            $table->string('db_status')->default('Live');
            $table->string('auth_id');
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
        Schema::dropIfExists('newsmodels');
    }
}
