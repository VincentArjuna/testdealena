<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('store_id');
            $table->string('name');
            $table->bigInteger('product_category_id');
            $table->json('images')->nullable();
            $table->text('description')->nullable();
            $table->double('weight');
            $table->double('length')->nullable();
            $table->double('width')->nullable();
            $table->double('height')->nullable();
            $table->double('start_bid');
            $table->double('bid_multiplier');
            $table->timestamp('bid_start')->nullable();
            $table->timestamp('bid_end')->nullable();
            $table->double('bid_bin');
            $table->double('min_deposit');
            $table->double('qty');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
