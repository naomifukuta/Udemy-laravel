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
    $html = "
    <h1>Contact App</h1>
    <div>
        <a href='". route('admin.contacts.index')."'>All contacts</a>
        <a href='". route('admin.contacts.create')."'>add contacts</a>
        <a href='". route('admin.contacts.show',1)."'>Show contact</a>
    </div>
    ";
    return $html;
});
Route::prefix('admin')->name('admin.')->group(function(){


Route ::get('/contacts',function(){
    return"<h1>All contacts</h1>";
})->name('contacts.index');

Route::get('/contacts/create',function(){
    return "<h1>add new contact </h1>";
})->name('contacts.create');

Route::get('/contacts/{id}',function($id){
    return "Contact".$id;
})->name('contacts.show');
//where('id','[0-9]+1'); //set only numbers //if you input /contacts/john  you get an error.
});


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