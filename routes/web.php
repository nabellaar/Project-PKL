<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ReportController as AdminReportController;
use App\Http\Controllers\Admin\ResponseController as AdminResponseController;
use App\Http\Controllers\Admin\TopicController as AdminTopicController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AnswerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\TopicController;
use App\Http\Middleware\AdminMiddleware;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::resource('topic', TopicController::class);
    Route::get('/search', [DashboardController::class, 'searchTopic'])->name('search.topic');
    Route::resource('/likes', LikeController::class);
    Route::resource('/response', ResponseController::class);
    Route::resource('/answer', AnswerController::class);
    Route::resource('/report', ReportController::class);
    Route::get('/profile/{username}', [ProfileController::class , 'show']);
    Route::put('/profile/{id}', [ProfileController::class, 'update']);

    Route::prefix('/admin')->name('admin.')->middleware(AdminMiddleware::class)->group(function() {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::resource('/user', UserController::class);
        Route::get('/topic/multiDelete', [AdminTopicController::class, 'multiDelete'])->name('topic.multiDelete');
        Route::get('/topic-status/{id}', [AdminTopicController::class, 'status'])->name('topic.status');
        Route::resource('/topic', AdminTopicController::class);
        Route::resource('/response', AdminResponseController::class);
        Route::resource('/report', AdminReportController::class);
    });


    Route::get('/detail', function () {
        return view('pages.detail');
    });
    Route::get('/admin', function () {
        return view('admin');
    });

    Route::get('/dashboardAdmin', function () {
        return view('dashboardAdmin');
    });

    Route::get('/userAdmin', function () {
        return view('userAdmin');
    });

    Route::get('/topicAdmin', function () {
        return view('topicAdmin');
    });

    Route::get('/commentAdmin', function () {
        return view('commentAdmin');
    });
    
    Route::get('/my_answers', function () {
        // Tambahkan logika untuk menampilkan halaman My Answers di sini
        return view('pages.answers');
    });
    
    Route::get('/all_response', function () {
        // Tambahkan logika untuk menampilkan halaman response di sini
        return view('pages.response');
    });
    
    Route::get('/liked_topics', function () {
        return view('pages.liked');
    });

    Route::get('/profile', function () {
        return view('pages.profile');
    });

    Route::get('/create', function () {
        // Tambahkan logika untuk menampilkan halaman new topics di sini
        return view('create');
    });
    
    Route::post('/topics', 'TopicController@store');
});



// Route::middleware(['auth'])->group(function () {
//     Route::get('/', [IndexController::class, 'home'])->name('home');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

require __DIR__.'/auth.php';
