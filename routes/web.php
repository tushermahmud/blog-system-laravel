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

Route::get('/',[
		'uses'	=>'BlogController@index',
		'as'	=>'blog'
	]);

Route::get('/blog/{post}',[
		'uses'	=>'BlogController@single',
		'as'	=>'blog.single.posts'
]);
Route::get('/category/{catagory}',[
		'uses'	=>'BlogController@category',
		'as'	=>'category'
]);
Route::get('/author/{author}',[
		'uses'	=>'BlogController@author',
		'as'	=>'author'
]);


Auth::routes();

Route::get('/home', 'Backend\HomeController@index')->name('home');
Route::get('/logout', function(){
   Auth::logout();
   return Redirect::to('/login');
});
Route::put('/backend/blog/restore/{blog}',[
		'uses'	=>'Backend\BlogController@restore',
		'as'	=>'blog.restore'
]);
Route::delete('/backend/blog/forceDestroy/{blog}',[
		'uses'	=>'Backend\BlogController@forceDestroy',
		'as'	=>'blog.force-destroy'
]);
Route::get('/backend/users/confirm/{users}',[
		'uses'	=>'Backend\UsersController@confirm',
		'as'	=>'user.confirm'
]);
Route::get('/profile-edit',[
		'uses'	=>'Backend\HomeController@edit',
		'as'	=>'profileForm'
]);
Route::put('/profile-edit',[
		'uses'	=>'Backend\HomeController@update',
		'as'	=>'profileFormUpdate'
]);

Route::resource('/backend/blog', 'Backend\BlogController'); 
Route::resource('/backend/catagories', 'Backend\CategoriesController'); 
Route::resource('/backend/users', 'Backend\UsersController');




