<?php

namespace Database\Seeders;

use App\Models\Karyawan;
use App\Models\Jabatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $karyawans = [
            [
                'nama' => 'Karyawan 1',
                'username' => 'karyawan1',
                'password' => Hash::make('karyawan1'),
                'unit_id' => 1,
            ],
            [
                'nama' => 'Karyawan 2',
                'username' => 'karyawan2',
                'password' => Hash::make('karyawan2'),
                'unit_id' => 2,
            ],
            [
                'nama' => 'Karyawan 3',
                'username' => 'karyawan3',
                'password' => Hash::make('karyawan3'),
                'unit_id' => 1,
            ],
        ];

        foreach ($karyawans as $karyawan) {
            $karyawan = Karyawan::create($karyawan);

            $jabatanIds = [1, 3];
            $karyawan->jabatan()->attach($jabatanIds);
        }
    }
}
