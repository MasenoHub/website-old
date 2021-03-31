<?php

use App\Http\Controllers\{
    EventController,
    PostController,
    ProjectController,
    QuestionController
};
use App\Models\{
    Answer,
    Event,
    Post,
    Project,
    Question,
    User
};
use Illuminate\Support\Facades\Auth;
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

Route::middleware(['auth:sanctum', 'verified'])
    ->get('/dashboard', fn () => view('dashboard'))
    ->name('dashboard');

Route::prefix('events')->name('events.')->group(function () {
    Route::get('', [EventController::class, 'index'])
        ->name('index');

    Route::get('/{event}', [EventController::class, 'show'])
        ->name('show')
        ->whereNumber('event');
});

Route::prefix('projects')->name('projects.')->group(function () {
    Route::get('', [ProjectController::class, 'index'])->name('index');

    Route::get('/{project}', [ProjectController::class, 'show'])
        ->name('show')
        ->whereNumber('project');
});

Route::prefix('questions')->name('questions.')->group(function () {
    Route::get('', [QuestionController::class, 'index'])->name('index');

    Route::middleware(['auth:sanctum', 'verified'])
        ->get('/new', [QuestionController::class, 'new'])
        ->name('new');

    Route::middleware(['auth:sanctum', 'verified'])
        ->post('/new', [QuestionController::class, 'create']);

    Route::get('/{question}', [QuestionController::class, 'show'])
        ->name('show')
        ->whereNumber('project');
});

Route::prefix('posts')->name('posts.')->group(function () {
    Route::get('', [PostController::class, 'index'])->name('index');

    Route::get('/{post}', [PostController::class, 'show'])
        ->name('show')
        ->whereNumber('post');
});

Route::prefix('users')->name('users.')->group(function () {
    Route::get('/{id}', fn ($id) => view('users.show', ['user' => User::find($id)]))
        ->name('show');
});

Route::middleware(['auth:sanctum', 'verified'])
    ->get('/me', fn () => redirect(route('users.show', ['id' => Auth::id()])));

Route::get('/about', fn () => view('about'))->name('about');

// Administrative routes
Route::middleware([
    'auth:sanctum',
    'verified',
    'password.confirm',
    'can:administrate'
])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('', fn () => view('admin.index', [
            'users'     => User::count(),
            'events'    => Event::count(),
            'projects'  => Project::count(),
            'questions' => Question::count(),
            'answers'   => Answer::count(),
            'posts'     => Post::count()
        ]))->name('index');

        Route::prefix('users')->name('users.')->group(function () {
            Route::get('', fn () => view('admin.users.index'))->name('index');
        });

        Route::prefix('events')->name('events.')->group(function () {
            Route::get('', fn () => view('admin.events.index'))->name('index');
        });

        Route::prefix('projects')->name('projects.')->group(function () {
            Route::get('', fn () => view('admin.projects.index'))->name('index');
        });

        Route::prefix('questions')->name('questions.')->group(function () {
            Route::get('', fn () => view('admin.questions.index'))->name('index');
        });

        Route::prefix('posts')->name('posts.')->group(function () {
            Route::get('', fn () => view('admin.posts.index'))->name('index');
        });
    });
