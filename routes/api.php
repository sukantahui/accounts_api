<?php

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
//testing purpose-------------
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', 'AuthController@register');

Route::post('/login', 'AuthController@login');
Route::get('/me', 'AuthController@me');
Route::group(array('prefix' => 'dev'), function() {
    Route::get('/incomeLedgers', 'LedgerController@getIncomes');
    Route::get('/expenditureLedgers', 'LedgerController@getExpenditures');

    Route::get('/assets', 'AssetController@index');
});







//secured links here
Route::group(['middleware' => ['jwt.auth']], function() {
    Route::get('logout', 'AuthController@logout');

    Route::get('/incomeLedgers', 'LedgerController@getIncomes');
    Route::get('/expenditureLedgers', 'LedgerController@getExpenditures');
    Route::get('/assets', 'AssetController@index');

    Route::get('test', function(){
        return response()->json(['foo'=>'bar']);
    });
});
