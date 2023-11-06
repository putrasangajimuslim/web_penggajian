<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PotonganAlfaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['id_jabatan' => 1, 'jml' => 200000, 'created_at' => now(), 'updated_at' => now()],
            ['id_jabatan' => 2 ,'jml' => 200000, 'created_at' => now(), 'updated_at' => now()],
            ['id_jabatan' => 3 ,'jml' => 150000, 'created_at' => now(), 'updated_at' => now()],
            ['id_jabatan' => 5 ,'jml' => 150000, 'created_at' => now(), 'updated_at' => now()],
            ['id_jabatan' => 6 ,'jml' => 100000, 'created_at' => now(), 'updated_at' => now()],
            ['id_jabatan' => 7 ,'jml' => 100000, 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('potongan_alfa')->insert($data);
    }
}
