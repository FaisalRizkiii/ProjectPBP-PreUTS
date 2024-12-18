<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // UserSeeder::class,
            UserStarter::class,
            TahunSeeder::class,
            FDSSeeder::class,
            DosenSeeder::class,
            MahasiswaSeeder::class,
            DekanSeeder::class,
            MKSeeder::class,
            RuangSeeder::class,
            AkademikSeeder::class,
            JadwalSeeder::class,
            KaprodiSeeder::class,
            // IRSSeeder::class,
            // IRSDetailSeeder::class,
            DosenPengampuSeeder::class,
            TestSeeder::class,
            JadwalNowSeeder::class,
            nDetailIrs::class,
            nKHSSeeder::class,
            PeriodeSeeder::class,
        ]);
    }
}