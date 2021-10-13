<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Score;

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
    Route::get('/', Dashboard::class);
    Route::get('/score/{grado}/{seccion}/{asignatura}', Score::class);
});


Route::get('/district', function () {

    $district = User::find(18);

   dd($district->teacher->district->city->state);
});


require __DIR__.'/auth.php';
