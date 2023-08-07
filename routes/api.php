<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\WordController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\InteractionsController;
use App\Http\Controllers\PronounsController;
use App\Http\Controllers\PageController;

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::prefix('positions')->group(function (){
   Route::get('/',[PositionController::class,'index']);
});
Route::prefix('words')->group(function (){
    Route::get('/',[WordController::class,'index']);
});
Route::prefix('story')->group(function (){
    Route::get('/',[StoryController::class,'index']);
    Route::delete('/{id}',[StoryController::class,'delete']);
    Route::post('/',[StoryController::class,'create']);
    Route::put('/',[StoryController::class,'update']);
});
Route::prefix('page')->group(function (){
    Route::get('/',[PageController::class,'index']);
    Route::delete('/{id}',[PageController::class,'delete']);
    Route::post('/',[PageController::class,'create']);
    Route::put('/',[PageController::class,'update']);
});
Route::prefix('interactions')->group(function (){
    Route::get('/',[InteractionsController::class,'index']);
});
Route::prefix('pronouns')->group(function (){
    Route::get('/',[PronounsController::class,'index']);
});
