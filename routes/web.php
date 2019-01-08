<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if(Auth::check()){
        return redirect('home');
    }
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');

    // CUSTOM METHOD RESOURCES
    Route::delete('kols/remove_interest', 'KolsController@removeInterest');
    Route::post('kols/add_or_restore_interest', 'KolsController@addOrRestoreInterest');
    Route::post('kols/profiles/{channel}', 'KolsController@addOrUpdateProfiles');
    Route::post('kols/ratecard/{channel}', 'KolsController@addOrUpdateRatecards');

    // USERS ROLES & PERMISSIONS
    Route::post('roles/assign/{id}', 'RolesController@assign');
    Route::delete('roles/revoke/{id}', 'RolesController@revoke');
    Route::post('users/assign/{id}', 'UsersController@assign');
    Route::delete('users/revoke/{id}', 'UsersController@revoke');

    require_once base_path('routes/web/resources.php');

    // CUSTOM RESOURCES
    Route::resource('kols', 'KolsController');
    Route::resource('users', 'UsersController');
    Route::resource('roles', 'RolesController');

});

