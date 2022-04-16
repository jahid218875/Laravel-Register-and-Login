<?php

use App\Http\Controllers\LoginController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [LoginController::class, 'Register']);
Route::post('/register', [LoginController::class, 'RegisterSubmit']);
Route::get('/login', [LoginController::class, 'Login'])->name('login');
Route::post('/login', [LoginController::class, 'LoginSubmit']);
Route::get('/logout', [LoginController::class, 'Logout']);

Route::get('/verify-email/{email}/{token}', [LoginController::class, 'Verify']);


Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [LoginController::class, 'Home']);
    Route::get('/form', [LoginController::class, 'FormView']);
    Route::get('/datatable', [LoginController::class, 'Table']);
});
