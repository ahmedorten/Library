<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

Route::get('/', 'MainController@index')->name('home');
Route::get('/login' , 'MainController@loginPage')->name('login');
Route::get('/logout', 'MainController@logout')->name('logout');
Route::post('/login', 'MainController@login')->name('userLogin');

Route::group(['middleware' => 'auth'],function(){
    Route::prefix('users')->group(function () {
        Route::get('', 'UserController@show')->name('allUsers');
        Route::get('profile/{user_id}', 'UserController@profile')->name('profile');
        Route::post('addUser', 'UserController@add_user')->name('adduser');
        Route::get('addUser', 'UserController@get_add_user')->name('getAddUser');
        Route::post('updateUser', 'UserController@update_user')->name('updateUser');
        Route::get('updateUser/{user_id}', 'UserController@get_update_user')->name('getUpdateUser');
        Route::get('Delete/{user_id}', 'UserController@destroy')->name('deleteUser');
    });

    Route::group(['prefix' => 'books'], function () {
        Route::get('/', 'BookController@index')->name('books');
        Route::get('/create', 'BookController@create')->name('createBook');
        Route::post('/store', 'BookController@store')->name('storeBook');
        Route::group(['prefix' => '{book}'], function () {
            Route::get('/', 'BookController@show')->name('showBook');
            Route::get('/edit', 'BookController@edit')->name('editBook');
            Route::post('/update', 'BookController@update')->name('updateBook');
            Route::get('/delete', 'BookController@destroy')->name('deleteBook');
        });
    });

    Route::group(['prefix' => 'employees'], function () {
        Route::get('/', 'EmployeeController@index')->name('employees');
        Route::get('/create', 'EmployeeController@create')->name('createEmployee');
        Route::post('/store', 'EmployeeController@store')->name('storeEmployee');
        Route::group(['prefix' => '{book}'], function () {
            Route::get('/', 'EmployeeController@show')->name('showEmployee');
            Route::get('/edit', 'EmployeeController@edit')->name('editEmployee');
            Route::post('/update', 'EmployeeController@update')->name('updateEmployee');
            Route::get('/delete', 'EmployeeController@destroy')->name('deleteEmployee');
        });
    });

    Route::group(['prefix' => 'issues'], function () {
        Route::get('/', 'IssueController@index')->name('issues');
        Route::get('/create', 'IssueController@create')->name('createIssue');
        Route::post('/store', 'IssueController@store')->name('storeIssue');
        Route::group(['prefix' => '{book}'], function () {
            Route::get('/', 'IssueController@show')->name('showIssue');
            Route::get('/edit', 'IssueController@edit')->name('editIssue');
            Route::post('/update', 'IssueController@update')->name('updateIssue');
            Route::get('/delete', 'IssueController@destroy')->name('deleteIssue');
        });
    });

});