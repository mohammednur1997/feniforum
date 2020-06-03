<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLanguageWordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('language_words', function (Blueprint $table) {
            $table->increments('id');
			$table->text('word')->nullable();
			$table->string('english')->nullable();
			$table->string('bangla')->nullable();
			$table->string('arabic')->nullable();
			$table->string('db_field')->nullable();
			$table->string('db_status')->nullable();
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
        Schema::dropIfExists('language_words');
    }
}
