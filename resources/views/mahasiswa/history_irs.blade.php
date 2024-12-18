@include('header')
<div class="flex flex-col min-h-screen">
    <!-- NavBar -->
    <x-navbar/>
    <div class="flex flex-col flex-grow">
        <!-- Header -->
        <div class="flex items-center justify-between py-3 p-8">
            <div class="font-bold text-lg md:text-xl pl-4 py-1">
                IRS
            </div>
        </div>

        <div class="ml-12 mr-8 mb-16 border border-gray-300 rounded-xl  shadow-md hover:shadow-lg transition-shadow">
            @foreach ($irsList as $item)
                <div class="border-b last:border-b-0">
                    <!-- Semester Toggle Button -->
                    <button 
                        onclick="toggleSemester({{ $item->semester }})"
                        class="w-full px-6 py-4 flex items-center justify-between hover:bg-gray-50 focus:outline-none"
                    >
                        <div class="flex items-center gap-4">
                            <span class="font-medium">Semester</span>
                            <span class="text-gray-600">{{ $item->semester }}</span>
                        </div>
                        <svg 
                            id="semester-icon-{{ $item->semester }}"
                            class="transform transition-transform duration-300 text-gray-400"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            width="20"
                            height="20"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                        </svg>
                    </button>
            
                    <!-- Semester Details -->
                    <div id="semester-{{ $item->semester }}" class="p-6 border-t bg-gray-50 hidden">
                        <table class="w-full bg-white border-collapse mb-6">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-3 text-left border">Kode MK</th>
                                    <th class="px-4 py-3 text-left border">Mata Kuliah</th>
                                    <th class="px-4 py-3 text-center border">SKS</th>
                                    <th class="px-4 py-3 text-center border">Kelas</th>
                                    <th class="px-4 py-3 text-center border">Hari</th>
                                    <th class="px-4 py-3 text-center border">Waktu</th>
                                    <th class="px-4 py-3 text-center border">Ruang</th>
                                    <th class="px-4 py-3 text-left border">Dosen</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($jadwalByIRS[$item->id_irs] ?? [] as $jadwal)
                                    <tr>
                                        <td class="px-4 py-3 border">{{ $jadwal->kode_mk }}</td>
                                        <td class="px-4 py-3 border">{{ $jadwal->mataKuliah->nama_mk }}</td>
                                        <td class="px-4 py-3 text-center border">{{ $jadwal->mataKuliah->sks }}</td>
                                        <td class="px-4 py-3 text-center border">{{ $jadwal->kode_kelas }}</td>
                                        <td class="px-4 py-3 text-center border">{{ $jadwal->hari }}</td>
                                        <td class="px-4 py-3 text-center border">
                                            {{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }}
                                        </td>
                                        <td class="px-4 py-3 text-center border">{{ $jadwal->ruang }}</td>
                                        <td class="px-4 py-3 border">
                                            @if($jadwal->dosen_pengampu->isNotEmpty())
                                                {{ $jadwal->dosen_pengampu->map(function($dosenPengampu) {
                                                    return $dosenPengampu->dosen->nama;
                                                })->implode(', ') }}
                                            @else
                                                Tidak ada dosen
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="px-4 py-3 text-center text-gray-500 border">
                                            Tidak ada jadwal
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr class="bg-gray-50">
                                    <td colspan="2" class="px-4 py-3 font-medium border">Total SKS</td>
                                    <td class="px-4 py-3 text-center font-medium border">
                                        {{ $detailIRSWithTotalSKS->where('id_irs', $item->id_irs)->sum('total_sks') }}
                                    </td>
                                    <td colspan="5" class="border"></td>
                                </tr>
                            </tfoot>
                        </table>

                        @if ($item->status === 'sudah_disetujui')
                            <a href="{{ route('printIRS', ['nim' => $item->nim_mahasiswa, 'semester' => $item->semester]) }}" 
                                class="py-2 px-3 bg-red-500 hover:bg-red-600 text-white text-md rounded-lg shadow-md">
                                Print IRS
                            </a>
                        @endif

                    </div>
                </div>
            @endforeach
        </div>
    
    </div>

@include('footer')

<!-- SWEET ALERT -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: "{{ session('success') }}",
                confirmButtonText: 'OK',
                confirmButtonColor: '#3085d6'
            });
        @endif

        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: "{{ session('error') }}",
                confirmButtonText: 'OK',
                confirmButtonColor: '#3085d6'
            });
        @endif
    });
</script>



{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
const dropdownButton = document.getElementById('dropdownDefaultButton');
const dropdownMenu = document.getElementById('dropdown');
const resultContainer = document.getElementById('result'); // Elemen untuk menampilkan hasil

// Fungsi untuk menutup dropdown jika klik di luar
document.addEventListener('click', (event) => {
    if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
        dropdownMenu.classList.add('hidden');
    }
});

// Fungsi untuk toggle dropdown
dropdownButton.addEventListener('click', () => {
    dropdownMenu.classList.toggle('hidden');
});

// Menambahkan event listener ke semua item dropdown
document.querySelectorAll('#dropdown a').forEach(item => {
    item.addEventListener('click', (event) => {
        event.preventDefault(); // Mencegah tindakan default link

        const selectedId = item.getAttribute('data-id'); // Mengambil ID dari data-id
        const selectedText = item.textContent.trim(); // Mengambil teks dari item yang dipilih

        // Update tombol dropdown dengan teks yang dipilih
        dropdownButton.innerHTML = `${selectedText} 
            <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
            </svg>`;

        dropdownMenu.classList.add('hidden'); // Menutup dropdown setelah dipilih

        // Kirim request ke server menggunakan Fetch API
        fetch('{{ route("mahasiswa.showIRS") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Tambahkan token CSRF
            },
            body: JSON.stringify({ selectedIRS: selectedId }) // Data yang dikirim
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Terjadi kesalahan pada server.');
            }
            return response.json();
        })
        .then(data => {
            // Menampilkan hasil response di elemen result
            let resultHTML = '<ul>';
            data.forEach(item => {
                const jadwal = item.jadwal;
                const mataKuliah = jadwal && jadwal.mataKuliah ? jadwal.mataKuliah.nama_mk : 'Tidak ditemukan';
                resultHTML += `<li>${mataKuliah}</li>`; // Tampilkan nama MK
            });
            resultHTML += '</ul>';
            resultContainer.innerHTML = resultHTML;
        })
        .catch(error => {
            console.error('Error:', error);
            resultContainer.innerHTML = '<p class="text-red-500">Terjadi kesalahan. Silakan coba lagi.</p>';
        });


    });
});

</script> --}}

<script>
    function toggleSemester(semester) {
        const details = document.getElementById(`semester-${semester}`);
        const icon = document.getElementById(`semester-icon-${semester}`);

        if (details.classList.contains('hidden')) {
            details.classList.remove('hidden');
            icon.classList.add('rotate-180');
        } else {
            details.classList.add('hidden');
            icon.classList.remove('rotate-180');
        }
    }
</script>

{{-- <script>
$(document).ready(function () {
    // Pastikan NIM sudah didefinisikan
    let nim = "{{ Auth::user()->mahasiswa->nim }}"; // Atur NIM dari Laravel Blade
    if (!nim) {
        $('#history-irs-container').html('<div class="text-center p-4">NIM tidak ditemukan.</div>');
        return;
    }

    // AJAX Request untuk mengambil data riwayat IRS
    $.ajax({
        url: "{{ url('api/fetch-history-irs') }}",
        type: "POST",
        data: {
            nim: nim,
            _token: '{{ csrf_token() }}'
        },
        dataType: 'json',
        success: function (response) {
            let historyIRS = response.history_irs;
            let historyContent = '';

            // Periksa jika data tersedia
            if (historyIRS && historyIRS.length > 0) {
                historyIRS.forEach((semester) => {
                    historyContent += `
                        <div class="border-b last:border-b-0">
                            <button 
                                onclick="toggleSemester(${semester.semester})"
                                class="w-full px-6 py-4 flex items-center justify-between hover:bg-gray-50"
                            >
                                <div class="flex items-center gap-4">
                                    <span class="font-medium">Semester ${semester.semester}</span>
                                    <span class="text-gray-600">${semester.tahun_akademik}</span>
                                </div>
                                <svg 
                                    id="semester-icon-${semester.semester}"
                                    class="transform transition-transform text-gray-400"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    width="20"
                                    height="20"
                                >
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                                </svg>
                            </button>
                            <div 
                                id="semester-content-${semester.semester}"
                                class="p-6 border-t bg-gray-50 hidden"
                            >
                                <table class="w-full bg-white">
                                    <thead>
                                        <tr class="bg-gray-50">
                                            <th class="px-4 py-3 text-left border">Kode MK</th>
                                            <th class="px-4 py-3 text-left border">Mata Kuliah</th>
                                            <th class="px-4 py-3 text-center border">SKS</th>
                                            <th class="px-4 py-3 text-center border">Kelas</th>
                                            <th class="px-4 py-3 text-center border">Hari</th>
                                            <th class="px-4 py-3 text-center border">Waktu</th>
                                            <th class="px-4 py-3 text-center border">Ruang</th>
                                            <th class="px-4 py-3 text-left border">Dosen</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        ${generateJadwalRows(semester.jadwal)}
                                    </tbody>
                                    <tfoot>
                                        <tr class="bg-gray-50">
                                            <td colspan="2" class="px-4 py-3 font-medium border">Total SKS</td>
                                            <td class="px-4 py-3 text-center font-medium border">${semester.total_sks}</td>
                                            <td colspan="5" class="border"></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>`;
                });

                $('#history-irs-container').html(historyContent);
            } else {
                $('#history-irs-container').html('<div class="text-center p-4">Tidak ada riwayat IRS.</div>');
            }
        },
        error: function (xhr, status, error) {
            console.error("Error:", error);
            $('#history-irs-container').html('<div class="text-center p-4">Gagal memuat riwayat IRS.</div>');
        }
    });
});

// Fungsi untuk menghasilkan baris jadwal
function generateJadwalRows(jadwalList) {
    if (!jadwalList || jadwalList.length === 0) {
        return '<tr><td colspan="8" class="text-center p-4">Tidak ada jadwal tersedia.</td></tr>';
    }

    return jadwalList.map(jadwal => `
        <tr>
            <td class="px-4 py-3 border">${jadwal.kode_mk}</td>
            <td class="px-4 py-3 border">${jadwal.nama_mk}</td>
            <td class="px-4 py-3 text-center border">${jadwal.sks}</td>
            <td class="px-4 py-3 text-center border">${jadwal.kode_kelas}</td>
            <td class="px-4 py-3 text-center border">${jadwal.hari}</td>
            <td class="px-4 py-3 text-center border">${jadwal.jam_mulai} - ${jadwal.jam_selesai}</td>
            <td class="px-4 py-3 text-center border">${jadwal.ruang}</td>
            <td class="px-4 py-3 border">${jadwal.dosen}</td>
        </tr>
    `).join('');
}
</script> --}}