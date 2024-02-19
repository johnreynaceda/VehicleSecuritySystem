<?php

use App\Http\Controllers\ProfileController;
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
});

Route::get('/dashboard', function () {

    // if (auth()->user()->user_type == 'staff') {
    //     dd('staff');
    // }else{
    //     return redirect()->route('user.dashboard');
    // }
        if (auth()->user()->user_type == 'admin') {
          return redirect()->route('admin.dashboard');
        }elseif (auth()->user()->user_type == 'guard') {
            return redirect()->route('guard.dashboard');
        }else{
            return redirect()->route('user.dashboard');
        }

})->middleware(['auth', 'verified'])->name('dashboard');


//admin routes
Route::prefix('admin')->group(
    function(){
        Route::get('/dashboard', function(){
            return view('admin.index');
        })->name('admin.dashboard');
    }
);

//guard routes
Route::prefix('guard')->group(
    function(){
        Route::get('/dashboard', function(){
            return view('guard.index');
        })->name('guard.dashboard');
    }
);

//user route
Route::prefix('user')->group(
    function(){
        Route::get('/dashboard', function(){
            return view('user.index');
        })->name('user.dashboard');
    }
);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
