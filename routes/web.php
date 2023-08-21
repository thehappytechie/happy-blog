<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/', function () {
        return view('welcome');
    });

    Route::controller(PageController::class)->group(function () {
        Route::get('home', 'home')
            ->name('home');
    });

    Route::get('dashboard', \App\Http\Livewire\Dashboard::class)->name('dashboard');

    Route::get('posts/create', \App\Http\Livewire\Post\Create::class)->name('post.create');

    Route::get('posts/{post}/edit', \App\Http\Livewire\Post\Edit::class)->name('post.edit');

    Route::get('posts/show/{post}', \App\Http\Livewire\Post\Show::class)->name('post.show');

    Route::get('posts/index', \App\Http\Livewire\Post\Index::class)->name('post.index');

    Route::get('tags/index', \App\Http\Livewire\Tag\Index::class)->name('tag.index');

    Route::get('blogs/index', \App\Http\Livewire\Blog\Index::class)->name('blog.index');

    Route::get('users/index', \App\Http\Livewire\User\Index::class)->name('user.index');

    Route::get('user/update-password', \App\Http\Livewire\User\UpdatePassword::class)->name('user.update.password');

    Route::get('user/{user}/update-profile', \App\Http\Livewire\User\UpdateProfile::class)->name('user.update.profile');

    Route::get('tags/index', \App\Http\Livewire\Tag\Index::class)->name('tag.index');

    Route::get('category/index', \App\Http\Livewire\Category\Index::class)->name('category.index');
});
