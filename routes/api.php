<?php

use App\Http\Controllers\videoController;
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
});

//Visualitzar videos per id
Route::get('/videos/{id}', function ($id) {
    return new VideoResource(Video::find($id));
});

//Afegir videos
Route::post('/video', [videoController::class, 'store']);
//Eliminar videos
Route::delete('/video/delete/{id}', [videoController::class, 'delete']);
//Modificar videos
Route::put('/video/{id}', [videoController::class, 'update']);
//Buscar videos per genere
Route::get('/videos/{genere}', function ($genere){
    return new VideoResource(Video::find($genere));
});
//Buscar videos pel titol

//Buscar videos pelicules

//Buscar videos series


// ======== USUARIOS ========



