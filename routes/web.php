<?php

use Illuminate\Support\Facades\Route;

//controller
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\Logincontroller;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\CssSelector\Node\FunctionNode;

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


Route::get('/about', function () {
    return view('about');
});
Route::get('/projects', function () {
    return view('projects');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/Pro', function () {
    return view('Portofolio');
});

Route::middleware('auth')->group(function(){
    Route::resource('/dashboard', DashboardController::class);
    Route::resource('/mastersiswa', SiswaController::class);
    Route::resource('/masterproject', ProjectController::class);
    Route::get('mastersiswa/{id_siswa}/hapus', [SiswaController::class, 'hapus'])->name('mastersiswa.hapus');
    Route::get('masterproject/create/{id_siswa}', [ProjectController::class, 'tambah'])->name('masterproject.tambah');
    Route::get('masterproject/{id_siswa}/hapus', [ProjectController::class, 'hapus'])->name('masterproject.hapus');
    Route::resource('/masterkontak', KontakController::class);
    Route::post('logout', [Logincontroller::class, 'logout']);
    
});
    
Route::middleware('guest')->group(function(){
    Route::post('login', [Logincontroller::class, 'authenticate']);
    Route::get('login', [Logincontroller::class, 'index'])->name('login');
    Route::get('/', function () {
        return view('home');
    });
});