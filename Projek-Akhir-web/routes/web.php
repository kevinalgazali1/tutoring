<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TwilioController;
use App\Http\Controllers\ContentController;

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

// Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get("/", [HomeController::class, 'index']);


// routes admin
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get("/admin", [AdminController::class, 'index'])->name('admin.home');
    Route::get('admin/course', [AdminController::class, 'indexcourse'])->name('admin.course');
    Route::get('admin/course/create', [AdminController::class, 'create'])->name('admin.course.create');
    Route::post('admin/course/store', [AdminController::class, 'store'])->name('admin.course.store');
    Route::get('admin/course/edit', [AdminController::class, 'edit'])->name('admin.course.edit');
    Route::delete('admin/course/delete', [AdminController::class, 'destroy'])->name('admin.course.delete');
    Route::put('admin/course/update', [AdminController::class, 'update'])->name('admin.course.update');
    Route::put('admin/course/update-image/{id}', [AdminController::class, 'updateImage'])->name('admin.course.updateImage');
    Route::get("/admin/user", [AdminController::class, 'listUsers'])->name('admin.user');
    Route::delete('/admin/user/delete/{user}', [AdminController::class, 'deleteUser'])->name('admin.user.delete');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// routes siswa
Route::get("/siswa", [HomeController::class, 'siswa'])->name('siswa');
Route::get('siswa/catalog/{courseId}', [HomeController::class, 'indexsiswa'])->name('catalog');
Route::get('siswa/profile', [HomeController::class, 'siswaprofile'])->name('siswa.profile');
Route::post('/siswa/profile/update', [HomeController::class, 'siswaupdateProfile'])->name('siswa.profile.update');
Route::get('siswa/lesson/{course}', [HomeController::class, 'lesson'])->name('siswa.lesson');
Route::get('siswa/lesson/{course}/content/{content}', [SiswaController::class, 'showLessonContent'])->name('siswa.lesson.content');

// routes pengajar
Route::get("/pengajar", [HomeController::class, 'pengajar'])->name('pengajar');
Route::resource('/pengajar/course', CourseController::class);
Route::put('course/update-image/{id}', [CourseController::class, 'updateImage'])->name('course.updateImage');
Route::resource('/pengajar/content', ContentController::class);
Route::put('/pengajar/content/{content}', [ContentController::class, 'update'])->name('content.updateContent');
Route::get('pengajar/profile', [HomeController::class, 'pengajarprofile'])->name('pengajar.profile');
Route::post('/pengajar/profile/update', [HomeController::class, 'pengajarupdateProfile'])->name('pengajar.profile.update');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
