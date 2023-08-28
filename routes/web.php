<?php

use App\Http\Controllers\AnswerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\TopicController;
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

    Route::get('admin', function () {
        return view('admin');
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
