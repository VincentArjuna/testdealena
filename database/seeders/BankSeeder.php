<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banks')->insert(
            [
                [
                    'name' => 'BANK MANDIRI',
                    'code' => '008'
                ],
                [
                    'name' => 'BANK BNI',
                    'code' => '009'
                ],
                [
                    'name' => 'PERMATA BANK',
                    'code' => '013'
                ],
                [
                    'name' => 'BANK BRI',
                    'code' => '002'
                ],
                [
                    'name' => 'BANK BCA',
                    'code' => '014'
                ],

            ]
        );
    }
}
