<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCvReport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cv_report', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('apply_for');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('approve');
            $table->string('batch');
            $table->date('DOB');
            $table->string('gender');
            $table->string('nationality');
            $table->string('current_country');
            $table->string('english_skill');
            $table->string('japanese_skill');
            $table->string('cv');
            $table->timestamp('upload_at')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cv_report');
    }
}
