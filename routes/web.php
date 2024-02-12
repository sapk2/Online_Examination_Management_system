<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ExamNoticeController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\SubjectController;

use Illuminate\Routing\Route as RoutingRoute;
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



Route::get('/', [HomeController::class, 'index'])->name('home');


Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        /* SUbject route*/
        Route::get('/subject', [SubjectController::class, 'index'])->name('subject.index');
        Route::get('/create-subject', [SubjectController::class, 'create'])->name('subject.create');
        Route::post('/subject/store', [SubjectController::class, 'store'])->name('subject.store');
        Route::get('/subject/{id}/edit', [SubjectController::class, 'edit'])->name('subject.edit');
        Route::get('/subject/{id}/update', [SubjectController::class, 'update'])->name('subject.update');
        Route::get('/subject/{id}/delete', [SubjectController::class, 'delete'])->name('subject.delete');
        /*Question*/
        Route::get('/questions', [QuestionController::class, 'index'])->name('questions.index');
        Route::get('/create-question', [QuestionController::class, 'create'])->name('questions.create');
        Route::post('/question/store', [QuestionController::class, 'store'])->name('questions.store');
        Route::get('/question/{id}/edit', [QuestionController::class, 'edit'])->name('questions.edit');
        Route::post('/question/{id}/update', [QuestionController::class, 'update'])->name('questions.update');
        Route::post('/question/{id}/delete', [QuestionController::class, 'delete'])->name('questions.delete');


        /*Faculty */
        Route::get('/faculty', [FacultyController::class, 'index'])->name('faculties.index');
        Route::get('/create-faculty', [FacultyController::class, 'create'])->name('faculties.create');
        Route::post('/factuly/store', [FacultyController::class, 'store'])->name('faculties.store');
        Route::get('/faculty/{id}/edit', [FacultyController::class, 'edit'])->name('faculties.edit');
        Route::post('/faculty/{id}/update', [FacultyController::class, 'update'])->name('faculties.update');
        Route::get('/faculty/{id}/delete', [FacultyController::class, 'delete'])->name('faculties.delete');

        /*Exam */
        Route::get('/exam', [ExamController::class, 'index'])->name('exams.index');
        Route::get('/create-exam', [ExamController::class, 'create'])->name('exams.create');
        Route::post('/exam/store', [ExamController::class, 'store'])->name('exams.store');
        Route::get('/exam/{id}/edit', [ExamController::class, 'edit'])->name('exams.edit');
        Route::post('/exam/{id}/update', [ExamController::class, 'update'])->name('exams.update');
        Route::get('/exam/{id}/delete', [ExamController::class, 'delete'])->name('exams.delete');


        /*examination Notice */
        Route::get('/examnotices', [ExamNoticeController::class, 'index'])->name('examnotices.index');
        Route::get('/examnotices-create', [ExamNoticeController::class, 'create'])->name('examnotices.create');
        Route::post('/examnotices/store', [ExamNoticeController::class, 'store'])->name('examnotices.store');
        Route::get('/examnotices/{id}/edit', [ExamNoticeController::class, 'edit'])->name('examnotices.edit');
        Route::post('/examnotices/{id}/update', [ExamNoticeController::class, 'update'])->name('examnotices.update');
        Route::get('/examnotices/{id}/delete', [ExamNoticeController::class, 'delete'])->name('examnotices.delete');
        /*Manage_user*/
        Route::get('/manageusers', [UserController::class, 'index'])->name('manageusers.index');
        Route::get('/manageusers/{user}/edit', [UserController::class, 'edit'])->name('manageusers.edit');
        Route::post('/manageusers/{user}/update', [UserController::class, 'update'])->name('manageusers.update');
        Route::get('/manageusers/{user}/delete', [UserController::class, 'delete'])->name('manageusers.delete');

        /*result*/
        Route::get('/results', [ResultController::class, 'index'])->name('results.index');
        Route::get('/create-results', [ResultController::class, 'create'])->name('results.create');
        Route::post('/results/store', [ResultController::class, 'store'])->name('results.store');
        Route::get('/results/{id}/edit', [ResultController::class, 'edit'])->name('results.edit');
        Route::post('/results/{id}/update', [ResultController::class, 'update'])->name('results.update');
        Route::get('/results/{id}/delete', [ResultController::class, 'delete'])->name('results.delete');

        // Profile

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});

Route::group(['middleware' => ['auth', 'user']], function () {
    Route::prefix('user')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'userIndex'])->name('dashboard');


        // Profile
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
       
    });
});
require __DIR__ . '/auth.php';
