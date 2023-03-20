
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
        Schema::create('product_shops', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('product_img');
            $table->text('product_url');
            $table->bigInteger('shop_id')->unsigned();
            $table->foreign('shop_id')->references('id')->on('flower_shops');
            $table->string('category');
            $table->integer('postal_code');
            $table->string('province');
            $table->string('city');
            $table->string('direction');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_shops');
    }
};