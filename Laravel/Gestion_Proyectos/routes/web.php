<?php

Route::get('/', function () {
    return view('auth.login');
});

# Aautenticación
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

# Rutas que incluyen todos los metodos HTTP
Route::resource('/index','IndexController')->middleware('auth');
Route::resource('proyectos','ProyectosController')->middleware('auth');

Route::get('verProyectos/{Clave}','ProyectosController@muestra')->middleware('auth');
Route::get('/tareas','TareasController@index')->middleware('auth');
Route::get('/tareas/crear','TareasController@crear')->middleware('auth');
Route::post('/tareas/crear','TareasController@store')->middleware('auth');
Route::get('/tareas/{Clave}/edit','TareasController@edit')->middleware('auth');
Route::put('/tareas/{Clave}','TareasController@update')->middleware('auth');
Route::delete('/tareas/eliminar/{clave}','TareasController@destroy')->middleware('auth');
Route::post('/tareas/visualizar','TareasController@visualizar')->middleware('auth');
Route::resource('r_humano','R_HController')->middleware('auth');
Route::resource('r_tecnologico','R_TController')->middleware('auth');
Route::resource('empleado','PersonaController')->middleware('auth');
Route::resource('subtareas','SubtareasController')->middleware('auth');
Route::get('tarea/{Clave}', 'SubtareasController@getTareas')->middleware('auth');;

Route::post('subtareas/view','SubtareasController@visualizar')->middleware('auth');
Route::resource('/empleados','PersonaController')->middleware('auth');

// Generador de PDF
Route::get('generarPDF/{Clave}/','pdfController@exportPDF')->name('generarPDF')->middleware('auth');

Route::get('export/{Clave}/', 'ExcelController@exportExcel')->name('export')->middleware('auth');
Route::get('sms', 'SMSController@envioSMS')->name('sms')->middleware('auth');
Route::post('enviarSMS', 'SMSController@sendMessage')->name('sms')->middleware('auth');
