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

Route::get('/', function ()
{
    \App\Actions\FillTable::run();
    return view('welcome', [
        'items' => \App\Actions\GetItems::run()
    ]);
})->name('home');

//Route::get('/seed-table', function (){
//    \App\Actions\FillTable::run();
//    return redirect(\route('home'));
//})->name('seed-table');