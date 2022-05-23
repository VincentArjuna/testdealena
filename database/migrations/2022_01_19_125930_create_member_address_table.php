<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_addresses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('user_id');
            $table->bigInteger('province_id');
            $table->bigInteger('city_id');
            $table->bigInteger('postal_code');
            $table->decimal('lat', 10, 8);
            $table->decimal('long', 11, 8);
            $table->text('description')->nullable();
            $table->text('notes')->nullable();
            $table->char('is_default', 1)->default('0');
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
        Schema::dropIfExists('member_addresses');
    }
}
