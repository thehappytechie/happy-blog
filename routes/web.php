<?php

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

Route::get('posts/index', \App\Http\Livewire\Post\Index::class)->name('post.index');

