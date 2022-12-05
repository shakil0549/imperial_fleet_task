<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpaceshipController;
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

Route::get('/add',[SpaceshipController::class,'add']);
Route::post('/add_spaceship',[SpaceshipController::class,'add_spaceship']);


Route::get('/spaceship_detail/{id}',[SpaceshipController::class,'spaceship_detail']);
Route::get('/list_spaceship',[SpaceshipController::class,'list_spaceship']);
Route::get('/edit_spaceship/{id}',[SpaceshipController::class,'edit_spaceship']);
Route::post('/update_spaceship',[SpaceshipController::class,'update_spaceship']);
Route::get('/delete_spaceship/{id}',[SpaceshipController::class,'delete_spaceship']);

