<?php

Route::view('/','home');
Route::get('feed','VacancyController@feed');
Route::get('categories','CategoryController@index');
Route::view('/{any}','home');
Route::view('/{any}/{any1}','home');

