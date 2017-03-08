<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::group(['prefix' => 'reports'], function () {    
    Route::get('/', 'ReportController@index')->name('reports');
    Route::get('{id}', 'ReportController@report')->name('report')->where('id', '[0-9]+');
    Route::get('program/{name}', 'ReportController@program')->name('program');
    Route::get('reporter/{name}', 'ReportController@reporter')->name('reporter');
});

Route::get('/redirect', 'ReportController@redirect')->name('redirect');

Route::group(['prefix' => 'bounty-programs'], function () {   
    Route::get('/', 'BountyProgramController@index')->name('bounty_programs');
    Route::get('{id}', 'BountyProgramController@program')->name('program')->where('id', '[0-9]+');
});
