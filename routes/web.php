<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Student\MentoringController;
use App\Http\Middleware\StudentMiddleware;
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



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::middleware([StudentMiddleware::class])->group(function () {
        Route::prefix('student')->group(function () {
            Route::get('/profile', function () {
                return view('pages.student.profile');
            })->name('student.profile');


            Route::prefix('mentoring')->group(function () {
                Route::get('/', [MentoringController::class, 'index'])->name('student.mentoring');
                Route::post('/new_question', [MentoringController::class, 'new_question'])->name('student.mentoring.new_question');
            });
        });
    });




    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
