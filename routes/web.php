<?php

use GuzzleHttp\Middleware;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
  //  return view('welcome');
//});
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');


//Route::group(['prefix'=> 'user' , 'middleware'=>'auth'] , function() {
    Route::group([ 'middleware'=>'auth'], function () {
Route::get('/post/hdelete/{id}', 'PostsController@hdelete')->name('post.hdelete');
Route::get('/post/restore/{id}', 'PostsController@restore')->name('post.restore');
Route::get('/post/edit/{id}', 'PostsController@edit')->name('post.edit');
Route::get('/post/trashed', 'PostsController@trashed')->name('post.trashed');
Route::get('/posts', 'PostsController@index')->name('posts');
Route::get('/post/delete/{id}', 'PostsController@destroy')->name('post.delete');
Route::get('/post/create', 'PostsController@create')->name('post.create');
Route::post('/post/store', 'PostsController@store')->name('post.store');
Route::post('/post/update/{id}', 'PostsController@update')->name('post.update');

Route::get('/categories', 'CategoriesController@index')->name('categories');
Route::get('/category/edit/{id}', 'CategoriesController@edit')->name('category.edit');
Route::get('/category/delete/{id}', 'CategoriesController@destroy')->name('category.delete');
Route::get('/category/create', 'CategoriesController@create')->name('category.create');
Route::post('/category/store', 'CategoriesController@store')->name('category.store');
Route::post('/category/update/{id}', 'CategoriesController@update')->name('category.update');

Route::get('/tags', 'TagController@index')->name('tags');
Route::get('/tag/edit/{id}', 'TagController@edit')->name('tag.edit');
Route::get('/tag/delete/{id}', 'TagController@destroy')->name('tag.delete');
Route::get('/tag/create', 'TagController@create')->name('tag.create');
Route::post('/tag/store', 'TagController@store')->name('tag.store');
Route::post('/tag/update/{id}', 'TagController@update')->name('tag.update');

Route::get('/users', 'UserController@index')->name('users');
Route::get('/user/admin/{id}', 'UserController@admin')->name('user.admin');
Route::get('/user/notadmin/{id}', 'UserController@notAdmin')->name('user.not.admin');
Route::get('/user/create', 'UserController@create')->name('user.create');
Route::post('/user/store', 'UserController@store')->name('user.store');

Route::get('/users/profile', 'ProfilesController@index')->name('users.profile');
Route::post('/users/profile/update', 'ProfilesController@update')->name('users.profile.update');
Route::get('/users/profile/create', 'ProfilesController@create')->name('users.profile.create');

Route::get('/settings', 'SettingsController@index')->name('settings');
Route::post('/settings/update', 'SettingsController@update')->name('settings.update');

Route::get('/', 'SiteUIController@index')->name('index');
Route::get('category/{id}', 'SiteUIController@category')->name('category.show');
Route::get('tag/{id}', 'SiteUIController@tag')->name('tag.show');

Route::get('post/{slug}','SiteUIController@show')->name('post.show');

Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');


Route::get('/result', function (){

    $post = App\Post::where('title', 'like' ,  '%' . request('search') . '%' )->get();
    return view('results.result ')
    ->with('posts' , $post )
    ->with('title' ,  'Result : '. request('search') )
    ->with('settings',  App\Settings::first() )
    ->with('blog_name' , App\Settings::first()->blog_name)
    ->with('categories' , App\Category::take(5)->get() )
    ->with('query' , request('search') )
    ->with('tags', App\Tag::take(12)->get());


})->name('result.name');

});


Route::group([ 'middleware'=>['role:adminsitrator']], function () {

    Route::resource('userss', 'UserssController') ;
    Route::resource('permission', 'PermissionsController') ;
    Route::resource('roles', 'RolesController') ;
   });
