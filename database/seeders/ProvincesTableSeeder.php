<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProvincesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('provinces')->delete();
        
        \DB::table('provinces')->insert(array (
            0 => 
            array (
                'province_id' => 1,
                'province_name' => 'Bali',
            ),
            1 => 
            array (
                'province_id' => 2,
                'province_name' => 'Bangka Belitung',
            ),
            2 => 
            array (
                'province_id' => 3,
                'province_name' => 'Banten',
            ),
            3 => 
            array (
                'province_id' => 4,
                'province_name' => 'Bengkulu',
            ),
            4 => 
            array (
                'province_id' => 5,
                'province_name' => 'DI Yogyakarta',
            ),
            5 => 
            array (
                'province_id' => 6,
                'province_name' => 'DKI Jakarta',
            ),
            6 => 
            array (
                'province_id' => 7,
                'province_name' => 'Gorontalo',
            ),
            7 => 
            array (
                'province_id' => 8,
                'province_name' => 'Jambi',
            ),
            8 => 
            array (
                'province_id' => 9,
                'province_name' => 'Jawa Barat',
            ),
            9 => 
            array (
                'province_id' => 10,
                'province_name' => 'Jawa Tengah',
            ),
            10 => 
            array (
                'province_id' => 11,
                'province_name' => 'Jawa Timur',
            ),
            11 => 
            array (
                'province_id' => 12,
                'province_name' => 'Kalimantan Barat',
            ),
            12 => 
            array (
                'province_id' => 13,
                'province_name' => 'Kalimantan Selatan',
            ),
            13 => 
            array (
                'province_id' => 14,
                'province_name' => 'Kalimantan Tengah',
            ),
            14 => 
            array (
                'province_id' => 15,
                'province_name' => 'Kalimantan Timur',
            ),
            15 => 
            array (
                'province_id' => 16,
                'province_name' => 'Kalimantan Utara',
            ),
            16 => 
            array (
                'province_id' => 17,
                'province_name' => 'Kepulauan Riau',
            ),
            17 => 
            array (
                'province_id' => 18,
                'province_name' => 'Lampung',
            ),
            18 => 
            array (
                'province_id' => 19,
                'province_name' => 'Maluku',
            ),
            19 => 
            array (
                'province_id' => 20,
                'province_name' => 'Maluku Utara',
            ),
            20 => 
            array (
                'province_id' => 21,
            'province_name' => 'Nanggroe Aceh Darussalam (NAD)',
            ),
            21 => 
            array (
                'province_id' => 22,
            'province_name' => 'Nusa Tenggara Barat (NTB)',
            ),
            22 => 
            array (
                'province_id' => 23,
            'province_name' => 'Nusa Tenggara Timur (NTT)',
            ),
            23 => 
            array (
                'province_id' => 24,
                'province_name' => 'Papua',
            ),
            24 => 
            array (
                'province_id' => 25,
                'province_name' => 'Papua Barat',
            ),
            25 => 
            array (
                'province_id' => 26,
                'province_name' => 'Riau',
            ),
            26 => 
            array (
                'province_id' => 27,
                'province_name' => 'Sulawesi Barat',
            ),
            27 => 
            array (
                'province_id' => 28,
                'province_name' => 'Sulawesi Selatan',
            ),
            28 => 
            array (
                'province_id' => 29,
                'province_name' => 'Sulawesi Tengah',
            ),
            29 => 
            array (
                'province_id' => 30,
                'province_name' => 'Sulawesi Tenggara',
            ),
            30 => 
            array (
                'province_id' => 31,
                'province_name' => 'Sulawesi Utara',
            ),
            31 => 
            array (
                'province_id' => 32,
                'province_name' => 'Sumatera Barat',
            ),
            32 => 
            array (
                'province_id' => 33,
                'province_name' => 'Sumatera Selatan',
            ),
            33 => 
            array (
                'province_id' => 34,
                'province_name' => 'Sumatera Utara',
            ),
        ));
        
        
    }
}