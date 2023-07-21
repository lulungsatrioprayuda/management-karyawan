<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $unitData = [
            [
                'nama_unit' => 'Unit 1',
            ],
            [
                'nama_unit' => 'Unit 2',
            ],
            [
                'nama_unit' => 'Unit 3',
            ],
            [
                'nama_unit' => 'Unit 4',
            ],
            [
                'nama_unit' => 'Unit 5',
            ],
            [
                'nama_unit' => 'Unit 6',
            ],
            [
                'nama_unit' => 'Unit 7',
            ],
            [
                'nama_unit' => 'Unit 8',
            ],
            [
                'nama_unit' => 'Unit 9',
            ],
            [
                'nama_unit' => 'Unit 10',
            ],
        ];

        foreach ($unitData as $unit) {
            Unit::create($unit);
        }
    }
}
