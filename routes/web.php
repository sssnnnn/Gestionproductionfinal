<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Livewire\Clients\ListClients;
use App\Http\Livewire\Articles\ListArticles;
use App\Http\Livewire\Commandes\ListCommandes;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;


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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('commandes.index');
})->name('dashboard');

//Route::get('dashboard', DashboardController::class)->name('dashboard');
Route::get('dashboard', [App\Http\Controllers\CommandeController::class, 'index'])->name('home');

Route::get('clients', ListClients::class)->name('clients.list-clients');
Route::get('articles', ListArticles::class)->name('articles.list-articles');
Route::get('commandes', ListCommandes::class)->name('commandes.list-commandes');
Route::resource('commande',App\Http\Controllers\CommandeController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('user', 'UserController');
Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
Route::post('/profile', [UserController::class, 'postProfile'])->name('user.postProfile');

Route::resource('permission', PermissionController::class);
