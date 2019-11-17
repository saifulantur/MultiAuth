<?php

Auth::routes(['verify' => true]);

//Route::get('/', function () {
////    $userId = Auth::id();
//    return view('welcome');
//});

Route::get('/', 'GuestController@index')->name('guest');

Route::group(['middleware' => ['auth']],function (){
    Route::get('/home', 'HomeController@index')->name('home');

    //post route

    Route::post('/store/post', 'PostController@store')->name('post.store');
    Route::get('/your/ad', 'PostController@viewAd')->name('list.ad');
    Route::get('/your/ad/edit/{ad_id}', 'PostController@editAd')->name('ad.edit');
    Route::post('/ad/update/{ad_id}', 'PostController@updateAd')->name('ad.update');
    Route::get('/ad/destroy/{ad_id}', 'PostController@destroyAd')->name('ad.destroy');

    //pdf Route
    Route::get('/add/pdf', 'PdfListController@addPdf')->name('add.pdf');
    Route::post('/store/pdf','PdfListController@storePdf')->name('pdf.store');

});

Route::group(['prefix'=> 'admin', 'middleware'=> ['admin']], function (){
    Route::get('/', 'Admin\AdminController@dashboard')->name('dashboard');
    //User List
    Route::get('/user/list', 'Admin\AdminController@userList')->name('userList');

    //AuthorName
    Route::get('/author', 'Admin\AuthorController@index')->name('index'); //index page
    Route::post('/store', 'Admin\AuthorController@store')->name('store'); //Author Name Save
    Route::get('/author/edit/{author_id}', 'Admin\AuthorController@edit')->name('authorNameEdit'); //edit page
    Route::post('/author/update/{author_id}', 'Admin\AuthorController@update')->name('update');// Update
    Route::get('/author/destroy/{author_id}', 'Admin\AuthorController@destroy')->name('destroy');//Soft Delete
    Route::get('/author/restore/{author_id}', 'Admin\AuthorController@restore')->name('restore'); //Restore
    Route::get('/author/permanent/delete/{author_id}', 'Admin\AuthorController@permanentDelete')->name('permanentDelete'); //Permanent Delete







});



