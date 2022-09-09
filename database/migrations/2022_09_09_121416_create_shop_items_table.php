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
        Schema::create('shop_items', function (Blueprint $table) {
            $table->id();
            $table->string('GROUP_ID')->nullable();
            $table->string('ITEM_ID')->nullable();
            $table->string('PRODUCT_NAME')->nullable();
            $table->longText('DESCRIPTION')->nullable();
            $table->float('PRICE', 8, 2)->nullable();
            $table->string('IMG_URL')->nullable();
            $table->string('URL')->nullable();
            $table->integer('CATEGORY')->nullable();
            $table->string('SEX')->nullable();
            $table->string('EAN')->nullable();
            $table->string('MANUFACTURER')->nullable();
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
        Schema::dropIfExists('shop_items');
    }
};
