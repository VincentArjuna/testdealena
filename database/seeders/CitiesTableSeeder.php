<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cities')->delete();
        
        \DB::table('cities')->insert(array (
            0 => 
            array (
                'city_id' => 1,
                'province_id' => 21,
                'city_name' => 'Kabupaten Aceh Barat',
                'postal_code' => '23681',
            ),
            1 => 
            array (
                'city_id' => 2,
                'province_id' => 21,
                'city_name' => 'Kabupaten Aceh Barat Daya',
                'postal_code' => '23764',
            ),
            2 => 
            array (
                'city_id' => 3,
                'province_id' => 21,
                'city_name' => 'Kabupaten Aceh Besar',
                'postal_code' => '23951',
            ),
            3 => 
            array (
                'city_id' => 4,
                'province_id' => 21,
                'city_name' => 'Kabupaten Aceh Jaya',
                'postal_code' => '23654',
            ),
            4 => 
            array (
                'city_id' => 5,
                'province_id' => 21,
                'city_name' => 'Kabupaten Aceh Selatan',
                'postal_code' => '23719',
            ),
            5 => 
            array (
                'city_id' => 6,
                'province_id' => 21,
                'city_name' => 'Kabupaten Aceh Singkil',
                'postal_code' => '24785',
            ),
            6 => 
            array (
                'city_id' => 7,
                'province_id' => 21,
                'city_name' => 'Kabupaten Aceh Tamiang',
                'postal_code' => '24476',
            ),
            7 => 
            array (
                'city_id' => 8,
                'province_id' => 21,
                'city_name' => 'Kabupaten Aceh Tengah',
                'postal_code' => '24511',
            ),
            8 => 
            array (
                'city_id' => 9,
                'province_id' => 21,
                'city_name' => 'Kabupaten Aceh Tenggara',
                'postal_code' => '24611',
            ),
            9 => 
            array (
                'city_id' => 10,
                'province_id' => 21,
                'city_name' => 'Kabupaten Aceh Timur',
                'postal_code' => '24454',
            ),
            10 => 
            array (
                'city_id' => 11,
                'province_id' => 21,
                'city_name' => 'Kabupaten Aceh Utara',
                'postal_code' => '24382',
            ),
            11 => 
            array (
                'city_id' => 12,
                'province_id' => 32,
                'city_name' => 'Kabupaten Agam',
                'postal_code' => '26411',
            ),
            12 => 
            array (
                'city_id' => 13,
                'province_id' => 23,
                'city_name' => 'Kabupaten Alor',
                'postal_code' => '85811',
            ),
            13 => 
            array (
                'city_id' => 14,
                'province_id' => 19,
                'city_name' => 'Kota Ambon',
                'postal_code' => '97222',
            ),
            14 => 
            array (
                'city_id' => 15,
                'province_id' => 34,
                'city_name' => 'Kabupaten Asahan',
                'postal_code' => '21214',
            ),
            15 => 
            array (
                'city_id' => 16,
                'province_id' => 24,
                'city_name' => 'Kabupaten Asmat',
                'postal_code' => '99777',
            ),
            16 => 
            array (
                'city_id' => 17,
                'province_id' => 1,
                'city_name' => 'Kabupaten Badung',
                'postal_code' => '80351',
            ),
            17 => 
            array (
                'city_id' => 18,
                'province_id' => 13,
                'city_name' => 'Kabupaten Balangan',
                'postal_code' => '71611',
            ),
            18 => 
            array (
                'city_id' => 19,
                'province_id' => 15,
                'city_name' => 'Kota Balikpapan',
                'postal_code' => '76111',
            ),
            19 => 
            array (
                'city_id' => 20,
                'province_id' => 21,
                'city_name' => 'Kota Banda Aceh',
                'postal_code' => '23238',
            ),
            20 => 
            array (
                'city_id' => 21,
                'province_id' => 18,
                'city_name' => 'Kota Bandar Lampung',
                'postal_code' => '35139',
            ),
            21 => 
            array (
                'city_id' => 22,
                'province_id' => 9,
                'city_name' => 'Kabupaten Bandung',
                'postal_code' => '40311',
            ),
            22 => 
            array (
                'city_id' => 23,
                'province_id' => 9,
                'city_name' => 'Kota Bandung',
                'postal_code' => '40111',
            ),
            23 => 
            array (
                'city_id' => 24,
                'province_id' => 9,
                'city_name' => 'Kabupaten Bandung Barat',
                'postal_code' => '40721',
            ),
            24 => 
            array (
                'city_id' => 25,
                'province_id' => 29,
                'city_name' => 'Kabupaten Banggai',
                'postal_code' => '94711',
            ),
            25 => 
            array (
                'city_id' => 26,
                'province_id' => 29,
                'city_name' => 'Kabupaten Banggai Kepulauan',
                'postal_code' => '94881',
            ),
            26 => 
            array (
                'city_id' => 27,
                'province_id' => 2,
                'city_name' => 'Kabupaten Bangka',
                'postal_code' => '33212',
            ),
            27 => 
            array (
                'city_id' => 28,
                'province_id' => 2,
                'city_name' => 'Kabupaten Bangka Barat',
                'postal_code' => '33315',
            ),
            28 => 
            array (
                'city_id' => 29,
                'province_id' => 2,
                'city_name' => 'Kabupaten Bangka Selatan',
                'postal_code' => '33719',
            ),
            29 => 
            array (
                'city_id' => 30,
                'province_id' => 2,
                'city_name' => 'Kabupaten Bangka Tengah',
                'postal_code' => '33613',
            ),
            30 => 
            array (
                'city_id' => 31,
                'province_id' => 11,
                'city_name' => 'Kabupaten Bangkalan',
                'postal_code' => '69118',
            ),
            31 => 
            array (
                'city_id' => 32,
                'province_id' => 1,
                'city_name' => 'Kabupaten Bangli',
                'postal_code' => '80619',
            ),
            32 => 
            array (
                'city_id' => 33,
                'province_id' => 13,
                'city_name' => 'Kabupaten Banjar',
                'postal_code' => '70619',
            ),
            33 => 
            array (
                'city_id' => 34,
                'province_id' => 9,
                'city_name' => 'Kota Banjar',
                'postal_code' => '46311',
            ),
            34 => 
            array (
                'city_id' => 35,
                'province_id' => 13,
                'city_name' => 'Kota Banjarbaru',
                'postal_code' => '70712',
            ),
            35 => 
            array (
                'city_id' => 36,
                'province_id' => 13,
                'city_name' => 'Kota Banjarmasin',
                'postal_code' => '70117',
            ),
            36 => 
            array (
                'city_id' => 37,
                'province_id' => 10,
                'city_name' => 'Kabupaten Banjarnegara',
                'postal_code' => '53419',
            ),
            37 => 
            array (
                'city_id' => 38,
                'province_id' => 28,
                'city_name' => 'Kabupaten Bantaeng',
                'postal_code' => '92411',
            ),
            38 => 
            array (
                'city_id' => 39,
                'province_id' => 5,
                'city_name' => 'Kabupaten Bantul',
                'postal_code' => '55715',
            ),
            39 => 
            array (
                'city_id' => 40,
                'province_id' => 33,
                'city_name' => 'Kabupaten Banyuasin',
                'postal_code' => '30911',
            ),
            40 => 
            array (
                'city_id' => 41,
                'province_id' => 10,
                'city_name' => 'Kabupaten Banyumas',
                'postal_code' => '53114',
            ),
            41 => 
            array (
                'city_id' => 42,
                'province_id' => 11,
                'city_name' => 'Kabupaten Banyuwangi',
                'postal_code' => '68416',
            ),
            42 => 
            array (
                'city_id' => 43,
                'province_id' => 13,
                'city_name' => 'Kabupaten Barito Kuala',
                'postal_code' => '70511',
            ),
            43 => 
            array (
                'city_id' => 44,
                'province_id' => 14,
                'city_name' => 'Kabupaten Barito Selatan',
                'postal_code' => '73711',
            ),
            44 => 
            array (
                'city_id' => 45,
                'province_id' => 14,
                'city_name' => 'Kabupaten Barito Timur',
                'postal_code' => '73671',
            ),
            45 => 
            array (
                'city_id' => 46,
                'province_id' => 14,
                'city_name' => 'Kabupaten Barito Utara',
                'postal_code' => '73881',
            ),
            46 => 
            array (
                'city_id' => 47,
                'province_id' => 28,
                'city_name' => 'Kabupaten Barru',
                'postal_code' => '90719',
            ),
            47 => 
            array (
                'city_id' => 48,
                'province_id' => 17,
                'city_name' => 'Kota Batam',
                'postal_code' => '29413',
            ),
            48 => 
            array (
                'city_id' => 49,
                'province_id' => 10,
                'city_name' => 'Kabupaten Batang',
                'postal_code' => '51211',
            ),
            49 => 
            array (
                'city_id' => 50,
                'province_id' => 8,
                'city_name' => 'Kabupaten Batang Hari',
                'postal_code' => '36613',
            ),
            50 => 
            array (
                'city_id' => 51,
                'province_id' => 11,
                'city_name' => 'Kota Batu',
                'postal_code' => '65311',
            ),
            51 => 
            array (
                'city_id' => 52,
                'province_id' => 34,
                'city_name' => 'Kabupaten Batu Bara',
                'postal_code' => '21655',
            ),
            52 => 
            array (
                'city_id' => 53,
                'province_id' => 30,
                'city_name' => 'Kota Bau-Bau',
                'postal_code' => '93719',
            ),
            53 => 
            array (
                'city_id' => 54,
                'province_id' => 9,
                'city_name' => 'Kabupaten Bekasi',
                'postal_code' => '17837',
            ),
            54 => 
            array (
                'city_id' => 55,
                'province_id' => 9,
                'city_name' => 'Kota Bekasi',
                'postal_code' => '17121',
            ),
            55 => 
            array (
                'city_id' => 56,
                'province_id' => 2,
                'city_name' => 'Kabupaten Belitung',
                'postal_code' => '33419',
            ),
            56 => 
            array (
                'city_id' => 57,
                'province_id' => 2,
                'city_name' => 'Kabupaten Belitung Timur',
                'postal_code' => '33519',
            ),
            57 => 
            array (
                'city_id' => 58,
                'province_id' => 23,
                'city_name' => 'Kabupaten Belu',
                'postal_code' => '85711',
            ),
            58 => 
            array (
                'city_id' => 59,
                'province_id' => 21,
                'city_name' => 'Kabupaten Bener Meriah',
                'postal_code' => '24581',
            ),
            59 => 
            array (
                'city_id' => 60,
                'province_id' => 26,
                'city_name' => 'Kabupaten Bengkalis',
                'postal_code' => '28719',
            ),
            60 => 
            array (
                'city_id' => 61,
                'province_id' => 12,
                'city_name' => 'Kabupaten Bengkayang',
                'postal_code' => '79213',
            ),
            61 => 
            array (
                'city_id' => 62,
                'province_id' => 4,
                'city_name' => 'Kota Bengkulu',
                'postal_code' => '38229',
            ),
            62 => 
            array (
                'city_id' => 63,
                'province_id' => 4,
                'city_name' => 'Kabupaten Bengkulu Selatan',
                'postal_code' => '38519',
            ),
            63 => 
            array (
                'city_id' => 64,
                'province_id' => 4,
                'city_name' => 'Kabupaten Bengkulu Tengah',
                'postal_code' => '38319',
            ),
            64 => 
            array (
                'city_id' => 65,
                'province_id' => 4,
                'city_name' => 'Kabupaten Bengkulu Utara',
                'postal_code' => '38619',
            ),
            65 => 
            array (
                'city_id' => 66,
                'province_id' => 15,
                'city_name' => 'Kabupaten Berau',
                'postal_code' => '77311',
            ),
            66 => 
            array (
                'city_id' => 67,
                'province_id' => 24,
                'city_name' => 'Kabupaten Biak Numfor',
                'postal_code' => '98119',
            ),
            67 => 
            array (
                'city_id' => 68,
                'province_id' => 22,
                'city_name' => 'Kabupaten Bima',
                'postal_code' => '84171',
            ),
            68 => 
            array (
                'city_id' => 69,
                'province_id' => 22,
                'city_name' => 'Kota Bima',
                'postal_code' => '84139',
            ),
            69 => 
            array (
                'city_id' => 70,
                'province_id' => 34,
                'city_name' => 'Kota Binjai',
                'postal_code' => '20712',
            ),
            70 => 
            array (
                'city_id' => 71,
                'province_id' => 17,
                'city_name' => 'Kabupaten Bintan',
                'postal_code' => '29135',
            ),
            71 => 
            array (
                'city_id' => 72,
                'province_id' => 21,
                'city_name' => 'Kabupaten Bireuen',
                'postal_code' => '24219',
            ),
            72 => 
            array (
                'city_id' => 73,
                'province_id' => 31,
                'city_name' => 'Kota Bitung',
                'postal_code' => '95512',
            ),
            73 => 
            array (
                'city_id' => 74,
                'province_id' => 11,
                'city_name' => 'Kabupaten Blitar',
                'postal_code' => '66171',
            ),
            74 => 
            array (
                'city_id' => 75,
                'province_id' => 11,
                'city_name' => 'Kota Blitar',
                'postal_code' => '66124',
            ),
            75 => 
            array (
                'city_id' => 76,
                'province_id' => 10,
                'city_name' => 'Kabupaten Blora',
                'postal_code' => '58219',
            ),
            76 => 
            array (
                'city_id' => 77,
                'province_id' => 7,
                'city_name' => 'Kabupaten Boalemo',
                'postal_code' => '96319',
            ),
            77 => 
            array (
                'city_id' => 78,
                'province_id' => 9,
                'city_name' => 'Kabupaten Bogor',
                'postal_code' => '16911',
            ),
            78 => 
            array (
                'city_id' => 79,
                'province_id' => 9,
                'city_name' => 'Kota Bogor',
                'postal_code' => '16119',
            ),
            79 => 
            array (
                'city_id' => 80,
                'province_id' => 11,
                'city_name' => 'Kabupaten Bojonegoro',
                'postal_code' => '62119',
            ),
            80 => 
            array (
                'city_id' => 81,
                'province_id' => 31,
            'city_name' => 'Kabupaten Bolaang Mongondow (Bolmong)',
                'postal_code' => '95755',
            ),
            81 => 
            array (
                'city_id' => 82,
                'province_id' => 31,
                'city_name' => 'Kabupaten Bolaang Mongondow Selatan',
                'postal_code' => '95774',
            ),
            82 => 
            array (
                'city_id' => 83,
                'province_id' => 31,
                'city_name' => 'Kabupaten Bolaang Mongondow Timur',
                'postal_code' => '95783',
            ),
            83 => 
            array (
                'city_id' => 84,
                'province_id' => 31,
                'city_name' => 'Kabupaten Bolaang Mongondow Utara',
                'postal_code' => '95765',
            ),
            84 => 
            array (
                'city_id' => 85,
                'province_id' => 30,
                'city_name' => 'Kabupaten Bombana',
                'postal_code' => '93771',
            ),
            85 => 
            array (
                'city_id' => 86,
                'province_id' => 11,
                'city_name' => 'Kabupaten Bondowoso',
                'postal_code' => '68219',
            ),
            86 => 
            array (
                'city_id' => 87,
                'province_id' => 28,
                'city_name' => 'Kabupaten Bone',
                'postal_code' => '92713',
            ),
            87 => 
            array (
                'city_id' => 88,
                'province_id' => 7,
                'city_name' => 'Kabupaten Bone Bolango',
                'postal_code' => '96511',
            ),
            88 => 
            array (
                'city_id' => 89,
                'province_id' => 15,
                'city_name' => 'Kota Bontang',
                'postal_code' => '75313',
            ),
            89 => 
            array (
                'city_id' => 90,
                'province_id' => 24,
                'city_name' => 'Kabupaten Boven Digoel',
                'postal_code' => '99662',
            ),
            90 => 
            array (
                'city_id' => 91,
                'province_id' => 10,
                'city_name' => 'Kabupaten Boyolali',
                'postal_code' => '57312',
            ),
            91 => 
            array (
                'city_id' => 92,
                'province_id' => 10,
                'city_name' => 'Kabupaten Brebes',
                'postal_code' => '52212',
            ),
            92 => 
            array (
                'city_id' => 93,
                'province_id' => 32,
                'city_name' => 'Kota Bukittinggi',
                'postal_code' => '26115',
            ),
            93 => 
            array (
                'city_id' => 94,
                'province_id' => 1,
                'city_name' => 'Kabupaten Buleleng',
                'postal_code' => '81111',
            ),
            94 => 
            array (
                'city_id' => 95,
                'province_id' => 28,
                'city_name' => 'Kabupaten Bulukumba',
                'postal_code' => '92511',
            ),
            95 => 
            array (
                'city_id' => 96,
                'province_id' => 16,
            'city_name' => 'Kabupaten Bulungan (Bulongan)',
                'postal_code' => '77211',
            ),
            96 => 
            array (
                'city_id' => 97,
                'province_id' => 8,
                'city_name' => 'Kabupaten Bungo',
                'postal_code' => '37216',
            ),
            97 => 
            array (
                'city_id' => 98,
                'province_id' => 29,
                'city_name' => 'Kabupaten Buol',
                'postal_code' => '94564',
            ),
            98 => 
            array (
                'city_id' => 99,
                'province_id' => 19,
                'city_name' => 'Kabupaten Buru',
                'postal_code' => '97371',
            ),
            99 => 
            array (
                'city_id' => 100,
                'province_id' => 19,
                'city_name' => 'Kabupaten Buru Selatan',
                'postal_code' => '97351',
            ),
            100 => 
            array (
                'city_id' => 101,
                'province_id' => 30,
                'city_name' => 'Kabupaten Buton',
                'postal_code' => '93754',
            ),
            101 => 
            array (
                'city_id' => 102,
                'province_id' => 30,
                'city_name' => 'Kabupaten Buton Utara',
                'postal_code' => '93745',
            ),
            102 => 
            array (
                'city_id' => 103,
                'province_id' => 9,
                'city_name' => 'Kabupaten Ciamis',
                'postal_code' => '46211',
            ),
            103 => 
            array (
                'city_id' => 104,
                'province_id' => 9,
                'city_name' => 'Kabupaten Cianjur',
                'postal_code' => '43217',
            ),
            104 => 
            array (
                'city_id' => 105,
                'province_id' => 10,
                'city_name' => 'Kabupaten Cilacap',
                'postal_code' => '53211',
            ),
            105 => 
            array (
                'city_id' => 106,
                'province_id' => 3,
                'city_name' => 'Kota Cilegon',
                'postal_code' => '42417',
            ),
            106 => 
            array (
                'city_id' => 107,
                'province_id' => 9,
                'city_name' => 'Kota Cimahi',
                'postal_code' => '40512',
            ),
            107 => 
            array (
                'city_id' => 108,
                'province_id' => 9,
                'city_name' => 'Kabupaten Cirebon',
                'postal_code' => '45611',
            ),
            108 => 
            array (
                'city_id' => 109,
                'province_id' => 9,
                'city_name' => 'Kota Cirebon',
                'postal_code' => '45116',
            ),
            109 => 
            array (
                'city_id' => 110,
                'province_id' => 34,
                'city_name' => 'Kabupaten Dairi',
                'postal_code' => '22211',
            ),
            110 => 
            array (
                'city_id' => 111,
                'province_id' => 24,
            'city_name' => 'Kabupaten Deiyai (Deliyai)',
                'postal_code' => '98784',
            ),
            111 => 
            array (
                'city_id' => 112,
                'province_id' => 34,
                'city_name' => 'Kabupaten Deli Serdang',
                'postal_code' => '20511',
            ),
            112 => 
            array (
                'city_id' => 113,
                'province_id' => 10,
                'city_name' => 'Kabupaten Demak',
                'postal_code' => '59519',
            ),
            113 => 
            array (
                'city_id' => 114,
                'province_id' => 1,
                'city_name' => 'Kota Denpasar',
                'postal_code' => '80227',
            ),
            114 => 
            array (
                'city_id' => 115,
                'province_id' => 9,
                'city_name' => 'Kota Depok',
                'postal_code' => '16416',
            ),
            115 => 
            array (
                'city_id' => 116,
                'province_id' => 32,
                'city_name' => 'Kabupaten Dharmasraya',
                'postal_code' => '27612',
            ),
            116 => 
            array (
                'city_id' => 117,
                'province_id' => 24,
                'city_name' => 'Kabupaten Dogiyai',
                'postal_code' => '98866',
            ),
            117 => 
            array (
                'city_id' => 118,
                'province_id' => 22,
                'city_name' => 'Kabupaten Dompu',
                'postal_code' => '84217',
            ),
            118 => 
            array (
                'city_id' => 119,
                'province_id' => 29,
                'city_name' => 'Kabupaten Donggala',
                'postal_code' => '94341',
            ),
            119 => 
            array (
                'city_id' => 120,
                'province_id' => 26,
                'city_name' => 'Kota Dumai',
                'postal_code' => '28811',
            ),
            120 => 
            array (
                'city_id' => 121,
                'province_id' => 33,
                'city_name' => 'Kabupaten Empat Lawang',
                'postal_code' => '31811',
            ),
            121 => 
            array (
                'city_id' => 122,
                'province_id' => 23,
                'city_name' => 'Kabupaten Ende',
                'postal_code' => '86351',
            ),
            122 => 
            array (
                'city_id' => 123,
                'province_id' => 28,
                'city_name' => 'Kabupaten Enrekang',
                'postal_code' => '91719',
            ),
            123 => 
            array (
                'city_id' => 124,
                'province_id' => 25,
                'city_name' => 'Kabupaten Fakfak',
                'postal_code' => '98651',
            ),
            124 => 
            array (
                'city_id' => 125,
                'province_id' => 23,
                'city_name' => 'Kabupaten Flores Timur',
                'postal_code' => '86213',
            ),
            125 => 
            array (
                'city_id' => 126,
                'province_id' => 9,
                'city_name' => 'Kabupaten Garut',
                'postal_code' => '44126',
            ),
            126 => 
            array (
                'city_id' => 127,
                'province_id' => 21,
                'city_name' => 'Kabupaten Gayo Lues',
                'postal_code' => '24653',
            ),
            127 => 
            array (
                'city_id' => 128,
                'province_id' => 1,
                'city_name' => 'Kabupaten Gianyar',
                'postal_code' => '80519',
            ),
            128 => 
            array (
                'city_id' => 129,
                'province_id' => 7,
                'city_name' => 'Kabupaten Gorontalo',
                'postal_code' => '96218',
            ),
            129 => 
            array (
                'city_id' => 130,
                'province_id' => 7,
                'city_name' => 'Kota Gorontalo',
                'postal_code' => '96115',
            ),
            130 => 
            array (
                'city_id' => 131,
                'province_id' => 7,
                'city_name' => 'Kabupaten Gorontalo Utara',
                'postal_code' => '96611',
            ),
            131 => 
            array (
                'city_id' => 132,
                'province_id' => 28,
                'city_name' => 'Kabupaten Gowa',
                'postal_code' => '92111',
            ),
            132 => 
            array (
                'city_id' => 133,
                'province_id' => 11,
                'city_name' => 'Kabupaten Gresik',
                'postal_code' => '61115',
            ),
            133 => 
            array (
                'city_id' => 134,
                'province_id' => 10,
                'city_name' => 'Kabupaten Grobogan',
                'postal_code' => '58111',
            ),
            134 => 
            array (
                'city_id' => 135,
                'province_id' => 5,
                'city_name' => 'Kabupaten Gunung Kidul',
                'postal_code' => '55812',
            ),
            135 => 
            array (
                'city_id' => 136,
                'province_id' => 14,
                'city_name' => 'Kabupaten Gunung Mas',
                'postal_code' => '74511',
            ),
            136 => 
            array (
                'city_id' => 137,
                'province_id' => 34,
                'city_name' => 'Kota Gunungsitoli',
                'postal_code' => '22813',
            ),
            137 => 
            array (
                'city_id' => 138,
                'province_id' => 20,
                'city_name' => 'Kabupaten Halmahera Barat',
                'postal_code' => '97757',
            ),
            138 => 
            array (
                'city_id' => 139,
                'province_id' => 20,
                'city_name' => 'Kabupaten Halmahera Selatan',
                'postal_code' => '97911',
            ),
            139 => 
            array (
                'city_id' => 140,
                'province_id' => 20,
                'city_name' => 'Kabupaten Halmahera Tengah',
                'postal_code' => '97853',
            ),
            140 => 
            array (
                'city_id' => 141,
                'province_id' => 20,
                'city_name' => 'Kabupaten Halmahera Timur',
                'postal_code' => '97862',
            ),
            141 => 
            array (
                'city_id' => 142,
                'province_id' => 20,
                'city_name' => 'Kabupaten Halmahera Utara',
                'postal_code' => '97762',
            ),
            142 => 
            array (
                'city_id' => 143,
                'province_id' => 13,
                'city_name' => 'Kabupaten Hulu Sungai Selatan',
                'postal_code' => '71212',
            ),
            143 => 
            array (
                'city_id' => 144,
                'province_id' => 13,
                'city_name' => 'Kabupaten Hulu Sungai Tengah',
                'postal_code' => '71313',
            ),
            144 => 
            array (
                'city_id' => 145,
                'province_id' => 13,
                'city_name' => 'Kabupaten Hulu Sungai Utara',
                'postal_code' => '71419',
            ),
            145 => 
            array (
                'city_id' => 146,
                'province_id' => 34,
                'city_name' => 'Kabupaten Humbang Hasundutan',
                'postal_code' => '22457',
            ),
            146 => 
            array (
                'city_id' => 147,
                'province_id' => 26,
                'city_name' => 'Kabupaten Indragiri Hilir',
                'postal_code' => '29212',
            ),
            147 => 
            array (
                'city_id' => 148,
                'province_id' => 26,
                'city_name' => 'Kabupaten Indragiri Hulu',
                'postal_code' => '29319',
            ),
            148 => 
            array (
                'city_id' => 149,
                'province_id' => 9,
                'city_name' => 'Kabupaten Indramayu',
                'postal_code' => '45214',
            ),
            149 => 
            array (
                'city_id' => 150,
                'province_id' => 24,
                'city_name' => 'Kabupaten Intan Jaya',
                'postal_code' => '98771',
            ),
            150 => 
            array (
                'city_id' => 151,
                'province_id' => 6,
                'city_name' => 'Kota Jakarta Barat',
                'postal_code' => '11220',
            ),
            151 => 
            array (
                'city_id' => 152,
                'province_id' => 6,
                'city_name' => 'Kota Jakarta Pusat',
                'postal_code' => '10540',
            ),
            152 => 
            array (
                'city_id' => 153,
                'province_id' => 6,
                'city_name' => 'Kota Jakarta Selatan',
                'postal_code' => '12230',
            ),
            153 => 
            array (
                'city_id' => 154,
                'province_id' => 6,
                'city_name' => 'Kota Jakarta Timur',
                'postal_code' => '13330',
            ),
            154 => 
            array (
                'city_id' => 155,
                'province_id' => 6,
                'city_name' => 'Kota Jakarta Utara',
                'postal_code' => '14140',
            ),
            155 => 
            array (
                'city_id' => 156,
                'province_id' => 8,
                'city_name' => 'Kota Jambi',
                'postal_code' => '36111',
            ),
            156 => 
            array (
                'city_id' => 157,
                'province_id' => 24,
                'city_name' => 'Kabupaten Jayapura',
                'postal_code' => '99352',
            ),
            157 => 
            array (
                'city_id' => 158,
                'province_id' => 24,
                'city_name' => 'Kota Jayapura',
                'postal_code' => '99114',
            ),
            158 => 
            array (
                'city_id' => 159,
                'province_id' => 24,
                'city_name' => 'Kabupaten Jayawijaya',
                'postal_code' => '99511',
            ),
            159 => 
            array (
                'city_id' => 160,
                'province_id' => 11,
                'city_name' => 'Kabupaten Jember',
                'postal_code' => '68113',
            ),
            160 => 
            array (
                'city_id' => 161,
                'province_id' => 1,
                'city_name' => 'Kabupaten Jembrana',
                'postal_code' => '82251',
            ),
            161 => 
            array (
                'city_id' => 162,
                'province_id' => 28,
                'city_name' => 'Kabupaten Jeneponto',
                'postal_code' => '92319',
            ),
            162 => 
            array (
                'city_id' => 163,
                'province_id' => 10,
                'city_name' => 'Kabupaten Jepara',
                'postal_code' => '59419',
            ),
            163 => 
            array (
                'city_id' => 164,
                'province_id' => 11,
                'city_name' => 'Kabupaten Jombang',
                'postal_code' => '61415',
            ),
            164 => 
            array (
                'city_id' => 165,
                'province_id' => 25,
                'city_name' => 'Kabupaten Kaimana',
                'postal_code' => '98671',
            ),
            165 => 
            array (
                'city_id' => 166,
                'province_id' => 26,
                'city_name' => 'Kabupaten Kampar',
                'postal_code' => '28411',
            ),
            166 => 
            array (
                'city_id' => 167,
                'province_id' => 14,
                'city_name' => 'Kabupaten Kapuas',
                'postal_code' => '73583',
            ),
            167 => 
            array (
                'city_id' => 168,
                'province_id' => 12,
                'city_name' => 'Kabupaten Kapuas Hulu',
                'postal_code' => '78719',
            ),
            168 => 
            array (
                'city_id' => 169,
                'province_id' => 10,
                'city_name' => 'Kabupaten Karanganyar',
                'postal_code' => '57718',
            ),
            169 => 
            array (
                'city_id' => 170,
                'province_id' => 1,
                'city_name' => 'Kabupaten Karangasem',
                'postal_code' => '80819',
            ),
            170 => 
            array (
                'city_id' => 171,
                'province_id' => 9,
                'city_name' => 'Kabupaten Karawang',
                'postal_code' => '41311',
            ),
            171 => 
            array (
                'city_id' => 172,
                'province_id' => 17,
                'city_name' => 'Kabupaten Karimun',
                'postal_code' => '29611',
            ),
            172 => 
            array (
                'city_id' => 173,
                'province_id' => 34,
                'city_name' => 'Kabupaten Karo',
                'postal_code' => '22119',
            ),
            173 => 
            array (
                'city_id' => 174,
                'province_id' => 14,
                'city_name' => 'Kabupaten Katingan',
                'postal_code' => '74411',
            ),
            174 => 
            array (
                'city_id' => 175,
                'province_id' => 4,
                'city_name' => 'Kabupaten Kaur',
                'postal_code' => '38911',
            ),
            175 => 
            array (
                'city_id' => 176,
                'province_id' => 12,
                'city_name' => 'Kabupaten Kayong Utara',
                'postal_code' => '78852',
            ),
            176 => 
            array (
                'city_id' => 177,
                'province_id' => 10,
                'city_name' => 'Kabupaten Kebumen',
                'postal_code' => '54319',
            ),
            177 => 
            array (
                'city_id' => 178,
                'province_id' => 11,
                'city_name' => 'Kabupaten Kediri',
                'postal_code' => '64184',
            ),
            178 => 
            array (
                'city_id' => 179,
                'province_id' => 11,
                'city_name' => 'Kota Kediri',
                'postal_code' => '64125',
            ),
            179 => 
            array (
                'city_id' => 180,
                'province_id' => 24,
                'city_name' => 'Kabupaten Keerom',
                'postal_code' => '99461',
            ),
            180 => 
            array (
                'city_id' => 181,
                'province_id' => 10,
                'city_name' => 'Kabupaten Kendal',
                'postal_code' => '51314',
            ),
            181 => 
            array (
                'city_id' => 182,
                'province_id' => 30,
                'city_name' => 'Kota Kendari',
                'postal_code' => '93126',
            ),
            182 => 
            array (
                'city_id' => 183,
                'province_id' => 4,
                'city_name' => 'Kabupaten Kepahiang',
                'postal_code' => '39319',
            ),
            183 => 
            array (
                'city_id' => 184,
                'province_id' => 17,
                'city_name' => 'Kabupaten Kepulauan Anambas',
                'postal_code' => '29991',
            ),
            184 => 
            array (
                'city_id' => 185,
                'province_id' => 19,
                'city_name' => 'Kabupaten Kepulauan Aru',
                'postal_code' => '97681',
            ),
            185 => 
            array (
                'city_id' => 186,
                'province_id' => 32,
                'city_name' => 'Kabupaten Kepulauan Mentawai',
                'postal_code' => '25771',
            ),
            186 => 
            array (
                'city_id' => 187,
                'province_id' => 26,
                'city_name' => 'Kabupaten Kepulauan Meranti',
                'postal_code' => '28791',
            ),
            187 => 
            array (
                'city_id' => 188,
                'province_id' => 31,
                'city_name' => 'Kabupaten Kepulauan Sangihe',
                'postal_code' => '95819',
            ),
            188 => 
            array (
                'city_id' => 189,
                'province_id' => 6,
                'city_name' => 'Kabupaten Kepulauan Seribu',
                'postal_code' => '14550',
            ),
            189 => 
            array (
                'city_id' => 190,
                'province_id' => 31,
            'city_name' => 'Kabupaten Kepulauan Siau Tagulandang Biaro (Sitaro)',
                'postal_code' => '95862',
            ),
            190 => 
            array (
                'city_id' => 191,
                'province_id' => 20,
                'city_name' => 'Kabupaten Kepulauan Sula',
                'postal_code' => '97995',
            ),
            191 => 
            array (
                'city_id' => 192,
                'province_id' => 31,
                'city_name' => 'Kabupaten Kepulauan Talaud',
                'postal_code' => '95885',
            ),
            192 => 
            array (
                'city_id' => 193,
                'province_id' => 24,
            'city_name' => 'Kabupaten Kepulauan Yapen (Yapen Waropen)',
                'postal_code' => '98211',
            ),
            193 => 
            array (
                'city_id' => 194,
                'province_id' => 8,
                'city_name' => 'Kabupaten Kerinci',
                'postal_code' => '37167',
            ),
            194 => 
            array (
                'city_id' => 195,
                'province_id' => 12,
                'city_name' => 'Kabupaten Ketapang',
                'postal_code' => '78874',
            ),
            195 => 
            array (
                'city_id' => 196,
                'province_id' => 10,
                'city_name' => 'Kabupaten Klaten',
                'postal_code' => '57411',
            ),
            196 => 
            array (
                'city_id' => 197,
                'province_id' => 1,
                'city_name' => 'Kabupaten Klungkung',
                'postal_code' => '80719',
            ),
            197 => 
            array (
                'city_id' => 198,
                'province_id' => 30,
                'city_name' => 'Kabupaten Kolaka',
                'postal_code' => '93511',
            ),
            198 => 
            array (
                'city_id' => 199,
                'province_id' => 30,
                'city_name' => 'Kabupaten Kolaka Utara',
                'postal_code' => '93911',
            ),
            199 => 
            array (
                'city_id' => 200,
                'province_id' => 30,
                'city_name' => 'Kabupaten Konawe',
                'postal_code' => '93411',
            ),
            200 => 
            array (
                'city_id' => 201,
                'province_id' => 30,
                'city_name' => 'Kabupaten Konawe Selatan',
                'postal_code' => '93811',
            ),
            201 => 
            array (
                'city_id' => 202,
                'province_id' => 30,
                'city_name' => 'Kabupaten Konawe Utara',
                'postal_code' => '93311',
            ),
            202 => 
            array (
                'city_id' => 203,
                'province_id' => 13,
                'city_name' => 'Kabupaten Kotabaru',
                'postal_code' => '72119',
            ),
            203 => 
            array (
                'city_id' => 204,
                'province_id' => 31,
                'city_name' => 'Kota Kotamobagu',
                'postal_code' => '95711',
            ),
            204 => 
            array (
                'city_id' => 205,
                'province_id' => 14,
                'city_name' => 'Kabupaten Kotawaringin Barat',
                'postal_code' => '74119',
            ),
            205 => 
            array (
                'city_id' => 206,
                'province_id' => 14,
                'city_name' => 'Kabupaten Kotawaringin Timur',
                'postal_code' => '74364',
            ),
            206 => 
            array (
                'city_id' => 207,
                'province_id' => 26,
                'city_name' => 'Kabupaten Kuantan Singingi',
                'postal_code' => '29519',
            ),
            207 => 
            array (
                'city_id' => 208,
                'province_id' => 12,
                'city_name' => 'Kabupaten Kubu Raya',
                'postal_code' => '78311',
            ),
            208 => 
            array (
                'city_id' => 209,
                'province_id' => 10,
                'city_name' => 'Kabupaten Kudus',
                'postal_code' => '59311',
            ),
            209 => 
            array (
                'city_id' => 210,
                'province_id' => 5,
                'city_name' => 'Kabupaten Kulon Progo',
                'postal_code' => '55611',
            ),
            210 => 
            array (
                'city_id' => 211,
                'province_id' => 9,
                'city_name' => 'Kabupaten Kuningan',
                'postal_code' => '45511',
            ),
            211 => 
            array (
                'city_id' => 212,
                'province_id' => 23,
                'city_name' => 'Kabupaten Kupang',
                'postal_code' => '85362',
            ),
            212 => 
            array (
                'city_id' => 213,
                'province_id' => 23,
                'city_name' => 'Kota Kupang',
                'postal_code' => '85119',
            ),
            213 => 
            array (
                'city_id' => 214,
                'province_id' => 15,
                'city_name' => 'Kabupaten Kutai Barat',
                'postal_code' => '75711',
            ),
            214 => 
            array (
                'city_id' => 215,
                'province_id' => 15,
                'city_name' => 'Kabupaten Kutai Kartanegara',
                'postal_code' => '75511',
            ),
            215 => 
            array (
                'city_id' => 216,
                'province_id' => 15,
                'city_name' => 'Kabupaten Kutai Timur',
                'postal_code' => '75611',
            ),
            216 => 
            array (
                'city_id' => 217,
                'province_id' => 34,
                'city_name' => 'Kabupaten Labuhan Batu',
                'postal_code' => '21412',
            ),
            217 => 
            array (
                'city_id' => 218,
                'province_id' => 34,
                'city_name' => 'Kabupaten Labuhan Batu Selatan',
                'postal_code' => '21511',
            ),
            218 => 
            array (
                'city_id' => 219,
                'province_id' => 34,
                'city_name' => 'Kabupaten Labuhan Batu Utara',
                'postal_code' => '21711',
            ),
            219 => 
            array (
                'city_id' => 220,
                'province_id' => 33,
                'city_name' => 'Kabupaten Lahat',
                'postal_code' => '31419',
            ),
            220 => 
            array (
                'city_id' => 221,
                'province_id' => 14,
                'city_name' => 'Kabupaten Lamandau',
                'postal_code' => '74611',
            ),
            221 => 
            array (
                'city_id' => 222,
                'province_id' => 11,
                'city_name' => 'Kabupaten Lamongan',
                'postal_code' => '64125',
            ),
            222 => 
            array (
                'city_id' => 223,
                'province_id' => 18,
                'city_name' => 'Kabupaten Lampung Barat',
                'postal_code' => '34814',
            ),
            223 => 
            array (
                'city_id' => 224,
                'province_id' => 18,
                'city_name' => 'Kabupaten Lampung Selatan',
                'postal_code' => '35511',
            ),
            224 => 
            array (
                'city_id' => 225,
                'province_id' => 18,
                'city_name' => 'Kabupaten Lampung Tengah',
                'postal_code' => '34212',
            ),
            225 => 
            array (
                'city_id' => 226,
                'province_id' => 18,
                'city_name' => 'Kabupaten Lampung Timur',
                'postal_code' => '34319',
            ),
            226 => 
            array (
                'city_id' => 227,
                'province_id' => 18,
                'city_name' => 'Kabupaten Lampung Utara',
                'postal_code' => '34516',
            ),
            227 => 
            array (
                'city_id' => 228,
                'province_id' => 12,
                'city_name' => 'Kabupaten Landak',
                'postal_code' => '78319',
            ),
            228 => 
            array (
                'city_id' => 229,
                'province_id' => 34,
                'city_name' => 'Kabupaten Langkat',
                'postal_code' => '20811',
            ),
            229 => 
            array (
                'city_id' => 230,
                'province_id' => 21,
                'city_name' => 'Kota Langsa',
                'postal_code' => '24412',
            ),
            230 => 
            array (
                'city_id' => 231,
                'province_id' => 24,
                'city_name' => 'Kabupaten Lanny Jaya',
                'postal_code' => '99531',
            ),
            231 => 
            array (
                'city_id' => 232,
                'province_id' => 3,
                'city_name' => 'Kabupaten Lebak',
                'postal_code' => '42319',
            ),
            232 => 
            array (
                'city_id' => 233,
                'province_id' => 4,
                'city_name' => 'Kabupaten Lebong',
                'postal_code' => '39264',
            ),
            233 => 
            array (
                'city_id' => 234,
                'province_id' => 23,
                'city_name' => 'Kabupaten Lembata',
                'postal_code' => '86611',
            ),
            234 => 
            array (
                'city_id' => 235,
                'province_id' => 21,
                'city_name' => 'Kota Lhokseumawe',
                'postal_code' => '24352',
            ),
            235 => 
            array (
                'city_id' => 236,
                'province_id' => 32,
                'city_name' => 'Kabupaten Lima Puluh Koto/Kota',
                'postal_code' => '26671',
            ),
            236 => 
            array (
                'city_id' => 237,
                'province_id' => 17,
                'city_name' => 'Kabupaten Lingga',
                'postal_code' => '29811',
            ),
            237 => 
            array (
                'city_id' => 238,
                'province_id' => 22,
                'city_name' => 'Kabupaten Lombok Barat',
                'postal_code' => '83311',
            ),
            238 => 
            array (
                'city_id' => 239,
                'province_id' => 22,
                'city_name' => 'Kabupaten Lombok Tengah',
                'postal_code' => '83511',
            ),
            239 => 
            array (
                'city_id' => 240,
                'province_id' => 22,
                'city_name' => 'Kabupaten Lombok Timur',
                'postal_code' => '83612',
            ),
            240 => 
            array (
                'city_id' => 241,
                'province_id' => 22,
                'city_name' => 'Kabupaten Lombok Utara',
                'postal_code' => '83711',
            ),
            241 => 
            array (
                'city_id' => 242,
                'province_id' => 33,
                'city_name' => 'Kota Lubuk Linggau',
                'postal_code' => '31614',
            ),
            242 => 
            array (
                'city_id' => 243,
                'province_id' => 11,
                'city_name' => 'Kabupaten Lumajang',
                'postal_code' => '67319',
            ),
            243 => 
            array (
                'city_id' => 244,
                'province_id' => 28,
                'city_name' => 'Kabupaten Luwu',
                'postal_code' => '91994',
            ),
            244 => 
            array (
                'city_id' => 245,
                'province_id' => 28,
                'city_name' => 'Kabupaten Luwu Timur',
                'postal_code' => '92981',
            ),
            245 => 
            array (
                'city_id' => 246,
                'province_id' => 28,
                'city_name' => 'Kabupaten Luwu Utara',
                'postal_code' => '92911',
            ),
            246 => 
            array (
                'city_id' => 247,
                'province_id' => 11,
                'city_name' => 'Kabupaten Madiun',
                'postal_code' => '63153',
            ),
            247 => 
            array (
                'city_id' => 248,
                'province_id' => 11,
                'city_name' => 'Kota Madiun',
                'postal_code' => '63122',
            ),
            248 => 
            array (
                'city_id' => 249,
                'province_id' => 10,
                'city_name' => 'Kabupaten Magelang',
                'postal_code' => '56519',
            ),
            249 => 
            array (
                'city_id' => 250,
                'province_id' => 10,
                'city_name' => 'Kota Magelang',
                'postal_code' => '56133',
            ),
            250 => 
            array (
                'city_id' => 251,
                'province_id' => 11,
                'city_name' => 'Kabupaten Magetan',
                'postal_code' => '63314',
            ),
            251 => 
            array (
                'city_id' => 252,
                'province_id' => 9,
                'city_name' => 'Kabupaten Majalengka',
                'postal_code' => '45412',
            ),
            252 => 
            array (
                'city_id' => 253,
                'province_id' => 27,
                'city_name' => 'Kabupaten Majene',
                'postal_code' => '91411',
            ),
            253 => 
            array (
                'city_id' => 254,
                'province_id' => 28,
                'city_name' => 'Kota Makassar',
                'postal_code' => '90111',
            ),
            254 => 
            array (
                'city_id' => 255,
                'province_id' => 11,
                'city_name' => 'Kabupaten Malang',
                'postal_code' => '65163',
            ),
            255 => 
            array (
                'city_id' => 256,
                'province_id' => 11,
                'city_name' => 'Kota Malang',
                'postal_code' => '65112',
            ),
            256 => 
            array (
                'city_id' => 257,
                'province_id' => 16,
                'city_name' => 'Kabupaten Malinau',
                'postal_code' => '77511',
            ),
            257 => 
            array (
                'city_id' => 258,
                'province_id' => 19,
                'city_name' => 'Kabupaten Maluku Barat Daya',
                'postal_code' => '97451',
            ),
            258 => 
            array (
                'city_id' => 259,
                'province_id' => 19,
                'city_name' => 'Kabupaten Maluku Tengah',
                'postal_code' => '97513',
            ),
            259 => 
            array (
                'city_id' => 260,
                'province_id' => 19,
                'city_name' => 'Kabupaten Maluku Tenggara',
                'postal_code' => '97651',
            ),
            260 => 
            array (
                'city_id' => 261,
                'province_id' => 19,
                'city_name' => 'Kabupaten Maluku Tenggara Barat',
                'postal_code' => '97465',
            ),
            261 => 
            array (
                'city_id' => 262,
                'province_id' => 27,
                'city_name' => 'Kabupaten Mamasa',
                'postal_code' => '91362',
            ),
            262 => 
            array (
                'city_id' => 263,
                'province_id' => 24,
                'city_name' => 'Kabupaten Mamberamo Raya',
                'postal_code' => '99381',
            ),
            263 => 
            array (
                'city_id' => 264,
                'province_id' => 24,
                'city_name' => 'Kabupaten Mamberamo Tengah',
                'postal_code' => '99553',
            ),
            264 => 
            array (
                'city_id' => 265,
                'province_id' => 27,
                'city_name' => 'Kabupaten Mamuju',
                'postal_code' => '91519',
            ),
            265 => 
            array (
                'city_id' => 266,
                'province_id' => 27,
                'city_name' => 'Kabupaten Mamuju Utara',
                'postal_code' => '91571',
            ),
            266 => 
            array (
                'city_id' => 267,
                'province_id' => 31,
                'city_name' => 'Kota Manado',
                'postal_code' => '95247',
            ),
            267 => 
            array (
                'city_id' => 268,
                'province_id' => 34,
                'city_name' => 'Kabupaten Mandailing Natal',
                'postal_code' => '22916',
            ),
            268 => 
            array (
                'city_id' => 269,
                'province_id' => 23,
                'city_name' => 'Kabupaten Manggarai',
                'postal_code' => '86551',
            ),
            269 => 
            array (
                'city_id' => 270,
                'province_id' => 23,
                'city_name' => 'Kabupaten Manggarai Barat',
                'postal_code' => '86711',
            ),
            270 => 
            array (
                'city_id' => 271,
                'province_id' => 23,
                'city_name' => 'Kabupaten Manggarai Timur',
                'postal_code' => '86811',
            ),
            271 => 
            array (
                'city_id' => 272,
                'province_id' => 25,
                'city_name' => 'Kabupaten Manokwari',
                'postal_code' => '98311',
            ),
            272 => 
            array (
                'city_id' => 273,
                'province_id' => 25,
                'city_name' => 'Kabupaten Manokwari Selatan',
                'postal_code' => '98355',
            ),
            273 => 
            array (
                'city_id' => 274,
                'province_id' => 24,
                'city_name' => 'Kabupaten Mappi',
                'postal_code' => '99853',
            ),
            274 => 
            array (
                'city_id' => 275,
                'province_id' => 28,
                'city_name' => 'Kabupaten Maros',
                'postal_code' => '90511',
            ),
            275 => 
            array (
                'city_id' => 276,
                'province_id' => 22,
                'city_name' => 'Kota Mataram',
                'postal_code' => '83131',
            ),
            276 => 
            array (
                'city_id' => 277,
                'province_id' => 25,
                'city_name' => 'Kabupaten Maybrat',
                'postal_code' => '98051',
            ),
            277 => 
            array (
                'city_id' => 278,
                'province_id' => 34,
                'city_name' => 'Kota Medan',
                'postal_code' => '20228',
            ),
            278 => 
            array (
                'city_id' => 279,
                'province_id' => 12,
                'city_name' => 'Kabupaten Melawi',
                'postal_code' => '78619',
            ),
            279 => 
            array (
                'city_id' => 280,
                'province_id' => 8,
                'city_name' => 'Kabupaten Merangin',
                'postal_code' => '37319',
            ),
            280 => 
            array (
                'city_id' => 281,
                'province_id' => 24,
                'city_name' => 'Kabupaten Merauke',
                'postal_code' => '99613',
            ),
            281 => 
            array (
                'city_id' => 282,
                'province_id' => 18,
                'city_name' => 'Kabupaten Mesuji',
                'postal_code' => '34911',
            ),
            282 => 
            array (
                'city_id' => 283,
                'province_id' => 18,
                'city_name' => 'Kota Metro',
                'postal_code' => '34111',
            ),
            283 => 
            array (
                'city_id' => 284,
                'province_id' => 24,
                'city_name' => 'Kabupaten Mimika',
                'postal_code' => '99962',
            ),
            284 => 
            array (
                'city_id' => 285,
                'province_id' => 31,
                'city_name' => 'Kabupaten Minahasa',
                'postal_code' => '95614',
            ),
            285 => 
            array (
                'city_id' => 286,
                'province_id' => 31,
                'city_name' => 'Kabupaten Minahasa Selatan',
                'postal_code' => '95914',
            ),
            286 => 
            array (
                'city_id' => 287,
                'province_id' => 31,
                'city_name' => 'Kabupaten Minahasa Tenggara',
                'postal_code' => '95995',
            ),
            287 => 
            array (
                'city_id' => 288,
                'province_id' => 31,
                'city_name' => 'Kabupaten Minahasa Utara',
                'postal_code' => '95316',
            ),
            288 => 
            array (
                'city_id' => 289,
                'province_id' => 11,
                'city_name' => 'Kabupaten Mojokerto',
                'postal_code' => '61382',
            ),
            289 => 
            array (
                'city_id' => 290,
                'province_id' => 11,
                'city_name' => 'Kota Mojokerto',
                'postal_code' => '61316',
            ),
            290 => 
            array (
                'city_id' => 291,
                'province_id' => 29,
                'city_name' => 'Kabupaten Morowali',
                'postal_code' => '94911',
            ),
            291 => 
            array (
                'city_id' => 292,
                'province_id' => 33,
                'city_name' => 'Kabupaten Muara Enim',
                'postal_code' => '31315',
            ),
            292 => 
            array (
                'city_id' => 293,
                'province_id' => 8,
                'city_name' => 'Kabupaten Muaro Jambi',
                'postal_code' => '36311',
            ),
            293 => 
            array (
                'city_id' => 294,
                'province_id' => 4,
                'city_name' => 'Kabupaten Muko Muko',
                'postal_code' => '38715',
            ),
            294 => 
            array (
                'city_id' => 295,
                'province_id' => 30,
                'city_name' => 'Kabupaten Muna',
                'postal_code' => '93611',
            ),
            295 => 
            array (
                'city_id' => 296,
                'province_id' => 14,
                'city_name' => 'Kabupaten Murung Raya',
                'postal_code' => '73911',
            ),
            296 => 
            array (
                'city_id' => 297,
                'province_id' => 33,
                'city_name' => 'Kabupaten Musi Banyuasin',
                'postal_code' => '30719',
            ),
            297 => 
            array (
                'city_id' => 298,
                'province_id' => 33,
                'city_name' => 'Kabupaten Musi Rawas',
                'postal_code' => '31661',
            ),
            298 => 
            array (
                'city_id' => 299,
                'province_id' => 24,
                'city_name' => 'Kabupaten Nabire',
                'postal_code' => '98816',
            ),
            299 => 
            array (
                'city_id' => 300,
                'province_id' => 21,
                'city_name' => 'Kabupaten Nagan Raya',
                'postal_code' => '23674',
            ),
            300 => 
            array (
                'city_id' => 301,
                'province_id' => 23,
                'city_name' => 'Kabupaten Nagekeo',
                'postal_code' => '86911',
            ),
            301 => 
            array (
                'city_id' => 302,
                'province_id' => 17,
                'city_name' => 'Kabupaten Natuna',
                'postal_code' => '29711',
            ),
            302 => 
            array (
                'city_id' => 303,
                'province_id' => 24,
                'city_name' => 'Kabupaten Nduga',
                'postal_code' => '99541',
            ),
            303 => 
            array (
                'city_id' => 304,
                'province_id' => 23,
                'city_name' => 'Kabupaten Ngada',
                'postal_code' => '86413',
            ),
            304 => 
            array (
                'city_id' => 305,
                'province_id' => 11,
                'city_name' => 'Kabupaten Nganjuk',
                'postal_code' => '64414',
            ),
            305 => 
            array (
                'city_id' => 306,
                'province_id' => 11,
                'city_name' => 'Kabupaten Ngawi',
                'postal_code' => '63219',
            ),
            306 => 
            array (
                'city_id' => 307,
                'province_id' => 34,
                'city_name' => 'Kabupaten Nias',
                'postal_code' => '22876',
            ),
            307 => 
            array (
                'city_id' => 308,
                'province_id' => 34,
                'city_name' => 'Kabupaten Nias Barat',
                'postal_code' => '22895',
            ),
            308 => 
            array (
                'city_id' => 309,
                'province_id' => 34,
                'city_name' => 'Kabupaten Nias Selatan',
                'postal_code' => '22865',
            ),
            309 => 
            array (
                'city_id' => 310,
                'province_id' => 34,
                'city_name' => 'Kabupaten Nias Utara',
                'postal_code' => '22856',
            ),
            310 => 
            array (
                'city_id' => 311,
                'province_id' => 16,
                'city_name' => 'Kabupaten Nunukan',
                'postal_code' => '77421',
            ),
            311 => 
            array (
                'city_id' => 312,
                'province_id' => 33,
                'city_name' => 'Kabupaten Ogan Ilir',
                'postal_code' => '30811',
            ),
            312 => 
            array (
                'city_id' => 313,
                'province_id' => 33,
                'city_name' => 'Kabupaten Ogan Komering Ilir',
                'postal_code' => '30618',
            ),
            313 => 
            array (
                'city_id' => 314,
                'province_id' => 33,
                'city_name' => 'Kabupaten Ogan Komering Ulu',
                'postal_code' => '32112',
            ),
            314 => 
            array (
                'city_id' => 315,
                'province_id' => 33,
                'city_name' => 'Kabupaten Ogan Komering Ulu Selatan',
                'postal_code' => '32211',
            ),
            315 => 
            array (
                'city_id' => 316,
                'province_id' => 33,
                'city_name' => 'Kabupaten Ogan Komering Ulu Timur',
                'postal_code' => '32312',
            ),
            316 => 
            array (
                'city_id' => 317,
                'province_id' => 11,
                'city_name' => 'Kabupaten Pacitan',
                'postal_code' => '63512',
            ),
            317 => 
            array (
                'city_id' => 318,
                'province_id' => 32,
                'city_name' => 'Kota Padang',
                'postal_code' => '25112',
            ),
            318 => 
            array (
                'city_id' => 319,
                'province_id' => 34,
                'city_name' => 'Kabupaten Padang Lawas',
                'postal_code' => '22763',
            ),
            319 => 
            array (
                'city_id' => 320,
                'province_id' => 34,
                'city_name' => 'Kabupaten Padang Lawas Utara',
                'postal_code' => '22753',
            ),
            320 => 
            array (
                'city_id' => 321,
                'province_id' => 32,
                'city_name' => 'Kota Padang Panjang',
                'postal_code' => '27122',
            ),
            321 => 
            array (
                'city_id' => 322,
                'province_id' => 32,
                'city_name' => 'Kabupaten Padang Pariaman',
                'postal_code' => '25583',
            ),
            322 => 
            array (
                'city_id' => 323,
                'province_id' => 34,
                'city_name' => 'Kota Padang Sidempuan',
                'postal_code' => '22727',
            ),
            323 => 
            array (
                'city_id' => 324,
                'province_id' => 33,
                'city_name' => 'Kota Pagar Alam',
                'postal_code' => '31512',
            ),
            324 => 
            array (
                'city_id' => 325,
                'province_id' => 34,
                'city_name' => 'Kabupaten Pakpak Bharat',
                'postal_code' => '22272',
            ),
            325 => 
            array (
                'city_id' => 326,
                'province_id' => 14,
                'city_name' => 'Kota Palangka Raya',
                'postal_code' => '73112',
            ),
            326 => 
            array (
                'city_id' => 327,
                'province_id' => 33,
                'city_name' => 'Kota Palembang',
                'postal_code' => '31512',
            ),
            327 => 
            array (
                'city_id' => 328,
                'province_id' => 28,
                'city_name' => 'Kota Palopo',
                'postal_code' => '91911',
            ),
            328 => 
            array (
                'city_id' => 329,
                'province_id' => 29,
                'city_name' => 'Kota Palu',
                'postal_code' => '94111',
            ),
            329 => 
            array (
                'city_id' => 330,
                'province_id' => 11,
                'city_name' => 'Kabupaten Pamekasan',
                'postal_code' => '69319',
            ),
            330 => 
            array (
                'city_id' => 331,
                'province_id' => 3,
                'city_name' => 'Kabupaten Pandeglang',
                'postal_code' => '42212',
            ),
            331 => 
            array (
                'city_id' => 332,
                'province_id' => 9,
                'city_name' => 'Kabupaten Pangandaran',
                'postal_code' => '46511',
            ),
            332 => 
            array (
                'city_id' => 333,
                'province_id' => 28,
                'city_name' => 'Kabupaten Pangkajene Kepulauan',
                'postal_code' => '90611',
            ),
            333 => 
            array (
                'city_id' => 334,
                'province_id' => 2,
                'city_name' => 'Kota Pangkal Pinang',
                'postal_code' => '33115',
            ),
            334 => 
            array (
                'city_id' => 335,
                'province_id' => 24,
                'city_name' => 'Kabupaten Paniai',
                'postal_code' => '98765',
            ),
            335 => 
            array (
                'city_id' => 336,
                'province_id' => 28,
                'city_name' => 'Kota Parepare',
                'postal_code' => '91123',
            ),
            336 => 
            array (
                'city_id' => 337,
                'province_id' => 32,
                'city_name' => 'Kota Pariaman',
                'postal_code' => '25511',
            ),
            337 => 
            array (
                'city_id' => 338,
                'province_id' => 29,
                'city_name' => 'Kabupaten Parigi Moutong',
                'postal_code' => '94411',
            ),
            338 => 
            array (
                'city_id' => 339,
                'province_id' => 32,
                'city_name' => 'Kabupaten Pasaman',
                'postal_code' => '26318',
            ),
            339 => 
            array (
                'city_id' => 340,
                'province_id' => 32,
                'city_name' => 'Kabupaten Pasaman Barat',
                'postal_code' => '26511',
            ),
            340 => 
            array (
                'city_id' => 341,
                'province_id' => 15,
                'city_name' => 'Kabupaten Paser',
                'postal_code' => '76211',
            ),
            341 => 
            array (
                'city_id' => 342,
                'province_id' => 11,
                'city_name' => 'Kabupaten Pasuruan',
                'postal_code' => '67153',
            ),
            342 => 
            array (
                'city_id' => 343,
                'province_id' => 11,
                'city_name' => 'Kota Pasuruan',
                'postal_code' => '67118',
            ),
            343 => 
            array (
                'city_id' => 344,
                'province_id' => 10,
                'city_name' => 'Kabupaten Pati',
                'postal_code' => '59114',
            ),
            344 => 
            array (
                'city_id' => 345,
                'province_id' => 32,
                'city_name' => 'Kota Payakumbuh',
                'postal_code' => '26213',
            ),
            345 => 
            array (
                'city_id' => 346,
                'province_id' => 25,
                'city_name' => 'Kabupaten Pegunungan Arfak',
                'postal_code' => '98354',
            ),
            346 => 
            array (
                'city_id' => 347,
                'province_id' => 24,
                'city_name' => 'Kabupaten Pegunungan Bintang',
                'postal_code' => '99573',
            ),
            347 => 
            array (
                'city_id' => 348,
                'province_id' => 10,
                'city_name' => 'Kabupaten Pekalongan',
                'postal_code' => '51161',
            ),
            348 => 
            array (
                'city_id' => 349,
                'province_id' => 10,
                'city_name' => 'Kota Pekalongan',
                'postal_code' => '51122',
            ),
            349 => 
            array (
                'city_id' => 350,
                'province_id' => 26,
                'city_name' => 'Kota Pekanbaru',
                'postal_code' => '28112',
            ),
            350 => 
            array (
                'city_id' => 351,
                'province_id' => 26,
                'city_name' => 'Kabupaten Pelalawan',
                'postal_code' => '28311',
            ),
            351 => 
            array (
                'city_id' => 352,
                'province_id' => 10,
                'city_name' => 'Kabupaten Pemalang',
                'postal_code' => '52319',
            ),
            352 => 
            array (
                'city_id' => 353,
                'province_id' => 34,
                'city_name' => 'Kota Pematang Siantar',
                'postal_code' => '21126',
            ),
            353 => 
            array (
                'city_id' => 354,
                'province_id' => 15,
                'city_name' => 'Kabupaten Penajam Paser Utara',
                'postal_code' => '76311',
            ),
            354 => 
            array (
                'city_id' => 355,
                'province_id' => 18,
                'city_name' => 'Kabupaten Pesawaran',
                'postal_code' => '35312',
            ),
            355 => 
            array (
                'city_id' => 356,
                'province_id' => 18,
                'city_name' => 'Kabupaten Pesisir Barat',
                'postal_code' => '35974',
            ),
            356 => 
            array (
                'city_id' => 357,
                'province_id' => 32,
                'city_name' => 'Kabupaten Pesisir Selatan',
                'postal_code' => '25611',
            ),
            357 => 
            array (
                'city_id' => 358,
                'province_id' => 21,
                'city_name' => 'Kabupaten Pidie',
                'postal_code' => '24116',
            ),
            358 => 
            array (
                'city_id' => 359,
                'province_id' => 21,
                'city_name' => 'Kabupaten Pidie Jaya',
                'postal_code' => '24186',
            ),
            359 => 
            array (
                'city_id' => 360,
                'province_id' => 28,
                'city_name' => 'Kabupaten Pinrang',
                'postal_code' => '91251',
            ),
            360 => 
            array (
                'city_id' => 361,
                'province_id' => 7,
                'city_name' => 'Kabupaten Pohuwato',
                'postal_code' => '96419',
            ),
            361 => 
            array (
                'city_id' => 362,
                'province_id' => 27,
                'city_name' => 'Kabupaten Polewali Mandar',
                'postal_code' => '91311',
            ),
            362 => 
            array (
                'city_id' => 363,
                'province_id' => 11,
                'city_name' => 'Kabupaten Ponorogo',
                'postal_code' => '63411',
            ),
            363 => 
            array (
                'city_id' => 364,
                'province_id' => 12,
                'city_name' => 'Kabupaten Pontianak',
                'postal_code' => '78971',
            ),
            364 => 
            array (
                'city_id' => 365,
                'province_id' => 12,
                'city_name' => 'Kota Pontianak',
                'postal_code' => '78112',
            ),
            365 => 
            array (
                'city_id' => 366,
                'province_id' => 29,
                'city_name' => 'Kabupaten Poso',
                'postal_code' => '94615',
            ),
            366 => 
            array (
                'city_id' => 367,
                'province_id' => 33,
                'city_name' => 'Kota Prabumulih',
                'postal_code' => '31121',
            ),
            367 => 
            array (
                'city_id' => 368,
                'province_id' => 18,
                'city_name' => 'Kabupaten Pringsewu',
                'postal_code' => '35719',
            ),
            368 => 
            array (
                'city_id' => 369,
                'province_id' => 11,
                'city_name' => 'Kabupaten Probolinggo',
                'postal_code' => '67282',
            ),
            369 => 
            array (
                'city_id' => 370,
                'province_id' => 11,
                'city_name' => 'Kota Probolinggo',
                'postal_code' => '67215',
            ),
            370 => 
            array (
                'city_id' => 371,
                'province_id' => 14,
                'city_name' => 'Kabupaten Pulang Pisau',
                'postal_code' => '74811',
            ),
            371 => 
            array (
                'city_id' => 372,
                'province_id' => 20,
                'city_name' => 'Kabupaten Pulau Morotai',
                'postal_code' => '97771',
            ),
            372 => 
            array (
                'city_id' => 373,
                'province_id' => 24,
                'city_name' => 'Kabupaten Puncak',
                'postal_code' => '98981',
            ),
            373 => 
            array (
                'city_id' => 374,
                'province_id' => 24,
                'city_name' => 'Kabupaten Puncak Jaya',
                'postal_code' => '98979',
            ),
            374 => 
            array (
                'city_id' => 375,
                'province_id' => 10,
                'city_name' => 'Kabupaten Purbalingga',
                'postal_code' => '53312',
            ),
            375 => 
            array (
                'city_id' => 376,
                'province_id' => 9,
                'city_name' => 'Kabupaten Purwakarta',
                'postal_code' => '41119',
            ),
            376 => 
            array (
                'city_id' => 377,
                'province_id' => 10,
                'city_name' => 'Kabupaten Purworejo',
                'postal_code' => '54111',
            ),
            377 => 
            array (
                'city_id' => 378,
                'province_id' => 25,
                'city_name' => 'Kabupaten Raja Ampat',
                'postal_code' => '98489',
            ),
            378 => 
            array (
                'city_id' => 379,
                'province_id' => 4,
                'city_name' => 'Kabupaten Rejang Lebong',
                'postal_code' => '39112',
            ),
            379 => 
            array (
                'city_id' => 380,
                'province_id' => 10,
                'city_name' => 'Kabupaten Rembang',
                'postal_code' => '59219',
            ),
            380 => 
            array (
                'city_id' => 381,
                'province_id' => 26,
                'city_name' => 'Kabupaten Rokan Hilir',
                'postal_code' => '28992',
            ),
            381 => 
            array (
                'city_id' => 382,
                'province_id' => 26,
                'city_name' => 'Kabupaten Rokan Hulu',
                'postal_code' => '28511',
            ),
            382 => 
            array (
                'city_id' => 383,
                'province_id' => 23,
                'city_name' => 'Kabupaten Rote Ndao',
                'postal_code' => '85982',
            ),
            383 => 
            array (
                'city_id' => 384,
                'province_id' => 21,
                'city_name' => 'Kota Sabang',
                'postal_code' => '23512',
            ),
            384 => 
            array (
                'city_id' => 385,
                'province_id' => 23,
                'city_name' => 'Kabupaten Sabu Raijua',
                'postal_code' => '85391',
            ),
            385 => 
            array (
                'city_id' => 386,
                'province_id' => 10,
                'city_name' => 'Kota Salatiga',
                'postal_code' => '50711',
            ),
            386 => 
            array (
                'city_id' => 387,
                'province_id' => 15,
                'city_name' => 'Kota Samarinda',
                'postal_code' => '75133',
            ),
            387 => 
            array (
                'city_id' => 388,
                'province_id' => 12,
                'city_name' => 'Kabupaten Sambas',
                'postal_code' => '79453',
            ),
            388 => 
            array (
                'city_id' => 389,
                'province_id' => 34,
                'city_name' => 'Kabupaten Samosir',
                'postal_code' => '22392',
            ),
            389 => 
            array (
                'city_id' => 390,
                'province_id' => 11,
                'city_name' => 'Kabupaten Sampang',
                'postal_code' => '69219',
            ),
            390 => 
            array (
                'city_id' => 391,
                'province_id' => 12,
                'city_name' => 'Kabupaten Sanggau',
                'postal_code' => '78557',
            ),
            391 => 
            array (
                'city_id' => 392,
                'province_id' => 24,
                'city_name' => 'Kabupaten Sarmi',
                'postal_code' => '99373',
            ),
            392 => 
            array (
                'city_id' => 393,
                'province_id' => 8,
                'city_name' => 'Kabupaten Sarolangun',
                'postal_code' => '37419',
            ),
            393 => 
            array (
                'city_id' => 394,
                'province_id' => 32,
                'city_name' => 'Kota Sawah Lunto',
                'postal_code' => '27416',
            ),
            394 => 
            array (
                'city_id' => 395,
                'province_id' => 12,
                'city_name' => 'Kabupaten Sekadau',
                'postal_code' => '79583',
            ),
            395 => 
            array (
                'city_id' => 396,
                'province_id' => 28,
            'city_name' => 'Kabupaten Selayar (Kepulauan Selayar)',
                'postal_code' => '92812',
            ),
            396 => 
            array (
                'city_id' => 397,
                'province_id' => 4,
                'city_name' => 'Kabupaten Seluma',
                'postal_code' => '38811',
            ),
            397 => 
            array (
                'city_id' => 398,
                'province_id' => 10,
                'city_name' => 'Kabupaten Semarang',
                'postal_code' => '50511',
            ),
            398 => 
            array (
                'city_id' => 399,
                'province_id' => 10,
                'city_name' => 'Kota Semarang',
                'postal_code' => '50135',
            ),
            399 => 
            array (
                'city_id' => 400,
                'province_id' => 19,
                'city_name' => 'Kabupaten Seram Bagian Barat',
                'postal_code' => '97561',
            ),
            400 => 
            array (
                'city_id' => 401,
                'province_id' => 19,
                'city_name' => 'Kabupaten Seram Bagian Timur',
                'postal_code' => '97581',
            ),
            401 => 
            array (
                'city_id' => 402,
                'province_id' => 3,
                'city_name' => 'Kabupaten Serang',
                'postal_code' => '42182',
            ),
            402 => 
            array (
                'city_id' => 403,
                'province_id' => 3,
                'city_name' => 'Kota Serang',
                'postal_code' => '42111',
            ),
            403 => 
            array (
                'city_id' => 404,
                'province_id' => 34,
                'city_name' => 'Kabupaten Serdang Bedagai',
                'postal_code' => '20915',
            ),
            404 => 
            array (
                'city_id' => 405,
                'province_id' => 14,
                'city_name' => 'Kabupaten Seruyan',
                'postal_code' => '74211',
            ),
            405 => 
            array (
                'city_id' => 406,
                'province_id' => 26,
                'city_name' => 'Kabupaten Siak',
                'postal_code' => '28623',
            ),
            406 => 
            array (
                'city_id' => 407,
                'province_id' => 34,
                'city_name' => 'Kota Sibolga',
                'postal_code' => '22522',
            ),
            407 => 
            array (
                'city_id' => 408,
                'province_id' => 28,
                'city_name' => 'Kabupaten Sidenreng Rappang/Rapang',
                'postal_code' => '91613',
            ),
            408 => 
            array (
                'city_id' => 409,
                'province_id' => 11,
                'city_name' => 'Kabupaten Sidoarjo',
                'postal_code' => '61219',
            ),
            409 => 
            array (
                'city_id' => 410,
                'province_id' => 29,
                'city_name' => 'Kabupaten Sigi',
                'postal_code' => '94364',
            ),
            410 => 
            array (
                'city_id' => 411,
                'province_id' => 32,
            'city_name' => 'Kabupaten Sijunjung (Sawah Lunto Sijunjung)',
                'postal_code' => '27511',
            ),
            411 => 
            array (
                'city_id' => 412,
                'province_id' => 23,
                'city_name' => 'Kabupaten Sikka',
                'postal_code' => '86121',
            ),
            412 => 
            array (
                'city_id' => 413,
                'province_id' => 34,
                'city_name' => 'Kabupaten Simalungun',
                'postal_code' => '21162',
            ),
            413 => 
            array (
                'city_id' => 414,
                'province_id' => 21,
                'city_name' => 'Kabupaten Simeulue',
                'postal_code' => '23891',
            ),
            414 => 
            array (
                'city_id' => 415,
                'province_id' => 12,
                'city_name' => 'Kota Singkawang',
                'postal_code' => '79117',
            ),
            415 => 
            array (
                'city_id' => 416,
                'province_id' => 28,
                'city_name' => 'Kabupaten Sinjai',
                'postal_code' => '92615',
            ),
            416 => 
            array (
                'city_id' => 417,
                'province_id' => 12,
                'city_name' => 'Kabupaten Sintang',
                'postal_code' => '78619',
            ),
            417 => 
            array (
                'city_id' => 418,
                'province_id' => 11,
                'city_name' => 'Kabupaten Situbondo',
                'postal_code' => '68316',
            ),
            418 => 
            array (
                'city_id' => 419,
                'province_id' => 5,
                'city_name' => 'Kabupaten Sleman',
                'postal_code' => '55513',
            ),
            419 => 
            array (
                'city_id' => 420,
                'province_id' => 32,
                'city_name' => 'Kabupaten Solok',
                'postal_code' => '27365',
            ),
            420 => 
            array (
                'city_id' => 421,
                'province_id' => 32,
                'city_name' => 'Kota Solok',
                'postal_code' => '27315',
            ),
            421 => 
            array (
                'city_id' => 422,
                'province_id' => 32,
                'city_name' => 'Kabupaten Solok Selatan',
                'postal_code' => '27779',
            ),
            422 => 
            array (
                'city_id' => 423,
                'province_id' => 28,
                'city_name' => 'Kabupaten Soppeng',
                'postal_code' => '90812',
            ),
            423 => 
            array (
                'city_id' => 424,
                'province_id' => 25,
                'city_name' => 'Kabupaten Sorong',
                'postal_code' => '98431',
            ),
            424 => 
            array (
                'city_id' => 425,
                'province_id' => 25,
                'city_name' => 'Kota Sorong',
                'postal_code' => '98411',
            ),
            425 => 
            array (
                'city_id' => 426,
                'province_id' => 25,
                'city_name' => 'Kabupaten Sorong Selatan',
                'postal_code' => '98454',
            ),
            426 => 
            array (
                'city_id' => 427,
                'province_id' => 10,
                'city_name' => 'Kabupaten Sragen',
                'postal_code' => '57211',
            ),
            427 => 
            array (
                'city_id' => 428,
                'province_id' => 9,
                'city_name' => 'Kabupaten Subang',
                'postal_code' => '41215',
            ),
            428 => 
            array (
                'city_id' => 429,
                'province_id' => 21,
                'city_name' => 'Kota Subulussalam',
                'postal_code' => '24882',
            ),
            429 => 
            array (
                'city_id' => 430,
                'province_id' => 9,
                'city_name' => 'Kabupaten Sukabumi',
                'postal_code' => '43311',
            ),
            430 => 
            array (
                'city_id' => 431,
                'province_id' => 9,
                'city_name' => 'Kota Sukabumi',
                'postal_code' => '43114',
            ),
            431 => 
            array (
                'city_id' => 432,
                'province_id' => 14,
                'city_name' => 'Kabupaten Sukamara',
                'postal_code' => '74712',
            ),
            432 => 
            array (
                'city_id' => 433,
                'province_id' => 10,
                'city_name' => 'Kabupaten Sukoharjo',
                'postal_code' => '57514',
            ),
            433 => 
            array (
                'city_id' => 434,
                'province_id' => 23,
                'city_name' => 'Kabupaten Sumba Barat',
                'postal_code' => '87219',
            ),
            434 => 
            array (
                'city_id' => 435,
                'province_id' => 23,
                'city_name' => 'Kabupaten Sumba Barat Daya',
                'postal_code' => '87453',
            ),
            435 => 
            array (
                'city_id' => 436,
                'province_id' => 23,
                'city_name' => 'Kabupaten Sumba Tengah',
                'postal_code' => '87358',
            ),
            436 => 
            array (
                'city_id' => 437,
                'province_id' => 23,
                'city_name' => 'Kabupaten Sumba Timur',
                'postal_code' => '87112',
            ),
            437 => 
            array (
                'city_id' => 438,
                'province_id' => 22,
                'city_name' => 'Kabupaten Sumbawa',
                'postal_code' => '84315',
            ),
            438 => 
            array (
                'city_id' => 439,
                'province_id' => 22,
                'city_name' => 'Kabupaten Sumbawa Barat',
                'postal_code' => '84419',
            ),
            439 => 
            array (
                'city_id' => 440,
                'province_id' => 9,
                'city_name' => 'Kabupaten Sumedang',
                'postal_code' => '45326',
            ),
            440 => 
            array (
                'city_id' => 441,
                'province_id' => 11,
                'city_name' => 'Kabupaten Sumenep',
                'postal_code' => '69413',
            ),
            441 => 
            array (
                'city_id' => 442,
                'province_id' => 8,
                'city_name' => 'Kota Sungaipenuh',
                'postal_code' => '37113',
            ),
            442 => 
            array (
                'city_id' => 443,
                'province_id' => 24,
                'city_name' => 'Kabupaten Supiori',
                'postal_code' => '98164',
            ),
            443 => 
            array (
                'city_id' => 444,
                'province_id' => 11,
                'city_name' => 'Kota Surabaya',
                'postal_code' => '60119',
            ),
            444 => 
            array (
                'city_id' => 445,
                'province_id' => 10,
            'city_name' => 'Kota Surakarta (Solo)',
                'postal_code' => '57113',
            ),
            445 => 
            array (
                'city_id' => 446,
                'province_id' => 13,
                'city_name' => 'Kabupaten Tabalong',
                'postal_code' => '71513',
            ),
            446 => 
            array (
                'city_id' => 447,
                'province_id' => 1,
                'city_name' => 'Kabupaten Tabanan',
                'postal_code' => '82119',
            ),
            447 => 
            array (
                'city_id' => 448,
                'province_id' => 28,
                'city_name' => 'Kabupaten Takalar',
                'postal_code' => '92212',
            ),
            448 => 
            array (
                'city_id' => 449,
                'province_id' => 25,
                'city_name' => 'Kabupaten Tambrauw',
                'postal_code' => '98475',
            ),
            449 => 
            array (
                'city_id' => 450,
                'province_id' => 16,
                'city_name' => 'Kabupaten Tana Tidung',
                'postal_code' => '77611',
            ),
            450 => 
            array (
                'city_id' => 451,
                'province_id' => 28,
                'city_name' => 'Kabupaten Tana Toraja',
                'postal_code' => '91819',
            ),
            451 => 
            array (
                'city_id' => 452,
                'province_id' => 13,
                'city_name' => 'Kabupaten Tanah Bumbu',
                'postal_code' => '72211',
            ),
            452 => 
            array (
                'city_id' => 453,
                'province_id' => 32,
                'city_name' => 'Kabupaten Tanah Datar',
                'postal_code' => '27211',
            ),
            453 => 
            array (
                'city_id' => 454,
                'province_id' => 13,
                'city_name' => 'Kabupaten Tanah Laut',
                'postal_code' => '70811',
            ),
            454 => 
            array (
                'city_id' => 455,
                'province_id' => 3,
                'city_name' => 'Kabupaten Tangerang',
                'postal_code' => '15914',
            ),
            455 => 
            array (
                'city_id' => 456,
                'province_id' => 3,
                'city_name' => 'Kota Tangerang',
                'postal_code' => '15111',
            ),
            456 => 
            array (
                'city_id' => 457,
                'province_id' => 3,
                'city_name' => 'Kota Tangerang Selatan',
                'postal_code' => '15332',
            ),
            457 => 
            array (
                'city_id' => 458,
                'province_id' => 18,
                'city_name' => 'Kabupaten Tanggamus',
                'postal_code' => '35619',
            ),
            458 => 
            array (
                'city_id' => 459,
                'province_id' => 34,
                'city_name' => 'Kota Tanjung Balai',
                'postal_code' => '21321',
            ),
            459 => 
            array (
                'city_id' => 460,
                'province_id' => 8,
                'city_name' => 'Kabupaten Tanjung Jabung Barat',
                'postal_code' => '36513',
            ),
            460 => 
            array (
                'city_id' => 461,
                'province_id' => 8,
                'city_name' => 'Kabupaten Tanjung Jabung Timur',
                'postal_code' => '36719',
            ),
            461 => 
            array (
                'city_id' => 462,
                'province_id' => 17,
                'city_name' => 'Kota Tanjung Pinang',
                'postal_code' => '29111',
            ),
            462 => 
            array (
                'city_id' => 463,
                'province_id' => 34,
                'city_name' => 'Kabupaten Tapanuli Selatan',
                'postal_code' => '22742',
            ),
            463 => 
            array (
                'city_id' => 464,
                'province_id' => 34,
                'city_name' => 'Kabupaten Tapanuli Tengah',
                'postal_code' => '22611',
            ),
            464 => 
            array (
                'city_id' => 465,
                'province_id' => 34,
                'city_name' => 'Kabupaten Tapanuli Utara',
                'postal_code' => '22414',
            ),
            465 => 
            array (
                'city_id' => 466,
                'province_id' => 13,
                'city_name' => 'Kabupaten Tapin',
                'postal_code' => '71119',
            ),
            466 => 
            array (
                'city_id' => 467,
                'province_id' => 16,
                'city_name' => 'Kota Tarakan',
                'postal_code' => '77114',
            ),
            467 => 
            array (
                'city_id' => 468,
                'province_id' => 9,
                'city_name' => 'Kabupaten Tasikmalaya',
                'postal_code' => '46411',
            ),
            468 => 
            array (
                'city_id' => 469,
                'province_id' => 9,
                'city_name' => 'Kota Tasikmalaya',
                'postal_code' => '46116',
            ),
            469 => 
            array (
                'city_id' => 470,
                'province_id' => 34,
                'city_name' => 'Kota Tebing Tinggi',
                'postal_code' => '20632',
            ),
            470 => 
            array (
                'city_id' => 471,
                'province_id' => 8,
                'city_name' => 'Kabupaten Tebo',
                'postal_code' => '37519',
            ),
            471 => 
            array (
                'city_id' => 472,
                'province_id' => 10,
                'city_name' => 'Kabupaten Tegal',
                'postal_code' => '52419',
            ),
            472 => 
            array (
                'city_id' => 473,
                'province_id' => 10,
                'city_name' => 'Kota Tegal',
                'postal_code' => '52114',
            ),
            473 => 
            array (
                'city_id' => 474,
                'province_id' => 25,
                'city_name' => 'Kabupaten Teluk Bintuni',
                'postal_code' => '98551',
            ),
            474 => 
            array (
                'city_id' => 475,
                'province_id' => 25,
                'city_name' => 'Kabupaten Teluk Wondama',
                'postal_code' => '98591',
            ),
            475 => 
            array (
                'city_id' => 476,
                'province_id' => 10,
                'city_name' => 'Kabupaten Temanggung',
                'postal_code' => '56212',
            ),
            476 => 
            array (
                'city_id' => 477,
                'province_id' => 20,
                'city_name' => 'Kota Ternate',
                'postal_code' => '97714',
            ),
            477 => 
            array (
                'city_id' => 478,
                'province_id' => 20,
                'city_name' => 'Kota Tidore Kepulauan',
                'postal_code' => '97815',
            ),
            478 => 
            array (
                'city_id' => 479,
                'province_id' => 23,
                'city_name' => 'Kabupaten Timor Tengah Selatan',
                'postal_code' => '85562',
            ),
            479 => 
            array (
                'city_id' => 480,
                'province_id' => 23,
                'city_name' => 'Kabupaten Timor Tengah Utara',
                'postal_code' => '85612',
            ),
            480 => 
            array (
                'city_id' => 481,
                'province_id' => 34,
                'city_name' => 'Kabupaten Toba Samosir',
                'postal_code' => '22316',
            ),
            481 => 
            array (
                'city_id' => 482,
                'province_id' => 29,
                'city_name' => 'Kabupaten Tojo Una-Una',
                'postal_code' => '94683',
            ),
            482 => 
            array (
                'city_id' => 483,
                'province_id' => 29,
                'city_name' => 'Kabupaten Toli-Toli',
                'postal_code' => '94542',
            ),
            483 => 
            array (
                'city_id' => 484,
                'province_id' => 24,
                'city_name' => 'Kabupaten Tolikara',
                'postal_code' => '99411',
            ),
            484 => 
            array (
                'city_id' => 485,
                'province_id' => 31,
                'city_name' => 'Kota Tomohon',
                'postal_code' => '95416',
            ),
            485 => 
            array (
                'city_id' => 486,
                'province_id' => 28,
                'city_name' => 'Kabupaten Toraja Utara',
                'postal_code' => '91831',
            ),
            486 => 
            array (
                'city_id' => 487,
                'province_id' => 11,
                'city_name' => 'Kabupaten Trenggalek',
                'postal_code' => '66312',
            ),
            487 => 
            array (
                'city_id' => 488,
                'province_id' => 19,
                'city_name' => 'Kota Tual',
                'postal_code' => '97612',
            ),
            488 => 
            array (
                'city_id' => 489,
                'province_id' => 11,
                'city_name' => 'Kabupaten Tuban',
                'postal_code' => '62319',
            ),
            489 => 
            array (
                'city_id' => 490,
                'province_id' => 18,
                'city_name' => 'Kabupaten Tulang Bawang',
                'postal_code' => '34613',
            ),
            490 => 
            array (
                'city_id' => 491,
                'province_id' => 18,
                'city_name' => 'Kabupaten Tulang Bawang Barat',
                'postal_code' => '34419',
            ),
            491 => 
            array (
                'city_id' => 492,
                'province_id' => 11,
                'city_name' => 'Kabupaten Tulungagung',
                'postal_code' => '66212',
            ),
            492 => 
            array (
                'city_id' => 493,
                'province_id' => 28,
                'city_name' => 'Kabupaten Wajo',
                'postal_code' => '90911',
            ),
            493 => 
            array (
                'city_id' => 494,
                'province_id' => 30,
                'city_name' => 'Kabupaten Wakatobi',
                'postal_code' => '93791',
            ),
            494 => 
            array (
                'city_id' => 495,
                'province_id' => 24,
                'city_name' => 'Kabupaten Waropen',
                'postal_code' => '98269',
            ),
            495 => 
            array (
                'city_id' => 496,
                'province_id' => 18,
                'city_name' => 'Kabupaten Way Kanan',
                'postal_code' => '34711',
            ),
            496 => 
            array (
                'city_id' => 497,
                'province_id' => 10,
                'city_name' => 'Kabupaten Wonogiri',
                'postal_code' => '57619',
            ),
            497 => 
            array (
                'city_id' => 498,
                'province_id' => 10,
                'city_name' => 'Kabupaten Wonosobo',
                'postal_code' => '56311',
            ),
            498 => 
            array (
                'city_id' => 499,
                'province_id' => 24,
                'city_name' => 'Kabupaten Yahukimo',
                'postal_code' => '99041',
            ),
            499 => 
            array (
                'city_id' => 500,
                'province_id' => 24,
                'city_name' => 'Kabupaten Yalimo',
                'postal_code' => '99481',
            ),
        ));
        \DB::table('cities')->insert(array (
            0 => 
            array (
                'city_id' => 501,
                'province_id' => 5,
                'city_name' => 'Kota Yogyakarta',
                'postal_code' => '55222',
            ),
        ));
        
        
    }
}