<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\PageController;
use App\Http\Middleware\CheckParentRecordStory;
use App\Http\Middleware\CheckParentRecordImage;
use App\Http\Controllers\TextController;
use App\Http\Controllers\AudioController;

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

Route::prefix('story')->group(function (){
    Route::get('/',[StoryController::class,'index']);
    Route::get('/find/{id}',[StoryController::class,'findById']);
    Route::delete('/{id}',[StoryController::class,'delete']);
    Route::post('/',[StoryController::class,'create'])->middleware([CheckParentRecordImage::class]);
    Route::put('/',[StoryController::class,'update']);
});
Route::prefix('page')->group(function (){
    Route::get('/',[PageController::class,'index']);
    Route::get('/find/{id}',[PageController::class,'findById']);
    Route::delete('/{id}',[PageController::class,'delete']);
    Route::post('/',[PageController::class,'create'])->middleware([CheckParentRecordStory::class,CheckParentRecordImage::class]);
    Route::put('/',[PageController::class,'update']);
});
Route::prefix('text')->group(function (){
    Route::get('/',[TextController::class,'index']);
    Route::get('/find/{id}',[TextController::class,'findById']);
    Route::delete('/{id}',[TextController::class,'delete']);
    Route::post('/',[TextController::class,'create']);
    Route::put('/',[TextController::class,'update']);
});
Route::prefix('audio')->group(function (){
    Route::get('/',[AudioController::class,'index']);
    Route::get('/find/{id}',[AudioController::class,'findById']);
    Route::delete('/{id}',[AudioController::class,'delete']);
    Route::post('/',[AudioController::class,'create']);
    Route::put('/',[AudioController::class,'update']);
});
