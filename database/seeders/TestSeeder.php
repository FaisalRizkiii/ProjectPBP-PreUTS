<?php

namespace Database\Seeders;

use App\Models\DetailIRS;
use App\Models\IRS;
use App\Models\Jadwal;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        Mahasiswa::create(
            ['nim'=>'24060122130084',
            'nama' => 'Nashwan Adenaya',
            'email'=> 'nashwana@students.undip.ac.id',
            'semester' => 5,
            'kode_prodi' => 'IFS1',
            'status' => 'aktif',
            'doswal'=> '123456789011']);

        User::create(
            ['email'=> 'nashwana@students.undip.ac.id',
            'password' => '12345',
            'role' => 'mahasiswa']);
        // IRS
        IRS::create([
            'nim_mahasiswa' => '24060122130084',
            'semester' => '1',
            'kode_tahun' => '22/23GA',
            'status' => 'sudah_disetujui'
        ]);
        IRS::create([
            'nim_mahasiswa' => '24060122130084',
            'semester' => '2',
            'kode_tahun' => '22/23GE',
            'status' => 'sudah_disetujui'
        ]);
        IRS::create([
            'nim_mahasiswa' => '24060122130084',
            'semester' => '3',
            'kode_tahun' => '23/24GA',
            'status' => 'sudah_disetujui'
        ]);
        IRS::create([
            'nim_mahasiswa' => '24060122130084',
            'semester' => '4',
            'kode_tahun' => '23/24GE',
            'status' => 'sudah_disetujui'
        ]);
        IRS::create([
            'nim_mahasiswa' => '24060122130084',
            'semester' => '5',
            'kode_tahun' => '24/25GA',
            'status' => 'belum_irs'
        ]);

        // Jadwal Semester 1
        Jadwal::create([
            'kode_mk' => 'PAIK6102',
            'jam_mulai' => '07:00',
            'jam_selesai' => '09:30',
            'kode_kelas' => 'A',
            'ruang' => 'E103',
            'hari' => 'Senin',
            'status' => 'disetujui',
            'kuota' => '50',
            'kode_tahun' => '22/23GA'
        ]);
        Jadwal::create([
            'kode_mk' => 'UUW00005',
            'jam_mulai' => '06:00',
            'jam_selesai' => '06:50',
            'kode_kelas' => 'A',
            'ruang' => 'E101',
            'hari' => 'Rabu',
            'status' => 'disetujui',
            'kuota' => '50',
            'kode_tahun' => '22/23GA'
        ]);
        Jadwal::create([
            'kode_mk' => 'PAIK6103',
            'jam_mulai' => '13:00',
            'jam_selesai' => '15:30',
            'kode_kelas' => 'A',
            'ruang' => 'E102',
            'hari' => 'Rabu',
            'status' => 'disetujui',
            'kuota' => '50',
            'kode_tahun' => '22/23GA'
        ]);
        Jadwal::create([
            'kode_mk' => 'PAIK6104',
            'jam_mulai' => '09:40',
            'jam_selesai' => '12:10',
            'kode_kelas' => 'A',
            'ruang' => 'E103',
            'hari' => 'Rabu',
            'status' => 'disetujui',
            'kuota' => '50',
            'kode_tahun' => '22/23GA'
        ]);
        Jadwal::create([
            'kode_mk' => 'UUW00007',
            'jam_mulai' => '07:00',
            'jam_selesai' => '08:40',
            'kode_kelas' => 'A',
            'ruang' => 'E101',
            'hari' => 'Kamis',
            'status' => 'disetujui',
            'kuota' => '50',
            'kode_tahun' => '22/23GA'
        ]);
        Jadwal::create([
            'kode_mk' => 'PAIK6101',
            'jam_mulai' => '07:00',
            'jam_selesai' => '08:40',
            'kode_kelas' => 'A',
            'ruang' => 'B201',
            'hari' => 'Jumat',
            'status' => 'disetujui',
            'kuota' => '50',
            'kode_tahun' => '22/23GA'
        ]);
        Jadwal::create([
            'kode_mk' => 'PAIK6105',
            'jam_mulai' => '09:40',
            'jam_selesai' => '11:20',
            'kode_kelas' => 'A',
            'ruang' => 'E102',
            'hari' => 'Jumat',
            'status' => 'disetujui',
            'kuota' => '50',
            'kode_tahun' => '22/23GA'
        ]);
        Jadwal::create([
            'kode_mk' => 'UUW00003',
            'jam_mulai' => '07:00',
            'jam_selesai' => '09:30',
            'kode_kelas' => 'A',
            'ruang' => 'B103',
            'hari' => 'Sabtu',
            'status' => 'disetujui',
            'kuota' => '50',
            'kode_tahun' => '22/23GA'
        ]);

        // Jadwal Semester 2
        Jadwal::create([
            'kode_mk' => 'PAIK6202',
            'jam_mulai' => '07:00',
            'jam_selesai' => '08:40',
            'kode_kelas' => 'A',
            'ruang' => 'E102',
            'hari' => 'Senin',
            'status' => 'disetujui',
            'kuota' => '50',
            'kode_tahun' => '22/23GE'
        ]);
        Jadwal::create([
            'kode_mk' => 'UUW00006',
            'jam_mulai' => '15:40',
            'jam_selesai' => '17:20',
            'kode_kelas' => 'A',
            'ruang' => 'E102',
            'hari' => 'Senin',
            'status' => 'disetujui',
            'kuota' => '50',
            'kode_tahun' => '22/23GE'
        ]);
        Jadwal::create([
            'kode_mk' => 'UUW00004',
            'jam_mulai' => '08:50',
            'jam_selesai' => '10:30',
            'kode_kelas' => 'A',
            'ruang' => 'E102',
            'hari' => 'Senin',
            'status' => 'disetujui',
            'kuota' => '50',
            'kode_tahun' => '22/23GE'
        ]);
        Jadwal::create([
            'kode_mk' => 'PAIK6204',
            'jam_mulai' => '07:00',
            'jam_selesai' => '09:30',
            'kode_kelas' => 'A',
            'ruang' => 'E102',
            'hari' => 'Selasa',
            'status' => 'disetujui',
            'kuota' => '50',
            'kode_tahun' => '22/23GE'
        ]);
        Jadwal::create([
            'kode_mk' => 'PAIK6603',
            'jam_mulai' => '13:00',
            'jam_selesai' => '15:30',
            'kode_kelas' => 'A',
            'ruang' => 'K102',
            'hari' => 'Rabu',
            'status' => 'disetujui',
            'kuota' => '50',
            'kode_tahun' => '22/23GE'
        ]);
        Jadwal::create([
            'kode_mk' => 'PAIK6203',
            'jam_mulai' => '13:00',
            'jam_selesai' => '15:30',
            'kode_kelas' => 'A',
            'ruang' => 'E102',
            'hari' => 'Selasa',
            'status' => 'disetujui',
            'kuota' => '50',
            'kode_tahun' => '22/23GE'
        ]);
        Jadwal::create([
            'kode_mk' => 'UUW00011',
            'jam_mulai' => '08:50',
            'jam_selesai' => '10:30',
            'kode_kelas' => 'A',
            'ruang' => 'E102',
            'hari' => 'Rabu',
            'status' => 'disetujui',
            'kuota' => '50',
            'kode_tahun' => '22/23GE'
        ]);
        Jadwal::create([
            'kode_mk' => 'PAIK6201',
            'jam_mulai' => '07:00',
            'jam_selesai' => '08:40',
            'kode_kelas' => 'A',
            'ruang' => 'E102',
            'hari' => 'Kamis',
            'status' => 'disetujui',
            'kuota' => '50',
            'kode_tahun' => '22/23GE'
        ]);

        // Semester 3
        $jadwals3 = [['kode_mk' => 'PAIK6301', 'hari' => 'Senin', 'jam_mulai' => '07:00:00', 'jam_selesai' => '10:20:00', 'ruang' => 'E103', 'kode_kelas' => 'A', 'kode_tahun' => '23/24GA', 'kuota' => '50'],
        ['kode_mk' => 'PAIK6302', 'hari' => 'Selasa', 'jam_mulai' => '09:40:00', 'jam_selesai' => '12:10:00', 'ruang' => 'E103', 'kode_kelas' => 'A', 'kode_tahun' => '23/24GA', 'kuota' => '50'],
        ['kode_mk' => 'PAIK6303', 'hari' => 'Senin', 'jam_mulai' => '13:00:00', 'jam_selesai' => '16:20:00', 'ruang' => 'E103', 'kode_kelas' => 'A', 'kode_tahun' => '23/24GA', 'kuota' => '50'],
        ['kode_mk' => 'PAIK6304', 'hari' => 'Selasa', 'jam_mulai' => '07:00:00', 'jam_selesai' => '09:30:00', 'ruang' => 'E103', 'kode_kelas' => 'A', 'kode_tahun' => '23/24GA', 'kuota' => '50'],
        ['kode_mk' => 'PAIK6305', 'hari' => 'Kamis', 'jam_mulai' => '15:40:00', 'jam_selesai' => '18:10:00', 'ruang' => 'K202', 'kode_kelas' => 'A', 'kode_tahun' => '23/24GA', 'kuota' => '50'],
        ['kode_mk' => 'PAIK6306', 'hari' => 'Senin', 'jam_mulai' => '10:40:00', 'jam_selesai' => '12:20:00', 'ruang' => 'E101', 'kode_kelas' => 'A', 'kode_tahun' => '23/24GA', 'kuota' => '50'],
        ['kode_mk' => 'UUW00008', 'hari' => 'Jumat', 'jam_mulai' => '13:50:00', 'jam_selesai' => '15:30:00', 'ruang' => 'K102', 'kode_kelas' => 'A', 'kode_tahun' => '23/24GA', 'kuota' => '50'],];

        // Semester 3
        $jadwals4 = [['kode_mk' => 'PAIK6404', 'hari' => 'Senin', 'jam_mulai' => '07:00:00', 'jam_selesai' => '09:30:00', 'ruang' => 'A303', 'kode_kelas' => 'A', 'kode_tahun' => '23/24GE', 'kuota' => '50'],
        ['kode_mk' => 'PAIK6401', 'hari' => 'Senin', 'jam_mulai' => '13:00:00', 'jam_selesai' => '15:30:00', 'ruang' => 'E101', 'kode_kelas' => 'A', 'kode_tahun' => '23/24GE', 'kuota' => '50'],
        ['kode_mk' => 'PAIK6406', 'hari' => 'Selasa', 'jam_mulai' => '07:00:00', 'jam_selesai' => '09:30:00', 'ruang' => 'K102', 'kode_kelas' => 'A', 'kode_tahun' => '23/24GE', 'kuota' => '50'],
        ['kode_mk' => 'PAIK6601', 'hari' => 'Rabu', 'jam_mulai' => '13:00:00', 'jam_selesai' => '15:30:00', 'ruang' => 'K202', 'kode_kelas' => 'A', 'kode_tahun' => '23/24GE', 'kuota' => '50'],
        ['kode_mk' => 'PAIK6403', 'hari' => 'Kamis', 'jam_mulai' => '07:00:00', 'jam_selesai' => '09:30:00', 'ruang' => 'A303', 'kode_kelas' => 'A', 'kode_tahun' => '23/24GE', 'kuota' => '50'],
        ['kode_mk' => 'PAIK6405', 'hari' => 'Kamis', 'jam_mulai' => '13:00:00', 'jam_selesai' => '15:30:00', 'ruang' => 'K102', 'kode_kelas' => 'A', 'kode_tahun' => '23/24GE', 'kuota' => '50'],
        ['kode_mk' => 'PAIK6402', 'hari' => 'Jumat', 'jam_mulai' => '13:00:00', 'jam_selesai' => '15:30:00', 'ruang' => 'A204', 'kode_kelas' => 'A', 'kode_tahun' => '23/24GE', 'kuota' => '50'],
        ];

        foreach ($jadwals3 as $row){
            Jadwal::create($row);
        } 
        foreach ($jadwals4 as $row){
            Jadwal::create($row);
        } 

        // Detail IRS
        // $detaill = [
        //     ['id_irs' => '1', 'id_jadwal' => '15'],
        //     ['id_irs' => '1', 'id_jadwal' => '16'],
        //     ['id_irs' => '1', 'id_jadwal' => '17'],
        //     ['id_irs' => '1', 'id_jadwal' => '18'],
        //     ['id_irs' => '1', 'id_jadwal' => '19'],
        //     ['id_irs' => '1', 'id_jadwal' => '20'],
        //     ['id_irs' => '1', 'id_jadwal' => '21'],
        //     ['id_irs' => '1', 'id_jadwal' => '22'],
        //     ['id_irs' => '2', 'id_jadwal' => '23'],
        //     ['id_irs' => '2', 'id_jadwal' => '24'],
        //     ['id_irs' => '2', 'id_jadwal' => '25'],
        //     ['id_irs' => '2', 'id_jadwal' => '26'],
        //     ['id_irs' => '2', 'id_jadwal' => '28'],
        //     ['id_irs' => '2', 'id_jadwal' => '29'],
        //     ['id_irs' => '2', 'id_jadwal' => '30'],
        //     ['id_irs' => '3', 'id_jadwal' => '31'],
        //     ['id_irs' => '3', 'id_jadwal' => '32'],
        //     ['id_irs' => '3', 'id_jadwal' => '33'],
        //     ['id_irs' => '3', 'id_jadwal' => '34'],
        //     ['id_irs' => '3', 'id_jadwal' => '35'],
        //     ['id_irs' => '3', 'id_jadwal' => '36'],
        //     ['id_irs' => '4', 'id_jadwal' => '38'],
        //     ['id_irs' => '4', 'id_jadwal' => '39'],
        //     ['id_irs' => '4', 'id_jadwal' => '40'],
        //     ['id_irs' => '4', 'id_jadwal' => '42'],
        //     ['id_irs' => '4', 'id_jadwal' => '43'],
        //     ['id_irs' => '4', 'id_jadwal' => '44'],
        //     ['id_irs' => '5', 'id_jadwal' => '11'],
        //     ['id_irs' => '5', 'id_jadwal' => '12'],
        //     ['id_irs' => '5', 'id_jadwal' => '13'],

        // ];

        // foreach($detaill as $row){
        //     DetailIRS::create($row);
        // }

        
    }   
}
