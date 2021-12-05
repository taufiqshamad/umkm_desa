<?php

use App\Http\Controllers\UMKMController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [UMKMController::class, 'index']);
Route::get('/umkm/{village_id}/all', [UMKMController::class, 'showAllVillageUMKM'])->name('umkm.allVillageUmkm');
Route::get('/umkm/{village_id}/{category}', [UMKMController::class, 'showVillageUMKMByCategory'])->name('umkm.by_category');
Route::get('/umkm/{village_id}/{category}/{id}/{slug}', [UMKMController::class, 'umkmDetail'])->name('umkm.detail');
Route::get('/import-umkm', [UMKMController::class,'import']);
Route::get('/all-umkm', [UMKMController::class, 'allUMKM'])->name('umkm.all');

Route::get('input-brutal', function(){
    try{
        // App\Models\Coordinate::create([
        //     'village_id' => 1212090015,
        //     'latitude' => '3.341407430545962',
        //     'longitude' => '98.77248132501501',
        // ]);
        // App\Models\Coordinate::create([
        //     'village_id' => 1212200013,
        //     'latitude' => '3.547169550600143',
        //     'longitude' => '98.7715176997814',
        // ]);
        // App\Models\Coordinate::create([
        //     'village_id' => 1212200012,
        //     'latitude' => '3.5233671857149065',
        //     'longitude' => '98.753354490289',
        // ]);
        // App\Models\Coordinate::create([
        //     'village_id' => 1212200018,
        //     'latitude' => '3.5398906270013883',
        //     'longitude' => '98.8182860549244',
        // ]);
        // App\Models\Coordinate::create([
        //     'village_id' => 1212230009,
        //     'latitude' => '3.52247803266039',
        //     'longitude' => '98.75337976843814',
        // ]);
        // \App\Models\UMKM::create([
        //     'category_id' => 1,
        //     'name'  => 'Kemiri',
        //     'owner_name' => 'Riduan',
        //     'address' => 'Jl. Besar Raya Namorambe',
        //     'village_id' => 1212060036,
        //     'district_id' => 1212060,
        //     'regency_id' => 1212,
        //     'province_id' => 12,
        //     'business_type' => 'Kemiri',
        //     'is_featured' => 1
        // ]);

        // \App\Models\UMKM::create([
        //     'category_id' => 1,
        //     'name'  => 'TALES INTI SAWIT, PT ',
        //     'owner_name' => 'Jadi Aman Sihombing',
        //     'address' => 'DUSUN II DESA BANDAR MERIAH',
        //     'village_id' => 1212090015,
        //     'district_id' => 1212090,
        //     'regency_id' => 1212,
        //     'province_id' => 12,
        //     'business_type' => 'Ubi Kayu / Sawit',
        //     'is_featured' => 1
        // ]);

        // \App\Models\UMKM::create([
        //     'category_id' => 1,
        //     'name'  => 'CV Putra Fajar',
        //     'owner_name' => 'Fajar',
        //     'address' => 'Gg. Mardisan KM 13,2',
        //     'village_id' => 1212200013,
        //     'district_id' => 1212200,
        //     'regency_id' => 1212,
        //     'province_id' => 12,
        //     'business_type' => 'Kerupuk',
        //     'is_featured' => 1
        // ]);

        // \App\Models\UMKM::create([
        //     'category_id' => 1,
        //     'name'  => 'UD Berkat Jaya',
        //     'owner_name' => 'Harry Tjahyono',
        //     'address' => 'Jl. Harapan Dsn V Desa Buntu Bedimbar Kec. Tanjung Morawa',
        //     'village_id' => 1212200015,
        //     'district_id' => 1212200,
        //     'regency_id' => 1212,
        //     'province_id' => 12,
        //     'business_type' => 'Mie Basah',
        //     'is_featured' => 1
        // ]);

        // \App\Models\UMKM::create([
        //     'category_id' => 1,
        //     'name'  => 'UD Sinar Bintang',
        //     'owner_name' => 'TIDAK ADA NAMA',
        //     'address' => 'DUSUN 6 GANG TAMBAK REJO ',
        //     'village_id' => 1212200015,
        //     'district_id' => 1212200,
        //     'regency_id' => 1212,
        //     'province_id' => 12,
        //     'business_type' => 'Kacang Telor/Arab',
        //     'is_featured' => 1
        // ]);

        // \App\Models\UMKM::create([
        //     'category_id' => 1,
        //     'name'  => 'KILANG MIE GUNUNG MAS, PT ',
        //     'owner_name' => 'TIDAK ADA NAMA',
        //     'address' => 'JL. Tanjung Morawa, Km 14, 2, Ujung Serdang, Tj. Morawa, Kabupaten Deli Serdang, Sumatera Utara 98412',
        //     'village_id' => 1212200012,
        //     'district_id' => 1212200,
        //     'regency_id' => 1212,
        //     'province_id' => 12,
        //     'business_type' => 'Mie Basah',
        //     'is_featured' => 1
        // ]);

        // \App\Models\UMKM::create([
        //     'category_id' => 1,
        //     'name'  => 'TUNGGAL JAYA PRIMA, UD ',
        //     'owner_name' => 'TIDAK ADA NAMA',
        //     'address' => 'JL. PELITA I BLOK. A NO.19 ',
        //     'village_id' => 1212200018,
        //     'district_id' => 1212200,
        //     'regency_id' => 1212,
        //     'province_id' => 12,
        //     'business_type' => 'Bawang Goreng',
        //     'is_featured' => 1
        // ]);

        // \App\Models\UMKM::create([
        //     'category_id' => 1,
        //     'name'  => 'MULIA KARYA, CV',
        //     'owner_name' => 'Harianto Siregar',
        //     'address' => 'JL. SEJARAH KM 11',
        //     'village_id' => 1212230009,
        //     'district_id' => 1212230,
        //     'regency_id' => 1212,
        //     'province_id' => 12,
        //     'business_type' => 'Kemiri',
        //     'is_featured' => 1
        // ]);
    }
    catch(Exception $error){
        var_dump($error);
    }
});