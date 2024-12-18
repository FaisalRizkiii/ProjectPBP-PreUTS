<?php

namespace Database\Seeders;

use App\Models\DosenPengampu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class nPengampuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        
        DosenPengampu::create(['nidn_dosen' =>'123456789002', 'id_jadwal'=>'12']);
        DosenPengampu::create(['nidn_dosen' =>'123456789005', 'id_jadwal'=>'12']);
        DosenPengampu::create(['nidn_dosen' =>'123456789100', 'id_jadwal'=>'12']);
        DosenPengampu::create(['nidn_dosen' =>'123456789091', 'id_jadwal'=>'13']);
        DosenPengampu::create(['nidn_dosen' =>'123456789068', 'id_jadwal'=>'13']);
        DosenPengampu::create(['nidn_dosen' =>'123456789034', 'id_jadwal'=>'14']);
        DosenPengampu::create(['nidn_dosen' =>'123456789023', 'id_jadwal'=>'14']);
        DosenPengampu::create(['nidn_dosen' =>'123456789144', 'id_jadwal'=>'15']);
        DosenPengampu::create(['nidn_dosen' =>'123456789054', 'id_jadwal'=>'15']);
        DosenPengampu::create(['nidn_dosen' =>'123456789171', 'id_jadwal'=>'15']);
        DosenPengampu::create(['nidn_dosen' =>'123456789034', 'id_jadwal'=>'16']);
        DosenPengampu::create(['nidn_dosen' =>'123456789023', 'id_jadwal'=>'16']);
        DosenPengampu::create(['nidn_dosen' =>'123456789054', 'id_jadwal'=>'17']);
        DosenPengampu::create(['nidn_dosen' =>'123456789338', 'id_jadwal'=>'17']);
        DosenPengampu::create(['nidn_dosen' =>'123456789091', 'id_jadwal'=>'18']);
        DosenPengampu::create(['nidn_dosen' =>'123456789144', 'id_jadwal'=>'18']);
        DosenPengampu::create(['nidn_dosen' =>'123456789068', 'id_jadwal'=>'19']);
        DosenPengampu::create(['nidn_dosen' =>'123456789171', 'id_jadwal'=>'19']);
    }
}
