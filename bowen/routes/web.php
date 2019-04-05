<?php

Route::get('/', function () {
    return view('pages.index');
});


Route::get('/reg', function(){
    return view('pages.registration');
});


Route::post('/login', 'LoginController@login');
Route::get('/logout', 'LoginController@logout');


Route::get('/index', 'UnauthController@index');
Route::get('/comments', 'UnauthController@comments');
Route::post('/message', 'UnauthController@message');
Route::post('/registration', 'UnauthController@registration');
Route::get('/gallery', 'UnauthController@galleryPage');
Route::get('/about', 'UnauthController@aboutPage');


Route::get('/indexUser', 'UserController@indexPage')->middleware('userAuthorization');
Route::get('/userPage/{id}', 'UserController@userPage')->middleware('userAuthorization');
Route::get('/userComments/{id}', 'UserController@comments')->middleware('userAuthorization');
Route::get('/appointments', 'UserController@appointmentPage')->middleware('userAuthorization');
Route::post('/postComment', 'UserController@postComment')->middleware('userAuthorization');
Route::delete('/deleteComment/{id}', 'UserController@removeComment')->middleware('userAuthorization');
Route::post('/changeUserData', 'UserController@changeData')->middleware('userAuthorization');
Route::post('/changePassword', 'UserController@changePass')->middleware('userAuthorization');
Route::post('/bookAppointmentBowen', 'UserController@bookBowen')->middleware('userAuthorization');
Route::post('/sendMessage', 'UserController@userMessage')->middleware('userAuthorization');
Route::get('/galleryUser', 'UserController@galleryPage')->middleware('userAuthorization');


Route::get('/indexAdmin', 'AdminController@indexPage')->middleware(['adminAuthorization', 'ipCheck']);
Route::get('manageUsers', 'AdminController@users')->middleware('adminAuthorization');
Route::post('/updateAdmin/{id}', 'AdminController@updateAdmin')->middleware('adminAuthorization');
Route::delete('/deleteUser/{id}', 'AdminController@deleteUser')->middleware('adminAuthorization');
Route::get('/user/{id}', 'AdminController@getUser')->middleware('adminAuthorization');
Route::post('/updateUserAjax/{id}', 'AdminController@updateUser')->middleware('adminAuthorization');
Route::get('/manageAppointments', 'AdminController@manageAppPage')->middleware('adminAuthorization');
Route::post('/updateAppointment', 'AdminController@updateAppointment')->middleware('adminAuthorization');
Route::get('/deleteTermin', 'AdminController@deleteAppointment')->middleware('adminAuthorization');
Route::post('/insertAppointment', 'AdminController@insertAppointment')->middleware('adminAuthorization');
Route::get('//adminComments', 'AdminController@commentsPage')->middleware('adminAuthorization');
Route::delete('/deleteCommentAdmin/{id}', 'AdminController@removeComment')->middleware('adminAuthorization');
Route::get('/adminMessages', 'AdminController@messagesPage')->middleware('adminAuthorization');
Route::post('/answer', 'AdminController@answerAdmin')->middleware('adminAuthorization');
Route::get('/deleteMessage/{id}', 'AdminController@deleteMessages')->middleware('adminAuthorization');