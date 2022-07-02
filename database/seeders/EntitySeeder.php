<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EntitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('provinces')->insert(array(
            0 =>
            array(
                'name' => 'bid_end',
                'value' => '1',
                'text' => 'Lelang Kilat 6 Jam'
            ),
            1 =>
            array(
                'name' => 'bid_end',
                'value' => '2',
                'text' => 'Lelang Kilat 12 Jam'
            ),
            2 =>
            array(
                'name' => 'bid_end',
                'value' => '3',
                'text' => 'Lelang Kilat 24 Jam'
            ),
            3 =>
            array(
                'name' => 'bid_end',
                'value' => '4',
                'text' => '2 x 24 Jam'
            ),
            4 =>
            array(
                'name' => 'bid_end',
                'value' => '5',
                'text' => '3 x 24 Jam'
            ),
            5 =>
            array(
                'name' => 'bid_end',
                'value' => '6',
                'text' => '12 Jam Last Bidder'
            ),
            6 =>
            array(
                'name' => 'bid_end',
                'value' => '7',
                'text' => '24 Jam Last Bidder'
            ),
            7 =>
            array(
                'name' => 'bid_end',
                'value' => '8',
                'text' => '2 x 24 Jam Last Bidder'
            ),
        ));
    }
}
