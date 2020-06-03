<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_expenses', function (Blueprint $table) {
             $table->increments('id');
            $table->string('campaing_category')->nullable();
            $table->string('event_id')->nullable();
            $table->string('eventName_id')->nullable();
            $table->string('eventYear_id')->nullable();
            $table->string('campCategeroy_id')->nullable();
            $table->string('campaing_photo')->nullable();
            $table->string('donar_name')->nullable();
            $table->string('amount')->nullable();
            $table->string('expense_details')->nullable();
            $table->string('expense')->nullable();
            $table->decimal('goal_amount', 52, 3);
            $table->string('type')->nullable();
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
        Schema::dropIfExists('event_expenses');
    }
}
