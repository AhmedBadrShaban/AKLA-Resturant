<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_details', function (Blueprint $table) {
            $table->id();
            $table->string('address');
            $table->string('phone_number');
            $table->string('email');
            $table->string('facebook_url')->default('http://www.facebook.com');
            $table->string('insta_url')->default('http://www.instagram.com');
            $table->string('whatsapp_url')->default('http://www.whatsapp.com');
            $table->LONGTEXT('about')->default('Our About here');
            
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
        Schema::dropIfExists('contact_details');
    }
};
