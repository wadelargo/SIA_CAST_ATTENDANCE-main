<?php
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\StudentController;
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

// Home
Route::get('/', [SiteController::class, 'home'])->name('home');

// Event Routes
Route::get('/event', [EventController::class, 'event'])->name('event.index');
Route::get('/event/create', [EventController::class, 'create'])->name('event.create');
Route::post('/event/create', [EventController::class, 'store'])->name('event.store');
Route::get('/event/{event}', [EventController::class, 'edit'])->name('event.edit');
Route::put('/event/{event}', [EventController::class, 'update'])->name('event.update');
Route::delete('/event/{event}', [EventController::class, 'delete'])->name('event.delete');

// Student Routes
Route::get('/student', [StudentController::class, 'student'])->name('student.index');
Route::get('/student/create', [StudentController::class, 'create'])->name('student.create');
Route::post('/student/create', [StudentController::class, 'store'])->name('student.store');
Route::get('/student/{student}', [StudentController::class, 'edit'])->name('student.edit');
Route::put('/student/{student}', [StudentController::class, 'update'])->name('student.update');
Route::delete('/student/{student}', [StudentController::class, 'delete'])->name('student.delete');
Route::get('/students/pdf', [StudentController::class, 'pdf'])->name('students.pdf');

// Attendance Routes
Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance.index');
Route::get('/attendance/create', [AttendanceController::class, 'create'])->name('attendance.create');
Route::post('/attendance/create', [AttendanceController::class, 'store'])->name('attendance.store');


Route::get('attendance/export-csv', [AttendanceController::class, 'exportCsv'])->name('attendance.csv');
Route::get('attendance/import-csv', [AttendanceController::class, 'importCsvForm'])->name('attendance.import');
Route::post('attendance/import-csv', [AttendanceController::class, 'importCsv']);


Route::get('/attendance/{attendance}', [AttendanceController::class,'edit']);
Route::put('attendance/{attendance}', [AttendanceController::class,'update']);
Route::delete('/attendance/{attendance}', [AttendanceController::class,'delete']);

Route::get('/scanner', function () {
    return view('pages.scanner');
})->name('scanner');


