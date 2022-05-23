<?php

use App\Models\Setting\Entity;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('value');
            $table->string('text');
            $table->timestamps();
            $table->softDeletes();
        });

        $data = collect([
            [
                'name' => 'bid_end',
                'value' => '1',
                'text' => '1 Hari'
            ],
            [
                'name' => 'bid_end',
                'value' => '3',
                'text' => '3 Hari'
            ],
            [
                'name' => 'bid_end',
                'value' => '7',
                'text' => '1 Minggu'
            ],
            [
                'name' => 'bid_end',
                'value' => '14',
                'text' => '2 Minggu'
            ],
            [
                'name' => 'bid_end',
                'value' => '30',
                'text' => '1 Bulan'
            ],
        ]);
        foreach ($data as $item) {
            $model = new Entity();
            $model->name = $item['name'];
            $model->value = $item['value'];
            $model->text = $item['text'];
            $model->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entities');
    }
}
