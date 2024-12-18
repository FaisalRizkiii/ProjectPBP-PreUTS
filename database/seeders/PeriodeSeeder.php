<?php

namespace Database\Seeders;

use App\Models\Periode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeriodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Periode::create(['type' => '2_minggu', 'status'=>'aktif']);
        Periode::create(['type' => '4_minggu', 'status'=>'non_aktif']);
        Periode::create(['type' => 'lepas', 'status' => 'non_aktif']);
    }
}
