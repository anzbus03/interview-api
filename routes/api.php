<?php
use App\Http\Controllers\RoutesAll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::resource('profile', ProfileController::class);
Route::get('/profile/search/{name}', [ProfileController::class, 'search']);
Route::get('/routes/search/{no}', [RoutesAll::class, 'show']);
// Route::get('/profile', [ProfileController::class, 'index']);
// Route::post('/profile', [ProfileController::class. 'store']);
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
