<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
  
    return view('welcome');
});


Route ::get('/contacts',[ContactController::class ,'index'])->name('contacts.index');

Route::get('/contacts/create',[ContactController::class,'create'])->name('contacts.create');

Route::get('/contacts/{id}',[ContactController::class,'show'])->name('contacts.show');
//where('id','[0-9]+1'); //set only numbers //if you input /contacts/john  you get an error.


Route::get('/companies/{name?}', function($name=null){
    if($name){
        return "company" . $name;
    }else {
        return "All companies";
    }
})->whereAlpha('name');
//('name','[a-zA-Z]+'); //set only letters


Route::get('/bars/{name?}', function($name=null){
    if($name){
        return "company" . $name;
    }else {
        return "All companies";
    }
})->whereAlphaNumeric('name');

//if you put the not existing routes
Route::fallback(function(){
    return"<h1> Sorry,the page doesn't exist </h1>";
});