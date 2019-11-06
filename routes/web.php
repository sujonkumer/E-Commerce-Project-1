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



/*
|--------------------------------------------------------------------------
| All Front End Page Routing are done here in this list
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// To Call the Home Page
Route::get('/', 'Frontend\PagesController@index')->name('index');
// To Call the Login Page
Route::get('/login', 'Frontend\PagesController@login')->name('login');
// To Call the Register Page
Route::get('/register', 'Frontend\PagesController@register')->name('register');
// Front End Product Page
Route::get('/products', 'Frontend\ProductsController@products')->name('products');
// Product Single Page
Route::get('/products/{slug}', 'Frontend\ProductsController@show')->name('products.show');



/*
|--------------------------------------------------------------------------
| All Back End Page Routing are done here in this list
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Backend Admin Template Page Group
Route::group(['prefix' => 'admin'], function(){ 
	Route::get('/', 'Backend\PagesController@index')->name('admin.index');

	// Backend Category Routes Controller
	Route::group(['prefix' => '/categories'], function(){
		Route::get('/createcategories', 'Backend\CategoriesController@createcategory')->name('createcategory');
		Route::get('/manage', 'Backend\CategoriesController@manage_category')->name('managecategory');
		Route::get('/edit/{id}', 'Backend\CategoriesController@edit_category')->name('editcategory');
		// Add Category from CreateCategory Page
		Route::post('/createcategories', 'Backend\CategoriesController@category_store')->name('admin.category.store');
		Route::post('/edit/{id}', 'Backend\CategoriesController@category_update')->name('admin.category.update');
		Route::post('/delete/{id}', 'Backend\CategoriesController@category_delete')->name('admin.category.delete');
	});

	// Backend Products Routes Controller
	Route::group(['prefix' => '/product'], function(){
		Route::get('/createproduct', 'Backend\ProductsController@createproduct')->name('createproduct');
		Route::get('/manage', 'Backend\ProductsController@manage_product')->name('manageproduct');
		Route::get('/edit/{id}', 'Backend\ProductsController@edit_product')->name('editproduct');
		
		// Add Product from CreateProduct Page
		Route::post('/createproduct', 'Backend\ProductsController@product_store')->name('admin.product.createproduct');
		Route::post('/edit/{id}', 'Backend\ProductsController@product_update')->name('admin.product.update');
		Route::post('/delete/{id}', 'Backend\ProductsController@product_delete')->name('admin.product.delete');
	});

	





	
});













