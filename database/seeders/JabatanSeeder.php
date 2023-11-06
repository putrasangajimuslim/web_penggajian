<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['kode_jabatan' => 'IJ-01', 'nama_jabatan' => 'Notaris Indah', 'gaji_pokok' => 6200000, 'potongan' => 300000, 'bonus' => 0, 'tunjangan_transport' => 500000],
            ['kode_jabatan' => 'IJ-02', 'nama_jabatan' => 'Ass Notaris', 'gaji_pokok' => 5500000, 'potongan' => 250000, 'bonus' => 0, 'tunjangan_transport' => 400000],
            ['kode_jabatan' => 'IJ-03', 'nama_jabatan' => 'Kord Keuangan', 'gaji_pokok' => 4700000, 'potongan' => 200000, 'bonus' => 0, 'tunjangan_transport' => 400000],
            ['kode_jabatan' => 'IJ-04', 'nama_jabatan' => 'Admin', 'gaji_pokok' => 0, 'potongan' => 0, 'bonus' => 0, 'tunjangan_transport' => 0],
            ['kode_jabatan' => 'IJ-05', 'nama_jabatan' => 'Staff', 'gaji_pokok' => 4500000, 'potongan' => 200000, 'bonus' => 0, 'tunjangan_transport' => 350000],
            ['kode_jabatan' => 'IJ-06', 'nama_jabatan' => 'Office Boy', 'gaji_pokok' => 4200000, 'potongan' => 150000, 'bonus' => 0, 'tunjangan_transport' => 150000],
            ['kode_jabatan' => 'IJ-07', 'nama_jabatan' => 'Satpam', 'gaji_pokok' => 4400000, 'potongan' => 150000, 'bonus' => 0, 'tunjangan_transport' => 200000],
        ];

        DB::table('jabatan')->insert($data);
    }
}
