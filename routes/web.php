<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', fn() => view('welcome'));
// Route::get('/register', function () {

//     if (\Auth::check()) {
//         return redirect()->route('dashboard');
//     } else {
//         return view('register');
//     }
// })->name('register');
// Route::post('/register', [UserController::class, 'register'])->name('register_user');
Route::get('/login', function () {

    if (\Auth::check()) {
        return redirect()->route('dashboard');
    } else {
        return view('login');
    }
})->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login_user');

Route::group(['middleware' => ['auth']], function () {
    // Route::get('/editor', fn() => view('editor'))->name('editor_page');
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');
    // Route::post('/submitCode', [UserController::class, 'submitCode'])->name('submitCode');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
});

Route::get('/preview', fn() => view('preview_output'));
