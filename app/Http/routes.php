<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
    
//     return view('welcome');
// });

Route::get('/','TimelinesController@index');

Route::auth();

Route::resource('villages','VillagesController');
Route::resource('Videos','VideosController');
Route::resource('video-stacks','VideoStacksController');
Route::resource('self-help-groups','SelfHelpGroupsController');
Route::resource('shg-coordinators','SHGCoordinatorsController');
Route::resource('phones','PhonesController');
Route::resource('phone-logs','PhoneLogsController');
Route::resource('members','MembersController');
Route::resource('videos','VideosController');
Route::resource('timelines','TimelinesController');

Route::get('/home', 'HomeController@index');

Route::resource('feedbacks','FeedbacksController');

Route::get('/feedbacks/create/ajax-videos','FeedbacksController@ajax_videos');