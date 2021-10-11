<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrivilegeController;
use App\Http\Controllers\UserController;
use App\Http\Resources\PrivilegeResource;
use App\Http\Resources\UserResource;

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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::post('/login', function (Request $request) {
    //print_r(UserController::login($request));
    //return UserResource::single(UserController::show(UserController::login($request)['id']));
return UserResource::single( UserController::login($request));
});

Route::get('/users', function () {
    return UserResource::collection( UserController::index());
});

Route::get('/users/{id}', function ($id) {
    return UserResource::single(UserController::show($id));
});

Route::post('/users', function (Request $request) {
    return UserResource::single( UserController::store($request));
})->middleware('privilege.control');

Route::put('/users/edit', function (Request $request) {
    return UserResource::edit( UserController::edit($request));
})->middleware('privilege.control');

Route::put('/users/{id}/delete/', function ($id) {
    return UserResource::destroy( UserController::destroy($id));
})->middleware('privilege.control');

Route::get('/privileges', function () {
    return PrivilegeResource::collection( PrivilegeController::index());
});

Route::get('/privileges/{id}', function ($id) {
    return PrivilegeResource::single(PrivilegeController::show($id));
});

Route::post('/privileges', function (Request $request) {
    return PrivilegeResource::single( PrivilegeController::store($request));
})->middleware('privilege.control');

Route::put('/privileges/edit', function (Request $request) {
    return PrivilegeResource::edit( PrivilegeController::edit($request));
})->middleware('privilege.control');

Route::put('/privileges/{id}/delete/', function ($id) {
    return PrivilegeResource::destroy( PrivilegeController::destroy($id));
})->middleware('privilege.control');
