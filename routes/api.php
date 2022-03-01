<?php

use App\Http\Controllers\VideoController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Resources\VideoCollection;
use App\Http\Resources\VideoResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Video;
use App\Models\VideosGenere;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// ======== VIDEOS ========

//Visualitzar tots els videos.
Route::get('/videos', function () {
    return new VideoCollection(Video::all());
})->middleware('auth:sanctum');

//Visualitzar videos per id
Route::get('/videos/{id}', function ($id) {
    return new VideoResource(Video::find($id));
});

//Afegir videos
Route::post('/video', [VideoController::class, 'store']);
//Eliminar videos
Route::delete('/video/delete/{id}', [VideoController::class, 'delete']);
//Modificar videos
Route::put('/video/{id}', [VideoController::class, 'update']);

//NO FUNCIONA
//Buscar videos per genere
Route::get('/videos/genere/{idGenere}',[VideoController::class, 'genere']);

//Buscar videos pel titol
Route::get('/video/{titol}',[VideoController::class, 'title']);


//Buscar videos tipo Serie
Route::get('/series',[VideoController::class, 'serie']);

//Buscar videos tipo movie
Route::get('/movies',[VideoController::class, 'movie']);


// ======== USUARIOS ========

Route::post('login', [LoginController::class, 'doLoginAPI']);


// ======== ADMIN ========