<?php

use App\Http\Livewire\Addon;
use App\Http\Livewire\BookTable;
use App\Http\Livewire\Category;
use App\Http\Livewire\Item;
use App\Http\Livewire\Matrial;
use App\Http\Livewire\Unit;
use App\Http\Livewire\User;
use App\Http\Livewire\Role;
use App\Http\Livewire\Permission;
use App\Http\Livewire\Table;
use Illuminate\Support\Facades\Route;

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
})->name('home')->middleware('auth');

Route::get('material',Matrial::class)->name('material')->middleware('auth');
Route::get('units',Unit::class)->name('units')->middleware('auth');
Route::get('items',Item::class)->name('items')->middleware('auth');
Route::get('addons',Addon::class)->name('addons')->middleware('auth');
Route::get('categories',Category::class)->name('categories')->middleware('auth');
Route::get('tables',Table::class)->name('tables')->middleware('auth');
Route::get('booktables',BookTable::class)->name('booktables')->middleware('auth');

route::middleware(['auth'])->group(function(){

    Route::get('users',User::class)->name('users');
    
});
route::middleware(['auth', 'role:admin'])->group(function(){
    Route::get('roles',Role::class)->name('roles')->middleware('auth');
    Route::get('permissions',Permission::class)->name('permissions')->middleware('auth');
});

Route::get('login',function () {
    return view('login');
})->name('login');
