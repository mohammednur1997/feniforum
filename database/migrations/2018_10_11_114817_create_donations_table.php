<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->increments('id');
			$table->string('donation_type')->nullable();
			$table->decimal('amount', 52, 3);
			$table->string('donation_holder')->nullable();
			$table->string('donation_mobile')->nullable();
			$table->string('donation_email')->nullable();
			$table->string('donation_location')->nullable();
			$table->string('payment_type')->nullable();
			$table->string('donation_photo')->nullable();
			$table->string('donation_slip')->nullable();
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
        Schema::dropIfExists('donations');
    }
}
