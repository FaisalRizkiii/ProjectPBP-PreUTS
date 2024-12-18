<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\DekanController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\AkademikController;
use App\Http\Controllers\historyIRSController;
use App\Http\Controllers\InputNilaiController;
use App\Http\Controllers\KuliahOnlineController;
use App\Http\Controllers\IRSController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KHSController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WaliController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Login Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
// Proses login
Route::post('/login', [LoginController::class, 'login']);

// About Page Route
Route::get('/about', function () {
    return view('about');
})->name('about');

// Check App Key Route (just for development purposes)
Route::get('/check-key', function () {
    return env('APP_KEY');
});

Route::get('/logout', function () {
    return view('logout');
})->name('logout');
// Logout Route
Route::post('/logout', [LoginController::class, 'logout']);

// Route::get('/dekan/dashboard', [DekanController::class, 'index'])->name('dekan.dashboard');
// Route::post('/dekan/set-jadwal', [DekanController::class, 'setJadwal'])->name('dekan.setJadwal');
// Route::post('/dekan/set-ruang', [DekanController::class, 'setRuang'])->name('dekan.setRuang');



// // Group routes that require authentication
Route::middleware(['auth'])->group(function () {
    Route::pattern('dashboard', 'dashboard|');

    // Student dashboard route (requires 'mahasiswa' role)
    Route::get('/mahasiswa/{dashboard?}', function(){
        return view('mahasiswa.dashboard');
    })->name('mahasiswa.dashboard')
    ->middleware('role:mahasiswa'); 

    Route::get('dosen/{dashboard?}', function() {
        return view('dosen.dashboard');
    })->name('dosen.dashboard')
      ->middleware('role:dosen'); // Check for 'dosen' role

    Route::middleware(['auth', 'role:dekan'])->group(function () {
        Route::get('/dekan/dashboard', [DekanController::class, 'index'])->name('dekan.dashboard');
        Route::post('/dekan/dashboard/set-jadwal', [DekanController::class, 'setJadwal'])->name('dekan.setJadwal');
        Route::post('/dekan/dashboard/set-ruang', [DekanController::class, 'setRuang'])->name('dekan.setRuang');
    }); // Check for 'dekan' role

    Route::middleware(['auth'])->group(function () {
        // Rute untuk setujui semua jadwal
        Route::post('/dekan/set-all-jadwal', [DekanController::class, 'setAllJadwal'])->name('dekan.setAllJadwal');

        // Rute untuk tetapkan semua status ruang
        Route::post('/dekan/set-all-ruang', [DekanController::class, 'setAllRuang'])->name('dekan.setAllRuang');
    });

    Route::middleware(['auth', 'role:akademik'])->group(function () {
        Route::get('/akademik/dashboard', [AkademikController::class, 'index'])->name('akademik.dashboard');
        Route::post('/akademik/set-ruang', [AkademikController::class, 'setRuang'])->name('akademik.setRuang');
        Route::post('/akademik/set-all-ruang', [AkademikController::class, 'setAllRuang'])->name('akademik.setAllRuang');
    });

    // Student status_akademik route
    Route::get('mahasiswa/status_akademik', function(){
        return view('mahasiswa.status_akademik');
    })->name('mahasiswa.status_akademik')
    ->middleware('role:mahasiswa');

    Route::get('mahasiswa/registrasi_mhs', function(){
        return view('mahasiswa.registrasi_mhs');
    })->name('mahasiswa.registrasi_mhs')
    ->middleware('role:mahasiswa');
    

    Route::get('mahasiswa/irs_mhs', function(){
        return view('mahasiswa.irs_mhs');
    })->name('mahasiswa.irs_mhs')
    ->middleware('role:mahasiswa');

    Route::get('mahasiswa/jadwal_mhs', [JadwalController::class, 'jadwalMahasiswa'])
    ->name('mahasiswa.jadwal_mhs')
    ->middleware('role:mahasiswa');


    Route::get('mahasiswa/history_irs', function(){
        return view('mahasiswa.history_irs');
    })->name('mahasiswa.history_irs')
    ->middleware('role:mahasiswa');

    Route::get('mahasiswa/khs_mhs', function(){
        return view('mahasiswa.khs_mhs');
    })->name('mahasiswa.khs_mhs')
    ->middleware('role:mahasiswa');

    Route::get('mahasiswa/transkrip_mhs', function(){
        return view('mahasiswa.transkrip_mhs');
    })->name('mahasiswa.transkrip_mhs')
    ->middleware('role:mahasiswa');

    Route::get('/admin/{dashboard?}', [AdminController::class, 'index'])->name('admin.dashboardalt')
    ->middleware('role:admin');  // Check for 'admin' role

    Route::post('/api/fetch-tahun', [WaliController::class, 'fetchTahun'])->name('fetch.tahun');
    Route::post('/api/fetch-mahasiswa', [WaliController::class, 'fetchMahasiswa']);
    Route::post('/api/fetch-departemen', [DepartemenController::class, 'fetchDepartemen']);
    Route::post('/api/fetch-prodi', [ProdiController::class, 'fetchProdi']);
    Route::post('/api/fetch-doswal', [WaliController::class, 'fetchDoswal']);
    Route::post('/api/count-status', [WaliController::class, 'fetchDoswal']);
    Route::get('/api/jadwal', [JadwalController::class, 'apiJadwal']);
    Route::post('api/fetch-mhs-mk', [InputNilaiController::class, 'fetchMhs']);
    Route::post('api/fetch-history-khs', [KHSController::class, 'fetchHistoryKHS']);
    Route::post('api/check-khs', [InputNilaiController::class, 'checkKHS']);
    Route::post('api/update-khs', [InputNilaiController::class, 'updateKHS']);
    Route::get('/mhs/print_irs/{nim}/{semester}', [PDFController::class, 'viewIRS'])->name('printIRS');

});

Route::middleware(['auth','role:dosen'])->group(function(){
    // Lecturer dashboard route (requires 'dosen' role)

    Route::get('/dosen/perwalian', function(){
        return view('dosen.perwalian/index');
    })->name('dosen.perwalian')
    ->middleware('role:dosen');

    Route::get('/dosen/input_nilai', [InputNilaiController::class, 'index'])->name('dosen.input_nilai')
    ->middleware('role:dosen');

    Route::get('dosen/jadwal', [JadwalController::class, 'jadwalMengajar'])
    ->name('dosen.jadwal')
    ->middleware('role:dosen');

    Route::get('dosen/perwalian/{nim}', [WaliController::class, 'view'])->name('perwalian.view')->middleware('perwalian');
    Route::post('api/approve-irs/', [WaliController::class, 'approveIRS']);
    Route::post('/api/fetch-aju-irs', [WaliController::class, 'fetchAjuanIRS']);
    Route::post('/api/fetch-history-irs', [WaliController::class, 'fetchHistoryIRS']);
});



Route::middleware(['auth', 'role:kaprodi'])->group(function(){
    Route::get('/kaprodi/menu', function() {
        return view('kaprodi.menu');
    })->name('kaprodi.menu')
        ->middleware('role:kaprodi');
        
    Route::resource('/kaprodi/matkul', MataKuliahController::class)->name('index','matkul.index')
                                                            ->name('edit','matkul.edit')
                                                            ->name('create','matkul.create')
                                                            ->name('update','matkul.update');
                                                
    Route::resource('/kaprodi/jadwal', JadwalController::class)->name('index','jadwal.index')
                                                            ->name('edit','jadwal.edit')
                                                            ->name('create','jadwal.create')
                                                            ->name('update','jadwal.update');
    Route::post('/kaprodi/jadwal/save', [JadwalController::class, 'saveChanges'])->name('jadwal.saveChanges');

});

Route::post('/api/fetch-dosen', [JadwalController::class, 'fetchDosen'])->name('fetch.dosen');

// // Admin-specific routes with authentication and 'admin' middleware
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('/admin/users', UserController::class)->name('index','users.index')
                                                        ->name('edit','users.edit')
                                                        ->name('create','users.create')
                                                        ->name('update','users.update'); // CRUD routes for users

    Route::resource('/admin/mahasiswa', MahasiswaController::class)->name('index','mahasiswa.index')
                                                        ->name('edit','mahasiswa.edit')
                                                        ->name('create','mahasiswa.create')
                                                        ->name('update','mahasiswa.update'); // CRUD routes for users

    Route::resource('/admin/dosen', DosenController::class)->name('index','dosen.index')
                                                        ->name('edit','dosen.edit')
                                                        ->name('create','dosen.create')
                                                        ->name('update','dosen.update'); // CRUD routes for users

    Route::resource('/admin/ruang', RuangController::class)->name('index','ruang.index')
                                                        ->name('edit','ruang.edit')
                                                        ->name('create','ruang.create')
                                                        ->name('update','ruang.update'); // CRUD routes for ruang

                            
    Route::post('/admin/create-users', [AdminController::class, 'createUsersFromLecturersAndStudents'])->name('admin.createUsers');
    Route::post('/admin/update-sks', [MahasiswaController::class, 'updateSksIpk'])->name('mahasiswa.update.sksipk');
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});



Route::middleware(['auth', 'role:mahasiswa'])->group(function () {
    // Registrasi Mahasiswa
    Route::post('/get-registrasi-data', [RegistrasiController::class, 'getRegistrasiData'])->name('getRegistrasiData');
    Route::get('/mahasiswa/registrasi_mhs', [RegistrasiController::class, 'index'])->name('mahasiswa.registrasi_mhs');
    
    // IRS mahasiswa
    Route::get('/mahasiswa/irs_mhs', [IRSController::class, 'index'])->name('mahasiswa.irs_mhs');
    Route::post('/mahasiswa/irs_mhs', [IRSController::class, 'add'])->name('irs.add');
    Route::delete('/mahasiswa/irs_mhs', [IRSController::class, 'delete'])->name('irs.delete');
    Route::post('/mahasiswa/irs_mhs/update', [IRSController::class, 'updateMK'])->name('irs.update');

    // History IRS
    Route::get('/mahasiswa/history_irs', [historyIRSController::class, 'index'])->name('mahasiswa.history_irs');
    Route::post('/mahasiswa/history_irs/showIRS', [historyIRSController::class, 'showIRS'])->name('mahasiswa.showIRS');
});