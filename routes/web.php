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
Route::get('/sitemap.xml', 'SitemapController@index');
Route::post('sitemap' , 'SitemapController@post_action');

Route::post('login' , 'Auth\LoginController@login');
Route::get('login' , "Logincontroller@adminLogin");
Route::get('logout' , "Logincontroller@logout");

Route::get('ajax_get/{action}' , 'Ajaxcontroler@get_action');
Route::post('ajax_post/{action}' , 'Ajaxcontroler@post_action');

Route::group(['middleware'=>['auth']] , function(){
 Route::get('js_admin/seo_management_list' , "AdminController@seo_management_list");
 Route::get('js_admin/{any}/{p1?}' , "AdminController@page");
 Route::post('js_admin/save_seo_page' , "AdminController@save_seo_page");
 
 Route::post('js_admin/{action}' , "AdminController@post_aciton");
 Route::get('js_admin_ajax/{action}' , 'Ajaxcontroler@get_action');  
});

Route::get('/hire-me' ,"HomeController@hire_me");
Route::get('/ajax' ,"HomeController@ajax");
Route::get('/laravel' ,"HomeController@laravel");
Route::get('/jquery' ,"HomeController@jquery");
Route::get('php_codes/{page?}' , 'Php@page');

Route::get('/about' , "SiteController@about");
Route::get('/contact-us' , "SiteController@contactUs");



// Route::get('/' , 'SiteController@index');
// Route::get('/{page?}' , 'SiteController@page');

Route::get('/{page?}' ,"HomeController@index");
Route::get('/{page}/{p1}' , "SiteController@post");

