<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGeolocationColumnsOnSellerInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('seller_infos', function (Blueprint $table) {
            $table->rename('stores');
        });

        Schema::table('stores', function (Blueprint $table) {
            $table->string('slug')->unique()->after('name');
            $table->decimal('lat', 10, 8)->after('postal_code')->nullable();
            $table->decimal('long', 11, 8)->after('lat')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stores', function (Blueprint $table) {
            $table->dropColumn(['slug', 'lat', 'long']);
            $table->rename('seller_infos');
        });
    }
}
