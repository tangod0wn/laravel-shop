<?php


Route::get('/home', 'HomeController@index');   
Route::get('/test', ['as' => 'test', 'uses' => 'Customer\HomeController@test']);


Route::group(['middleware' => ['web']], function () {

	Route::auth();
	
	Route::get('/', ['as' => 'home', 'uses' => 'Customer\HomeController@index']);
    Route::get('/products/{slug}', ['as' => 'products', 'uses' => 'Customer\HomeController@products']);
	Route::get('/products/show/{id}', ['as' => 'products.show', 'uses' => 'Customer\HomeController@show']);
	Route::get('/search', ['as' => 'search', 'uses' => 'Customer\HomeController@search']);
	Route::get('/all/products', ['as' => 'products.all', 'uses' => 'Customer\HomeController@showAllProducts']);

	Route::get('/help', ['as' => 'help', 'uses' => 'Customer\HomeController@help']);
	Route::get('/faq', ['as' => 'faq', 'uses' => 'Customer\HomeController@faq']);
	Route::get('/about', ['as' => 'about_us', 'uses' => 'Customer\HomeController@about_us']);
	Route::get('/contact', ['as' => 'contact_us', 'uses' => 'Customer\HomeController@contact_us']);
	Route::get('/terms', ['as' => 'terms', 'uses' => 'Customer\HomeController@terms']);
	Route::get('/privacy', ['as' => 'privacy', 'uses' => 'Customer\HomeController@privacy']);
	Route::post('/contact/message', ['as' => 'send.message', 'uses' => 'Customer\MessageController@postMessage']);

	Route::get('/profile/user/{id}', ['as' => 'edit.profile', 'uses' => 'Customer\UserController@getEditProfile']);
	Route::post('/profile/user/{id}', ['as' => 'edit.profile', 'uses' => 'Customer\UserController@postEditProfile']);
	// Route::get('/order', ['as' => 'place.order', 'uses' => 'Customer\HomeController@placeOrder']);    

	Route::post('/cart/add', ['as' => 'cart.add', 'uses' => 'Customer\CartController@postAddToCart']);
	Route::get('/cart', ['as' => 'cart.index', 'uses' => 'Customer\CartController@index']); 
	Route::post('/cart/{id}', ['as' => 'cart.update', 'uses' => 'Customer\CartController@postEdit']);
	Route::post('/cart/delete/{id}', ['as' => 'cart.delete', 'uses' => 'Customer\CartController@postDelete']);



	Route::post('/order/create', ['as' => 'order.create', 'uses' => 'Customer\OrderController@postOrder']);
	Route::get('/order/index',  'Customer\OrderController@index'); 	


    
});








Route::get('/admin/login', ['as' => 'admin.login', 'uses' => 'Admin\AdminController@getLogin'] );
Route::post('/admin/login', 'Admin\AdminController@postLogin');
Route::get('/admin/logout', 'Admin\AdminController@logout');

Route::group(['middleware' => ['web']], function () {

	Route::group(['middleware' => ['admins']], function () {

		Route::get('/admin', ['as' => 'admin.index', 'uses' => 'Admin\AdminController@index']);

	    Route::get('/admin/category', ['as' => 'category.index', 'uses' => 'Admin\CategoryController@index']);
	    Route::post('/category/create', ['as' => 'category.create', 'uses' => 'Admin\CategoryController@postCreate']);
	    Route::get('/admin/category/edit/{id}', ['as' => 'category.edit', 'uses' => 'Admin\CategoryController@getEdit']);
	    Route::post('/admin/category/edit/{id}', [ 'as' => 'category.edit', 'uses' => 'Admin\CategoryController@postEdit']);
	    Route::get('/admin/category/delete/{id}', ['as' => 'category.delete', 'uses' => 'Admin\CategoryController@getDelete']);
	    Route::post('/admin/category/delete/{id}', [ 'as' => 'category.delete', 'uses' => 'Admin\CategoryController@postDelete']);
	    Route::get('/category/show_items/{value}', ['as' => 'category.show_items', 'uses' => 'Admin\CategoryController@show_items']);
	    Route::get('/admin/category/search', ['as' => 'category.search', 'uses' => 'Admin\CategoryController@search']);

	    Route::get('/admin/products', ['as' => 'product.index', 'uses' => 'Admin\ProductController@index']);
	    Route::get('/admin/product/new', ['as' => 'product.new', 'uses' => 'Admin\ProductController@getCreate']);
	    Route::post('/product/create', ['as' => 'product.create', 'uses' => 'Admin\ProductController@postCreate']);     
	    Route::get('/admin/product/edit/{id}', ['as' => 'product.edit', 'uses' => 'Admin\ProductController@getEdit']);
	    Route::post('admin/product/edit/{id}', [ 'as' => 'product.edit', 'uses' => 'Admin\ProductController@postEdit']);
	    Route::get('/admin/product/delete/{id}', ['as' => 'product.delete', 'uses' => 'Admin\ProductController@getDelete']);
	    Route::post('admin/product/delete/{id}', [ 'as' => 'product.delete', 'uses' => 'Admin\ProductController@postDelete']);
	    Route::get('/admin/product/search', ['as' => 'product.search', 'uses' => 'Admin\ProductController@search']);

	    Route::get('/admin/order', ['as' => 'order.index', 'uses' => 'Admin\OrderController@index']);
	    Route::get('/admin/order/show/{id}', ['as' => 'order.show', 'uses' => 'Admin\OrderController@show']); 
		Route::get('/admin/order/search', ['as' => 'order.search', 'uses' => 'Admin\OrderController@search']);	    	     

	    Route::get('/admin/customers', ['as' => 'customer.index', 'uses' => 'Admin\CustomerController@index']);
	    Route::get('/admin/customer/search', ['as' => 'customer.search', 'uses' => 'Admin\CustomerController@search']);	    

	    Route::get('/admin/messages', ['as' => 'message.index', 'uses' => 'Admin\MessageController@index']);
	    Route::get('/admin/messages/new', ['as' => 'message.new', 'uses' => 'Admin\MessageController@new_message']);	    
	    Route::get('/admin/messages/show/{id}', ['as' => 'message.show', 'uses' => 'Admin\MessageController@show']);
	    Route::post('/admin/messages/edit/{id}', ['as' => 'message.edit', 'uses' => 'Admin\MessageController@postEdit']);
	    Route::post('/admin/messages/delete/{id}', ['as' => 'message.delete', 'uses' => 'Admin\MessageController@postDelete']);	    	    	    	    


	});
});


