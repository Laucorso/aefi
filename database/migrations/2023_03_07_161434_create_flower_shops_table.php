<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //ROLES 
        Schema::create('flower_shops', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('contact_name');
            $table->text('logo')->nullable();
            $table->text('img_principal')->nullable();
            $table->string('email');
            $table->bigInteger('user_asociado')->unsigned();
            $table->foreign('user_asociado')->references('associated_num')->on('users');
            $table->integer('phone_number');
            $table->integer('whatsapp_number');
            $table->text('url_web');
            $table->text('description')->nullable();
            $table->integer('postal_code');
            $table->string('province');
            $table->string('city');
            $table->string('direction');
            $table->boolean('is_direct_florist');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flower_shops');
    }
};
