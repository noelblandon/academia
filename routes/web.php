<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Score\Score;
use App\Http\Livewire\Score\SetScore;
use App\Http\Livewire\Tutor\Tutor;
use App\Http\Livewire\Tutor\Average;


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
    Route::get('/tutor', Tutor::class);
    Route::get('/tutor/promedio/{grado}/{seccion}', Average::class);

    Route::post('/logout',function(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    })->name('logout');
});




Route::any('/test',function(){

    //Checking internet connection status with predefined function
    switch (connection_status()){
        case CONNECTION_NORMAL:
        $msg = 'You are connected to internet.';
        break;
        case CONNECTION_ABORTED:
        $msg = 'No Internet connection';
        break;
        case CONNECTION_TIMEOUT:
        $msg = 'Connection time-out';
        break;
        case (CONNECTION_ABORTED & CONNECTION_TIMEOUT):
        $msg = 'No Internet and Connection time-out';
        break;
        default:
        $msg = 'Undefined state';
        break;
    }
//display connection status
echo $msg;
/*$response = null;
system("ping -c 1 google.com", $response);
if($response == 0)
{
    // this means you are connected
}
 
 */
});




require __DIR__.'/auth.php';
