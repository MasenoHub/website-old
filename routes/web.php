<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\QuestionController;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/events', [EventController::class, 'index'])->name('events.index');

Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show')->whereNumber('event');

Route::get('/projects', [ProjectController::class, 'show'])->name('projects');

Route::get('/questions', [QuestionController::class, 'show'])->name('questions');
