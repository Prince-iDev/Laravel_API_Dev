<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Job extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('job_email')->nullable();
            $table->string('job_company')->nullable();
            $table->string('job_position')->nullable();
            $table->string('job_company')->nullable();
            $table->string('job_location')->nullable();
            $table->string('state')->nullable();
            $table->string('job_category')->nullable();
            $table->string('job_duration')->nullable();
            $table->string('job_type')->nullable();
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
        //
    }
}
