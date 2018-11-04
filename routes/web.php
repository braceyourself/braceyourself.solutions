<?php


//Route::get('/', function() {
//	return view('home');
//});




Route::get('/{vue?}', function() {
	return view('layouts.app');
})->where('vue', '[\/\w\.-]*');
