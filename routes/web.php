<?php

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
Route::get('/clear', function () {

    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');

    return "Cleared!";

});
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('users','App\Http\Controllers\UserController');

Route::resource('tournament','App\Http\Controllers\TournamentController');
Route::get('tournament/result/{tournament_id}', [App\Http\Controllers\TournamentController::class, 'result'])->name('tournament.result');
Route::resource('tournamentplayers','App\Http\Controllers\TournamentPlayersController');

Route::resource('season','App\Http\Controllers\SeasonController');

Route::resource('players','App\Http\Controllers\PlayerController');

