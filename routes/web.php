<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;



//Route::get('/', function() {
//	return view('home');
//});
$resources = [
	'contact'
];

foreach($resources as $r){
	$controller = studly_case($r)."Controller";

	Route::resource($r, $controller);

}



Route::get('/{vue?}', function() {
	return view('layouts.app');
})->where('vue', '[\/\w\.-]*');
