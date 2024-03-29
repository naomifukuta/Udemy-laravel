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
function getContacts(){
    return[
        
            1 => ['name' => 'Name 1', 'phone' => '1234567890'],
            2 => ['name' => 'Name 2', 'phone' => '2345678901'],
            3 => ['name' => 'Name 3', 'phone' => '3456789012'],
        ];
    
}
Route::get('/', function () {
  
    return view('welcome');
});


Route ::get('/contacts',function(){
    $companies = [
        1 => ['name' => 'Company One', 'contacts' => '3'],
        2 => ['name' => 'Company two', 'contacts' => '5'],
    ];

    $contacts = getContacts();
    return view('contacts.index',compact('contacts','companies'));
})->name('contacts.index');

Route::get('/contacts/create',function(){
    return view('contacts.create');
})->name('contacts.create');

Route::get('/contacts/{id}',function($id){
    $contacts = getContacts();
    abort_unless(isset($contacts[$id]),404);
    $contact = $contacts[$id];
    return view('contacts.show')->with('contact',$contact);
    
})->name('contacts.show');
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