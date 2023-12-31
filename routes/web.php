<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('pages.student.profile');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Sementara Kutaruh Sni Biar Kalo Mau Buka Kudu Login sama biar bisa ngambil nama/email, Tapi ntah knp ga bisa ke Dashboard
    Route::get('/admin', function () {
        return view('admin.admin-main');
    })->name('admin.main');

    Route::get('/studentlist', function () {
        return view('admin.admin-student-list');
    })->name('admin.student');

    Route::get('/teacherlist', function () {
        return view('admin.admin-teacher-list');
    })->name('admin.teacher');
});

require __DIR__.'/auth.php';
