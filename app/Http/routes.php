<?php

/*Pages*/

Route::get('/', 'PagesController@index');





/* cms */
Route::resource('cms/products', 'ProductController');
Route::resource('cms/categories', 'CategoryController');
Route::resource('cms/content', 'ContentController');
Route::resource('cms/menu', 'MenuController');
Route::controller('cms', 'CmsController');


/*User*/
Route::controller('user', 'UserController');

/*Shop*/
Route::get('shop/order', 'ShopController@order');
Route::get('shop/update-cart', 'ShopController@updateCart');
Route::get('shop/clear-cart', 'ShopController@cartClear');
Route::get('shop/checkout', 'ShopController@checkout');
Route::get('shop/add-to-cart', 'ShopController@addToCart');
Route::get('shop/{cat_url}/{product_url}', 'ShopController@item');
Route::get('shop/{cat_url}', 'ShopController@products');
Route::get('shop', 'ShopController@index');


Route::get('{url}', 'PagesController@boot');