<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\IndexController as AdminIndexController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\BrandController as AdminBrandController;
use App\Http\Controllers\Admin\ModelController as AdminModelController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', [IndexController::class, 'index'])
Route::get('/', [IndexController::class, 'search'])
->name('index');

Route::get('/search', [IndexController::class, 'search'])
->name('search');

Route::get('/detail/{id}', [IndexController::class, 'detail'])
->where(['id' => '[0-9]+'])
->name('detail');

Auth::routes();

Route::prefix('/profile')->name('profile.')->middleware('auth')->group(function () {
    Route::get('/',  [ProfileController::class, 'index'])
    ->name('index');

    Route::post('/change/password',  [ProfileController::class, 'changePassword'])
    ->name('change.password');
});

Route::prefix('/admin')->name('admin.')->middleware('isAdmin')->group(function () {
    // Index
    Route::get('/', [AdminIndexController::class, 'index'])
    ->name('index');

    // Posts
    Route::get('/posts', [AdminPostController::class, 'index'])
    ->name('posts.index');

    Route::get('/posts/create', [AdminPostController::class, 'create'])
    ->name('posts.create');

    Route::post('/posts/store', [AdminPostController::class, 'store'])
    ->name('posts.store');

    Route::get('/posts/edit/{id}', [AdminPostController::class, 'edit'])
    ->where(['id' => '[0-9]+'])
    ->name('posts.edit');

    Route::put('/posts/update/{id}', [AdminPostController::class, 'update'])
    ->where(['id' => '[0-9]+'])
    ->name('posts.update');

    Route::delete('/posts/destroy/{id}', [AdminPostController::class, 'destroy'])
    ->where(['id' => '[0-9]+'])
    ->name('posts.destroy');

    // Users
    Route::get('/users', [AdminUserController::class, 'index'])
    ->name('users.index');

    // Route::get('/users/create', [AdminUserController::class, 'create'])
    // ->name('users.create');

    // Route::post('/users/store', [AdminUserController::class, 'store'])
    // ->name('users.store');

    Route::delete('/users/destroy/{id}', [AdminUserController::class, 'destroy'])
    ->where(['id' => '[0-9]+'])
    ->name('users.destroy');

    // Brands
    Route::get('/brands', [AdminBrandController::class, 'index'])
    ->name('brands.index');

    Route::get('/brands/create', [AdminBrandController::class, 'create'])
    ->name('brands.create');

    Route::post('/brands/store', [AdminBrandController::class, 'store'])
    ->name('brands.store');

    Route::get('/brands/edit/{id}', [AdminBrandController::class, 'edit'])
    ->where(['id' => '[0-9]+'])
    ->name('brands.edit');

    Route::put('/brands/update/{id}', [AdminBrandController::class, 'update'])
    ->where(['id' => '[0-9]+'])
    ->name('brands.update');

    Route::delete('/brands/destroy/{id}', [AdminBrandController::class, 'destroy'])
    ->where(['id' => '[0-9]+'])
    ->name('brands.destroy');

    // Models
    Route::get('/models', [AdminModelController::class, 'index'])
    ->name('models.index');

    Route::get('/models/create', [AdminModelController::class, 'create'])
    ->name('models.create');

    Route::post('/models/store', [AdminModelController::class, 'store'])
    ->name('models.store');

    Route::get('/models/edit/{id}', [AdminModelController::class, 'edit'])
    ->where(['id' => '[0-9]+'])
    ->name('models.edit');

    Route::put('/models/update/{id}', [AdminModelController::class, 'update'])
    ->where(['id' => '[0-9]+'])
    ->name('models.update');

    Route::delete('/models/destroy/{id}', [AdminModelController::class, 'destroy'])
    ->where(['id' => '[0-9]+'])
    ->name('models.destroy');
});

Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);

