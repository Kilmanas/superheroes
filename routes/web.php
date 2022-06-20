<?php

use App\Http\Controllers\SuperheroController;
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
    return redirect(route('superhero.index'));
});
Route::resource('superhero', SuperheroController::class);
Route::get('superhero/?search=', [SuperheroController::class, 'search'])->name('superhero.search');
