<?php

use App\Http\Controllers\WorkerController;

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

Route::get('/workers', [WorkerController::class, 'index'])->name('worker.index');

Route::get('/worker/show/{worker}', [WorkerController::class, 'show'])->name('worker.show');

Route::get('/worker/create', [WorkerController::class, 'create'])->name('worker.create');
Route::post('/worker', [WorkerController::class, 'store'])->name('worker.store');

Route::get('/worker/edit/{worker}', [WorkerController::class, 'edit'])->name('worker.edit');
Route::patch('/worker/{worker}', [WorkerController::class, 'update'])->name('worker.update');

Route::delete('/worker/{worker}', [WorkerController::class, 'delete'])->name('worker.delete');