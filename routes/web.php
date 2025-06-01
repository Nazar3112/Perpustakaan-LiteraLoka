<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\ReturnController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\PerpustakaanController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return Auth::check() ? redirect('/index') : redirect('/signin');
});
Route::resource('index', PerpustakaanController::class);
Route::resource('books', BookController::class);
Route::resource('member', MemberController::class);
Route::resource('borrowings', BorrowingController::class);
Route::resource('returns', ReturnController::class);
Route::resource('categories', CategoryController::class);
Route::resource('history', HistoryController::class);
Route::get('histories', [HistoryController::class, 'index'])->name('histories.index');


Route::get('/signin', [AuthController::class, 'showLogin'])->name('login');
Route::post('/signin', [AuthController::class, 'login']);

Route::get('/signup', [AuthController::class, 'showRegister'])->name('register');
Route::post('/signup', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/index', [App\Http\Controllers\PerpustakaanController::class, 'index'])
    ->middleware('auth')
    ->name('index.index');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/signin'); // arahkan ke halaman login
})->name('logout');