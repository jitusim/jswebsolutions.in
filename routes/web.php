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
    Route::get('admin/dashboard', "Admin\DashboardController@index");
    Route::get('admin/pages', "Admin\DashboardController@pages");
    Route::get('admin/pages/create', "Admin\DashboardController@create");

    //post routing 
    Route::get('admin/post', "Admin\PostController@index");
    Route::get('admin/post/create', "Admin\PostController@create");
    Route::get('admin/post/edit-post/{id}', "Admin\PostController@edit")->name('admin.post.edit-post');
    Route::post('admin/post/update/{id}', "Admin\PostController@update")->name('admin.post.update');
    Route::get('admin/post/delete-post/{id}', "Admin\PostController@delete")->name('admin.post.delete-post');

    Route::prefix('admin/')->name('admin.')->namespace('Admin')->group(function () {


        //function routing
        Route::prefix('function')->name('function.')->group(function () {
            Route::get('/', "FunctionController@index")->name('index');
            Route::get('/ajax-function-list', "FunctionController@ajaxFunctionList")->name('ajax-function-list');
            Route::get('/edit/{id}', "FunctionController@edit")->name('edit');
            Route::get('/create', "FunctionController@create")->name('create');
            Route::post('/store', "FunctionController@store")->name('store');
            Route::get('/destroy/{id}', "FunctionController@destroy")->name('destroy');
        });

        //interview routing
        Route::prefix('interview')->name('interview.')->group(function () {
            Route::get('/', "InterviewController@index")->name('index');
            Route::get('/ajax-interview-list', "InterviewController@ajaxInterviewList")->name('ajax-interview-list');
            Route::get('/edit/{id}', "InterviewController@edit")->name('edit');
            Route::get('/create', "InterviewController@create")->name('create');
            Route::get('/update', "InterviewController@update")->name('update');
            Route::post('/store', "InterviewController@store")->name('store');
            Route::get('/destroy/{id}', "InterviewController@destroy")->name('destroy');
        });
    });
    //function routing


    Route::post('savePost','Admin\PostController@savePost')->name('admin.save-post');
    Route::get('ajaxPostList','Admin\PostController@ajaxPostList')->name('admin.ajax-post-list');

    //
    Route::get('pageList','Admin\DashboardController@pageList')->name('admin.pageList');
    Route::post('savePage','Dashboard@savePage')->name('admin.savePage');
    Route::post('savePage','Admin\DashboardController@savePage')->name('admin.save-page');
   

    //define routes admin
    //Route::get('js_admin/interviews', "Admin\InterviewController@index");
    //Route::get('js_admin/interview/create', "Admin\InterviewController@create");
   //Route::post('js_admin/interview/store', "Admin\InterviewController@store");
   
    Route::get('js_admin/seo_management_list' , "AdminController@seo_management_list");
    Route::get('js_admin/{any}/{p1?}' , "AdminController@page");
    Route::post('js_admin/save_seo_page' , "AdminController@save_seo_page");
    
    Route::post('js_admin/{action}' , "AdminController@post_aciton");
    Route::get('js_admin_ajax/{action}' , 'Ajaxcontroler@get_action');  
});

Route::get('/term-and-condition' ,"HomeController@termAndCondition");
Route::get('/privacy-policy' ,"HomeController@privacyPolicy");
Route::get('/hire-me' ,"HomeController@hire_me");
Route::get('/ajax' ,"HomeController@ajax");
Route::get('/laravel' ,"HomeController@laravel");
Route::get('/jquery' ,"HomeController@jquery");
Route::get('/javascript' ,"HomeController@javascript");
Route::get('php-snippets' , 'Php@phpSnippets');
Route::get('live-demo' , 'HomeController@liveDemo');

Route::get('interview-questions' , 'HomeController@InterviewQuestionPost');
Route::get('question/{question}' , 'HomeController@question');
Route::get('php_codes/{page?}' , 'Php@page');

Route::get('/about' , "SiteController@about");
Route::get('/contact-us' , "SiteController@contactUs");



// Route::get('/' , 'SiteController@index');
// Route::get('/{page?}' , 'SiteController@page');

Route::get('/post/{p1}' , "SiteController@blogs");
Route::get('/{page}/{p1}' , "SiteController@post");
Route::get('/{page?}' ,"HomeController@index");

