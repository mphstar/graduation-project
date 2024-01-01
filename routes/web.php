<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminMainController;
use App\Http\Controllers\Admin\AdminStudentController;
use App\Http\Controllers\Admin\AdminTeacherController;
use App\Http\Controllers\Admin\AdminBroadcastController;
use App\Http\Controllers\Student\MentoringController;
use App\Http\Controllers\Student\ProfileController as StudentProfileController;
use App\Http\Controllers\Teacher\MentoringController as TeacherMentoringController;
use App\Http\Controllers\Teacher\ProfileController as TeacherProfileController;
use App\Http\Controllers\Teacher\StudentController as TeacherStudentController;
use App\Http\Middleware\StudentMiddleware;
use App\Http\Middleware\TeacherMiddleware;
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
    return view('landing');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {

    // Admin Routes
    Route::prefix('admin')->group(function () {
        Route::get('/main', [AdminMainController::class, 'index'])->name('admin-main');

        Route::get('/studentlist', [AdminStudentController::class, 'index'])->name('admin-student');
        Route::delete('/students/{id}', [AdminStudentController::class, 'destroy'])->name('students.destroy');
        Route::put('/update-student', [AdminStudentController::class, 'update'])->name('update-student');

        Route::get('/teacherlist', [AdminTeacherController::class, 'index'])->name('admin-teacher');
        Route::post('/add-teacher', [AdminTeacherController::class, 'addTeacher'])->name('add-teacher');
        Route::put('/update-teacher', [AdminTeacherController::class, 'update'])->name('update-teacher');
        Route::delete('/teachers/{id}', [AdminTeacherController::class, 'destroy'])->name('teachers-destroy');

        Route::get('/broadcast', [AdminBroadcastController::class, 'index'])->name('admin-broadcast');
        Route::post('/broadcast-messages', [AdminBroadcastController::class, 'broadcastMessage'])->name('broadcast-messages');
    });

    // Student Routes
    Route::middleware([StudentMiddleware::class])->group(function () {
        Route::prefix('student')->group(function () {
            Route::prefix('profile')->group(function () {
                Route::get('/', [StudentProfileController::class, 'index'])->name('student.profile');
                Route::post('/update', [StudentProfileController::class, 'update_profile'])->name('student.profile.update');
                Route::post('/update_password', [StudentProfileController::class, 'update_password'])->name('student.profile.update_password');
            });

            Route::prefix('mentoring')->group(function () {
                Route::get('/', [MentoringController::class, 'index'])->name('student.mentoring');
                Route::post('/new_question', [MentoringController::class, 'new_question'])->name('student.mentoring.new_question');
            });
        });
    });

    // Teacher Routes
    Route::middleware([TeacherMiddleware::class])->group(function () {
        Route::prefix('teacher')->group(function () {
            Route::prefix('profile')->group(function () {
                Route::get('/', [TeacherProfileController::class, 'index'])->name('teacher.profile');
                Route::post('/update', [TeacherProfileController::class, 'update_profile'])->name('teacher.profile.update');
                Route::post('/update_password', [TeacherProfileController::class, 'update_password'])->name('teacher.profile.update_password');
            });

            Route::prefix('mentoring')->group(function () {
                Route::get('/', [TeacherMentoringController::class, 'index'])->name('teacher.mentoring');
                Route::post('/answer', [TeacherMentoringController::class, 'answer'])->name('teacher.mentoring.answer');
            });

            Route::prefix('student')->group(function () {
                Route::get('/', [TeacherStudentController::class, 'index'])->name('teacher.student');
                Route::post('/set', [TeacherStudentController::class, 'set_student'])->name('teacher.student.set');
            });
        });
    });

    // Common Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
