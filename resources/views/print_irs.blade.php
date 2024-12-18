<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PRINT IRS {{ $mahasiswa->nama }}</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            /* margin: 20px; */
            font-size: 12px;
        }
        .header {
            text-align: center;
            margin-bottom: 15px;
            font-size: 0.55rem;
            line-height: 1.5;
            font-weight: normal;
        }
        .header h1 {
            margin: 5px 0;
            text-transform: uppercase;
            font-weight: normal;
        }
        .student-info {
            margin-bottom: 15px;
        }
        .student-info p {
            margin: 5px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        table, th, td {
            border: 1px solid #000;
        }
        th, td {
            padding: 5px;
            text-align: left;
        }
        th {
            background-color: #f5f5f5;
        }
        .signature-container {
        display: flex; /* Jadikan parent sebagai flex container */
        flex-direction: column; /* Tetap default column jika ada elemen sebelumnya */
        width: 100%;
    }

        .signature {
            display: flex !important;
            justify-content: space-between !important; /* Sebar anak ke ujung kiri dan kanan */
            align-items: flex-start; /* Sejajarkan elemen di atas */
            margin-top: 2rem;
            width: 100%; /* Ambil ruang penuh */
        }
        .signature div {
            width: 45%; /* Atur lebar elemen jika diperlukan */
            text-align: center;
        }


        .pasfoto {
            margin-top: 100px;
            width: 90px;
            height: 120px;
            object-fit: cover;
            position: absolute;
            top: 20px;
            right: 20px;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET, DAN TEKNOLOGI</h1>
        <h1>FAKULTAS {{ strtoupper($mahasiswa->prodi->departemen->fakultas->nama_fakultas) }}</h1>
        <h1>UNIVERSITAS DIPONEGORO</h1>
    </div>

    <img class="pasfoto" src="{{ public_path('img/Pasfoto.png') }}" alt="Pasfoto">

    <h3 style="text-align: center; text-transform: uppercase;">ISIAN RENCANA STUDI</h3>
    <h3 style="text-align: center;">Semester {{ $tahunAjaranAktif->bag_semester }} TA {{ $tahunAjaranAktif->tahun_akademik }}</h3>

    <div class="student-info">
        <p>Nama: {{ $mahasiswa->nama }}</p>
        <p>NIM: {{ $mahasiswa->nim }}</p>
        <p>Program Studi: {{ $mahasiswa->prodi->nama }} {{ $mahasiswa->prodi->strata }}</p>
        <p>Dosen Wali: {{ $mahasiswa->dosen->nama }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode MK</th>
                <th>Nama MK</th>
                <th>SKS</th>
                <th>Kelas</th>
                <th>Ruangan</th>
                <th>Dosen</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ListJadwal as $index => $detail)
            <tr>
                <td rowspan="2" style="text-align: center;">{{ $index + 1 }}</td>
                <td>{{ $detail->jadwal->matakuliah->kode_mk }}</td>
                <td>{{ $detail->jadwal->matakuliah->nama_mk }}</td>
                <td style="text-align: center;">{{ $detail->jadwal->matakuliah->sks }}</td>
                <td style="text-align: center;">{{ $detail->jadwal->kode_kelas }}</td>
                <td style="text-align: center;">{{ $detail->jadwal->ruang }}</td>
                <td>
                    @if($detail->jadwal->dosen_pengampu->isNotEmpty())
                        {{ $detail->jadwal->dosen_pengampu->map(function($dosenPengampu) {
                            return $dosenPengampu->dosen->nama;
                        })->implode(', ') }}
                    @else
                        Tidak ada dosen
                    @endif
                </td>
            </tr>
            <tr>
                <td colspan="6">
                    {{ $detail->jadwal->hari }} pukul {{ $detail->jadwal->jam_mulai }} - {{ $detail->jadwal->jam_selesai }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div style="position: relative; height: 100px; width: 100%;">
        <div style="position: absolute; left: 0; text-align: center;">
            <p style="margin-bottom: 5rem;">Pembimbing Akademik (Dosen Wali)</p>
            <p>{{ $mahasiswa->dosen->nama }}</p>
            <p>NIDN. {{ $mahasiswa->dosen->nidn }}</p>
        </div>
        <div style="position: absolute; right: 0; text-align: center;">
            <p style="margin-bottom: 5rem;">Semarang, {{ $date }}</p>
            <p style="text-transform: uppercase;">{{ $mahasiswa->nama }}</p>
            <p>NIM. {{ $mahasiswa->nim }}</p>
        </div>
    </div>
    
    
</body>
</html>
