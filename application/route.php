<?php

use think\Route;

//admin api
Route::post('api/admin/login','api/Admin/Login');
Route::post('api/admin/logout','api/admin/Logout');
Route::put('api/admin/modify','api/Admin/Modify');
Route::get('api/admin/info','api/Admin/Info');


//option api
Route::get('api/option/:name','api/Option/getOne');
Route::get('api/option','api/Option/getAll');
//特殊的新增更新
Route::post('api/option/:name','api/Option/updateOption');


//banner api
Route::get('api/banner/:id','api/Banner/getOne');
Route::get('api/banner','api/Banner/getAll');
Route::post('api/banner','api/Banner/post');
Route::put('api/banner/:id','api/banner/updateById');
Route::delete('api/banner/:id','api/Banner/deleteById');

//nav api
Route::get('api/nav','api/Nav/getAll');
Route::post('api/nav','api/Nav/post');
Route::put('api/nav/:id','api/Nav/updateById');
Route::delete('api/nav/:id','api/Nav/deleteById');

//page api
Route::get('api/page/:id','api/Page/getOne');
Route::get('api/page','api/Page/getAll');
Route::post('api/page','api/Page/post');
Route::put('api/page/:id','api/Page/updateById');
Route::delete('api/page/:id','api/Page/deleteById');

//link api
Route::get('api/link','api/Link/getAll');
Route::post('api/link','api/Link/post');
Route::put('api/link/:id','api/Link/updateById');
Route::delete('api/link/:id','api/Link/deleteById');

//product category api
Route::get('api/product/cat','api/ProductCat/getAll');
Route::post('api/product/cat','api/ProductCat/post');
Route::put('api/product/cat/:id','api/ProductCat/updateById');
Route::delete('api/product/cat/:id','api/ProductCat/deleteById');

//products api
Route::get('api/product/one/:id','api/Product/getOne');
Route::get('api/product/list','api/Product/getAll');
Route::post('api/product/create','api/Product/post');
Route::put('api/product/dis/:id','api/Product/updateById');
Route::delete('api/product/del/:id','api/Product/deleteById');

//product property api
Route::get('api/product/property','api/Property/getAll');
Route::post('api/product/property','api/Property/post');
Route::put('api/product/property/:id','api/Property/updateById');
Route::delete('api/product/property/:id','api/Property/deleteById');

//article api
Route::get('api/article/:id','api/Article/getOne');
Route::get('api/article','api/Article/getAll');
Route::post('api/article','api/Article/post');
Route::put('api/article/:id','api/Article/updateById');
Route::delete('api/article/:id','api/Article/deleteById');

//image category api
Route::get('api/image/cat','api/ImageCat/getAll');
Route::post('api/image/cat','api/ImageCat/post');
Route::get('api/image/cat/:id','api/ImageCat/updateById');
Route::get('api/image/cat/:id','api/ImageCat/deleteById');

//image api
Route::get('api/img','api/Image/getAll');
Route::delete('api/img/:id','api/Image/deleteById');

//system api
Route::get('api/system','api/System/get');
Route::post('api/system','api/System/post');
//upload api
Route::post('api/upload/image','api/Upload/Image');


Route::get('/','web/Home/index');
Route::get('web/home/index','web/Home/index');

Route::get('web/page/index','web/Page/index');

Route::get('web/product/index','web/Product/index');
Route::get('web/product/one','web/Product/getOne');


Route::get('web/search','web/Product/search');