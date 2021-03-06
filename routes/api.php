<?php

use App\Http\Controllers\VideoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Resources\VideoCollection;
use App\Http\Resources\UserCollection;
use App\Http\Resources\VideoResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Video;
use App\Models\User;


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

Route::middleware(['auth:sanctum'])->group(function () {
    //Visualitzar tots els videos.
    Route::get('/videos', function () {
        return new VideoCollection(Video::all());
    });

    //Visualitzar videos per id
    Route::get('/videos/{id}', function ($id) {
        return new VideoResource(Video::find($id));
    });

    //Buscar videos pel titol
    Route::get('/video/{titol}', [VideoController::class, 'title']);

    //Buscar videos tipo Serie
    Route::get('/series', [VideoController::class, 'serie']);

    //Buscar videos tipo movie
    Route::get('/movies', [VideoController::class, 'movie']);
});



//Middleware Admin
Route::group(['middleware' => ['auth:sanctum', 'isAdmin']], function () {
    //Route::middleware(['auth:sanctum', 'isAdmin'])->group(function () {
    //Afegir videos
    Route::post('/video', [VideoController::class, 'store']);
    //Eliminar videos
    Route::delete('/video/delete/{id}', [VideoController::class, 'delete']);
    //Modificar videos
    Route::put('/video/{id}', [VideoController::class, 'update']);

    //USUARIS
    //Visualitzar tots els usuaris
    Route::get('/users', function () {
        return new UserCollection(User::all());
    });
    ///Eliminar User
    Route::delete('/user/delete/{id}', [UserController::class, 'delete']);

    //Modificar videos
    Route::put('/user/{id}', [UserController::class, 'update']);
});


//NO FUNCIONA
//Buscar videos per genere
Route::get('/genere/{genere}', [VideoController::class, 'genere']);



// ======== USUARIOS ========

Route::post('login', [LoginController::class, 'doLoginAPI']);

Route::post('signin', [UserController::class, 'signup']);
