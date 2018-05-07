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
    return view('welcome');
});

/**
 * Upgrade Projects
 */
# CREATE
# Show the form to add a new project
Route::get('/project/create', 'ProjectController@create');

# Process the form to add a new project
Route::post('/projects', 'ProjectController@store');

# READ
# Show a listing of all the projects
Route::get('/projects', 'ProjectController@index');

# Show an individual project
Route::get('/projects/{id}', 'ProjectController@show');

# UPDATE
# Show the form to edit a specific project
Route::get('/projects/{id}/edit', 'ProjectController@edit');

# Process the form to edit a specific project
Route::put('/projects/{id}', 'ProjectController@update');

# DELETE
# Show the page to confirm deletion of a project
Route::get('/projects/{id}/delete', 'ProjectController@delete');

# Process the deletion of a project
Route::delete('/projects/{id}', 'ProjectController@destroy');

