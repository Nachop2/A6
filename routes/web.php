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

Route::get('/inicio', function () {
    return view('home');
});
Route::get('/error', function () {
    return view("error");
});

// Route::get('/fecha', function () {
//     return view('fecha', ['year' => date("Y"), 'month' => date("F"), 'day' => date("j")]);
// });


Route::get('/fecha', function () {
    $year = date("Y");
    $month = date("F");
    $day = date("j");
    return view('fecha')
    ->with('year',$year)
    ->with('month',$month)
    ->with('day',$day);
});

Route::get('/user/{name?}', function (?string $name = "Please input an username") {
    return $name;
});

Route::get('/age/{age?}', function (int $age = 18) {
    return "You are " . $age . " years old";
})->where('age', '[0-9]+');

Route::get('/combo/{text?}/{number?}', function (string $text = "Default text: ",int $number = 18) {
    return $text . $number;
})->where(['number' => '[0-9]+', 'text' => '[a-z]+']);

Route::match(array('GET', 'POST'), 'postTest/{text?}', function(?string $text = "The post has worked")
{
    return "You have inputed: " . $text;
});

Route::get('/host', function () {
    return env('DB_HOST');
});

Route::get('/time', function () {
    return config('app.timezone');
});