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

// Or maybe you have a landing page that explains the purpose of the site and links to the two features on two different pages
// So you’d maybe have `Route::get("/"….` (landing page), and `Route::get("/lorem-ipsum"….` and `Route::get("/random-user"….`
// And then a corresponding post route for lorem-ipsum and random-user.
// That’d be 5 routes total.

Route::get('/', 'HomeController@index')->name('index');

Route::get('/lorem-ipsum', 'LoremController@index')->name('lorem-ipsum.index');

Route::get('/random-user', 'RandomController@index')->name('random-user.index');

Route::post('/lorem-ipsum', 'LoremController@submit')->name('lorem-ipsum.submit');

Route::post('/random-user', 'RandomController@submit')->name('random-user.submit');

// Route::get('/debugbar', function() {
//
//     $data = Array('foo' => 'bar');
//     Debugbar::info($data);
//     Debugbar::info('Current environment: '.App::environment());
//     Debugbar::error('Error!');
//     Debugbar::warning('Watch out…');
//     Debugbar::addMessage('Another message', 'mylabel');
//
//     return 'Just demoing some of the features of Debugbar';
//
// });
// Route::get('/random', function() {
//
//     $random = new Rych\Random\Random();
//     return $random->getRandomString(8);
//
// });
//
// Route::get('random', function() {
//     $generator = new Badcow\LoremIpsum\Generator();
//     $paragraphs = $generator->getParagraphs(5);
//     return implode('<p>', $paragraphs);
// });
