<?php

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


Route ::get('/contacts',function(){
    return"<h1>All contacts</h1>";
});

Route::get('/contacts/create',function(){
    return "<h1>add new contact </h1>";
});

Route::get('/contacts/{id}',function($id){
    return "Contact".$id;
})->whereNumber('id');
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