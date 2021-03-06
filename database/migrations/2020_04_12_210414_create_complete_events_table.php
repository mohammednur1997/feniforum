<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompleteEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complete_events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('campaing_category')->nullable();
            $table->string('event_id')->nullable();
            $table->string('eventName_id')->nullable();
            $table->string('eventYear_id')->nullable();
            $table->string('campCategeroy_id')->nullable();
            $table->string('campaing_photo')->nullable();
            $table->text('campaing_description')->nullable();
            $table->string('campaing_video')->nullable();
            $table->string('campaing_photogellary')->nullable();
            $table->string('campaing_start_date')->nullable();
            $table->string('campaing_end_date')->nullable();
            $table->string('duration')->nullable();
            $table->decimal('goal_amount', 52, 3);
            $table->string('end_type')->nullable();
            $table->string('add_to_feature')->nullable();
            $table->string('campaing_location')->nullable();
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
        Schema::dropIfExists('complete_events');
    }
}
