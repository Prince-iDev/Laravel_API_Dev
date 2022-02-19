<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BusinessProfileSetup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_profile_setup', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('biz_type');
            $table->string('biz_name');
            $table->string('biz_related_to');
            $table->string('biz_description');
            $table->string('biz_email')->unique();
            $table->string('biz_phone_number');
            $table->string('biz_website_add');
            $table->string('biz_location_add');
            $table->string('biz_location_lga');
            $table->string('biz_reg_number');
            $table->string('biz_tax_id_number');
            $table->string('biz_CAC_name');
            $table->string('biz_CAC_size');
            $table->string('biz_logo_name');
            $table->string('biz_logo_size');
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
