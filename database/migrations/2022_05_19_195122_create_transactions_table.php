<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->dateTime('datetime');
            $table->bigInteger('member_id');
            $table->json('member_detail');
            $table->bigInteger('store_id');
            $table->json('store_detail');
            $table->json('products');
            $table->string('courier_code');
            $table->string('waybill_number');
            $table->double('subtotal');
            $table->double('waybill_cost');
            $table->double('grandtotal');
            $table->string('status')->default('waiting_payment');
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
        Schema::dropIfExists('transactions');
    }
}
