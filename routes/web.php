<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
//customer
Route::group(['prefix' => "customer"] , function () {
    Route::get('register','CustomerController@register')->name('customer#register');
    Route::post('register', 'CustomerController@create')->name('customer#create');
    Route::get('list' , 'CustomerController@list')->name('customer#list');
    Route::get('seeMore/{id}' , 'CustomerController@seeMore')->name('customer#seeMore');
    Route::get('delete/{id}' , 'CustomerController@delete')->name('customer#delete');
    Route::get('edit/{id}' , 'CustomerController@edit')->name('customer#edit');
    Route::post('edit/{id}' , 'CustomerController@update')->name('customer#update');
    Route::get('comfirm' , 'CustomerController@comfirm')->name('customer#comfirm') ;
    Route::get('realUpdate' , 'CustomerController@realUpdate')->name('customer#realUpdate') ;
});
