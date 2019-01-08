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
$_tables = DB::select('SHOW TABLES');
foreach ($_tables as $key => $table) {
    $table_name = $table->{array_keys((array)$table)[0]};
    Route::resource($table_name, 'ResourcesController');
}
