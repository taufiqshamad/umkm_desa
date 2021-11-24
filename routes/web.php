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
Route::get('/umkm/{village_id}/all', [UMKMController::class, 'showAllVillageUMKM'])->name('umkm.all');
Route::get('/umkm/{village_id}/{category}', [UMKMController::class, 'showVillageUMKMByCategory'])->name('umkm.by_category');
Route::get('/umkm/{village_id}/{category}/{id}/{slug}', [UMKMController::class, 'umkmDetail'])->name('umkm.detail');
Route::get('/import-umkm', [UMKMController::class,'import']);