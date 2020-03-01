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

if(version_compare(PHP_VERSION, '7.2.0', '>=')) { error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING); }

Route::get('/', 'Seguridad\LoginController@index')->name('inicio');
Route::get('seguridad/login', 'Seguridad\LoginController@index')->name('login');
Route::post('seguridad/login', 'Seguridad\LoginController@login')->name('login_post');
Route::get('seguridad/logout', 'Seguridad\LoginController@logout')->name('logout');
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'superadmin']], function () {
    Route::get('', 'AdminController@index')->name('tablero');
    /* RUTAS DEL MENU */
    Route::get('menu', 'MenuController@index')->name('menu');
    Route::get('menu/crear', 'MenuController@crear')->name('crear_menu');
    Route::get('menu/{id}/editar', 'MenuController@editar')->name('editar_menu');
    Route::put('menu/{id}', 'MenuController@actualizar')->name('actualizar_menu');
    Route::post('menu', 'MenuController@guardar')->name('guardar_menu');
    Route::post('menu/guardar-orden', 'MenuController@guardarOrden')->name('guardar_orden');
    Route::get('rol/{id}/elimniar', 'MenuController@eliminar')->name('eliminar_menu');
    /* RUTAS DEL ROL */
    Route::get('rol', 'RolController@index')->name('rol');
    Route::get('rol/crear', 'RolController@crear')->name('crear_rol');
    Route::post('rol', 'RolController@guardar')->name('guardar_rol');
    Route::get('rol/{id}/editar', 'RolController@editar')->name('editar_rol');
    Route::put('rol/{id}', 'RolController@actualizar')->name('actualizar_rol');
    Route::delete('rol/{id}', 'RolController@eliminar')->name('eliminar_rol');
    /* RUTAS DEL MENUROL */
    Route::get('menu-rol', 'MenuRolController@index')->name('menu_rol');
    Route::post('menu-rol', 'MenuRolController@guardar')->name('guardar_menu_rol');
    /* RUTAS DEL PERMISO */
    Route::get('permiso', 'PermisoController@index')->name('permiso');
    Route::get('permiso/crear', 'PermisoController@crear')->name('crear_permiso');
    Route::post('permiso', 'PermisoController@guardar')->name('guardar_permiso');
    Route::get('permiso/{id}/editar', 'PermisoController@editar')->name('editar_permiso');
    Route::put('permiso/{id}', 'PermisoController@actualizar')->name('actualizar_permiso');
    Route::delete('permiso/{id}', 'PermisoController@eliminar')->name('eliminar_permiso');
     /* RUTAS DEL USUARIO */
     Route::get('usuario', 'UsuarioController@index')->name('usuario');
     Route::get('usuario/crear', 'UsuarioController@crear')->name('crear_usuario');
     Route::post('usuario', 'UsuarioController@guardar')->name('guardar_usuario');
     Route::get('usuario/{id}/editar', 'UsuarioController@editar')->name('editar_usuario');
     Route::put('usuario/{id}', 'UsuarioController@actualizar')->name('actualizar_usuario');
      /* RUTAS DEL ARCHIVO y ENTRADA */
     Route::get('archivo', 'ArchivoController@index')->name('archivo');
     Route::post('guardar', 'EntradaController@guardar')->name('subir_archivo');
     /* RUTAS DE ASIGNACION */
     Route::get('asignacion', 'OrdenesmtlasignarController@index')->name('asignacion');
     Route::post('asignacion', 'OrdenesmtlasignarController@actualizar')->name('actualizar_asignacion');
      /* DETALLE DE ORDENES */
     Route::get('detalleorden', 'OrdenesmtlasignarController@index1')->name('detalle_de_ordenes');
      
     
});




