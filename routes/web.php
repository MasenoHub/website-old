<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\QuestionController;
use App\Models\Event;
use App\Models\Post;
use App\Models\Project;
use App\Models\Question;
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

Route::get('/', fn () => view('home', [
    'event' => Event::with(['organizer'])->where('start', '>', now())->latest()->first(),
    'stats' => [
        'events'    => Event::count(),
        'projects'  => Project::count(),
        'questions' => Question::count(),
        'posts'     => Post::count()
    ]
]))->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', fn () => view('dashboard'))->name('dashboard');

Route::get('/events', [EventController::class, 'index'])->name('events.index');

Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show')->whereNumber('event');

Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');

Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show')->whereNumber('project');

Route::get('/questions', [QuestionController::class, 'index'])->name('questions.index');

Route::middleware(['auth:sanctum', 'verified'])->get('/questions/new', [QuestionController::class, 'new'])->name('questions.new');

Route::middleware(['auth:sanctum', 'verified'])->post('/questions/new', [QuestionController::class, 'create']);

Route::get('/questions/{question}', [QuestionController::class, 'show'])->name('questions.show')->whereNumber('project');

Route::get('/about', fn () => view('about'))->name('about');