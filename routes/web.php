<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// Ejercicio 1

Route::get('/ejercicio1', function () {
    return "GET OK";
});

Route::post('/ejercicio1', function () {
    return "POST OK";
});

Route::post('/ejercicio2/a',function(Request $request){
    return Response::json($request);
});

Route::post('/ejercicio2/b',function(Request $request){
    if($request["price"]<0){
        return Response::json(["message"=>"Price can't be less than 0"]);
    }  
});

Route::post('/ejercicio2/c',function(Request $request){
    $discount=$request->query('discount');
    if($discount=='SAVE5'){
        $request["price"]=$request["price"]*0.95;
        $request["discount"]=5;
        return Response::json($request);
    }else if($discount=='SAVE10'){
        $request["price"]=$request["price"]*0.90;
        $request["discount"]=10;
        return Response::json($request);
    }else if($discount=='SAVE15'){
        $request["price"]=$request["price"]*0.85;
        $request["discount"]=15;
        return Response::json($request);
    }else{
        $request["discount"]=0;
        return Response::json($request);
    }
});