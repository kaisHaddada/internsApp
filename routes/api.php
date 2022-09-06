<?php

use App\Http\Controllers\Admin\InternController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::group([

    'middleware' => 'api',
    'prefix' => 'auth',
    'namespace' => 'App\Http\Controllers'

], function ($router) {
Route::post('logout', 'AuthController@logout');
});
Route::group([

    'middleware' => 'api',
    'prefix' => 'auth',
    'namespace' => 'App\Http\Controllers'

], function ($router) {
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');

    Route::post('refresh', 'AuthController@refresh');
    Route::post('userProfile', 'AuthController@userProfile');

});
Route::prefix('admin')->group(function () {

    Route::prefix('interns')->controller(InternController::class)->group(function () {
        Route::get('/listing', 'listing');
        Route::get('/getById', 'create');
        Route::post('/store', 'store');
        Route::put('/update/{intern_id}', 'update');
        Route::delete('/destroy/{inter_id}', 'delete');
    });
});
/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/
