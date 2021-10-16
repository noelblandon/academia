<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Score\Score;
use App\Http\Livewire\Score\SetScore;


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
/*
Route::get('/', function () {
    return view('index');
})->middleware(['auth']);*/
/*
Route::group(['auth'],function(){
    Route::get('/', Dashboard::class);

    Route::domain('{account}.example.com')->group(function () {
    Route::get('user/{id}', function ($account, $id) {
        //
    });
});
});
*/

Route::middleware(['auth'])->group(function () {
    Route::get('/', Score::class);
    Route::get('/score/{grado}/{seccion}/{asignatura}', SetScore::class);

    Route::post('/logout',function(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    })->name('logout');
});


Route::get('/admin',function(){
    return view('layouts.main');
});


require __DIR__.'/auth.php';
