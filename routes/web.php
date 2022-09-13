<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TutorialController;

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

Route::get('/test', function () {
    return view('test');
});
Route::get('/layouts', function () {
    return view('layouts.app');
});
Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [PublicController::class, 'index'])->name('/');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/tutorial/{slug}', [PublicController::class, 'tutorialSingle'])->name('single.tutorial');


Auth::routes(['verify' => true]);


Route::middleware(['auth','verified'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');


    //CATEGORY ROUTES
    Route::get('/admin-category', [CategoryController::class, 'index'])->name('admin.category');
    Route::post('/create-category', [CategoryController::class, 'create'])->name('create.category');
    Route::post('/update-category/{category}', [CategoryController::class, 'update'])->name('update.category');
    Route::get('/delete-category/{category}', [CategoryController::class, 'delete'])->name('delete.category');
    Route::get('/active-category/{category}', [CategoryController::class, 'active'])->name('active.category');
    Route::get('/deactive-category/{category}', [CategoryController::class, 'deactive'])->name('deactive.category');
    Route::get('/deactive-category-list', [CategoryController::class, 'deactiveList'])->name('deactive.category.list');




    //TUTORIAL ROUTES
    Route::get('/list-tutorial', [TutorialController::class, 'index'])->name('index.tutorial');
    Route::get('/create-tutorial', [TutorialController::class, 'create'])->name('create.tutorial');
    Route::post('/store-tutorial', [TutorialController::class, 'store'])->name('store.tutorial');
    Route::get('/edit-tutorial/{tutorial}', [TutorialController::class, 'edit'])->name('edit.tutorial');
    Route::post('/update-tutorial/{tutorial}', [TutorialController::class, 'update'])->name('update.tutorial');
    Route::get('/delete-tutorial/{tutorial}', [TutorialController::class, 'delete'])->name('delete.tutorial');
    Route::get('/active-tutorial/{tutorial}', [TutorialController::class, 'active'])->name('active.tutorial');
    Route::get('/deactive-tutorial/{tutorial}', [TutorialController::class, 'deactive'])->name('deactive.tutorial');
    Route::get('/deactive-tutorial-list', [TutorialController::class, 'deactiveList'])->name('deactive.tutorial.list');
});

// logout

Route::get('/logout', [PublicController::class, 'logout'])->name('logout');