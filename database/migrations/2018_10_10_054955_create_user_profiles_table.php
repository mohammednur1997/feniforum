<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nmae')->nulable();
            $table->string('member_id')->nulable();
            $table->string('mobile')->nulable();
            $table->string('father_name')->nulable();
            $table->string('mother_name')->nulable();
            $table->text('present_address')->nulable();
            $table->text('parmanent_address')->nulable();
            $table->string('email')->nulable();
            $table->string('dob')->nulable();
            $table->string('blood_group')->nulable();
            $table->string('occapation')->nulable();
            $table->string('marital_status')->nulable();
            $table->string('org_relation')->nulable();
            $table->string('org_name')->nulable();
            $table->string('applyer_sign')->nulable();
            $table->string('applyer_photo')->nulable();
            $table->string('referane_name')->nulable();
            $table->string('referane_sign')->nulable();
            $table->string('referane_id')->nulable();
            $table->string('join_date')->nulable();
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
        Schema::dropIfExists('user_profiles');
    }
}
