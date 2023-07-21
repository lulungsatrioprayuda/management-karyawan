<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jabatanData = [
            [
                'nama_jabatan' => 'Dokter',
            ],
            [
                'nama_jabatan' => 'Perawat',
            ],
            [
                'nama_jabatan' => 'Admin',
            ],
            [
                'nama_jabatan' => 'Kepala Unit',
            ],
            [
                'nama_jabatan' => 'Wakil Kepala Unit',
            ],
        ];

        foreach ($jabatanData as $jabatan) {
            Jabatan::create($jabatan);
        }
    }
}
