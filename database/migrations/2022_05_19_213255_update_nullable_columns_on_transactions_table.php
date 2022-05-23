<?php

use Doctrine\DBAL\Types\FloatType;
use Doctrine\DBAL\Types\Type;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateNullableColumnsOnTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (! Type::hasType('double')) {
            Type::addType('double', FloatType::class);
        }
        Schema::table('transactions', function (Blueprint $table) {
            $table->string('courier_code')->nullable()->change();
            $table->string('waybill_number')->nullable()->change();
            $table->double('waybill_cost')->default(0)->change();
            $table->double('grandtotal')->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (! Type::hasType('double')) {
            Type::addType('double', FloatType::class);
        }
        Schema::table('transactions', function (Blueprint $table) {
            $table->string('courier_code')->nullable(false)->change();
            $table->string('waybill_number')->nullable(false)->change();
            $table->double('waybill_cost')->default(0)->change();
            $table->double('grandtotal')->default(0)->change();
        });
    }
}
