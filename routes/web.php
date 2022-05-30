<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
   return redirect('/credential/login');
});

Route::group(['prefix' => 'credential'], function () {
   Auth::routes(['register'=> false]);
});

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'home', 'middleware'=> 'auth', 'namespace' => 'WEB'], function () {
   // user
   Route::group(['prefix' => 'user'], function () {
      Route::get('/', "UserController@index")->name('user');
      Route::post('/', "UserController@store")->name('user.store');
      Route::get('/edit/{id}', "UserController@edit")->name('user.edit');
      Route::get('/update/{id}', "UserController@update")->name('user.update');
      Route::get('/destroy/{id}', "UserController@destroy")->name('user.destroy');
      Route::post('/status/{id}', "UserController@status")->name('user.status');
   });
   // alumni
   Route::group(['prefix' => 'alumni'], function () {
      Route::get('/', "AlumniController@index")->name('alumni');
      Route::get('/create', "AlumniController@create")->name('alumni.create');
      Route::post('/', "AlumniController@store")->name('alumni.store');
      Route::get('/destroy/{id}', "AlumniController@destroy")->name('alumni.destroy');
      Route::get('/edit/{id}', "AlumniController@edit")->name('alumni.edit');
      Route::PUT('/update/{id}', "AlumniController@update")->name('alumni.update');
      Route::get('/detail/{id}', "AlumniController@detail")->name('alumni.detail');

   });
   // masyayikh / teacher
   Route::group(['prefix' => 'teacher'], function () {
      Route::get('/', "TeacherController@index")->name('teacher');
      Route::get('/create', "TeacherController@create")->name('teacher.create');
      Route::post('/', "TeacherController@store")->name('teacher.store');
      Route::get('/edit/{id}', "TeacherController@edit")->name('teacher.edit');
      Route::PUT('/update/{id}', "TeacherController@update")->name('teacher.update');
      Route::get('/detail/{id}', "TeacherController@detail")->name('teacher.detail');
      Route::get('/destroy/{id}', "TeacherController@destroy")->name('teacher.destroy');
      Route::post('/add/books/{guruId}', 'TeacherController@addBooks')->name('teacher.book.add');
      Route::get('/book/destroy/{id}', 'TeacherController@destroyBook')->name('teacher.book.destroy');
   });
   Route::group(['prefix' => 'laravel-filemanager'], function () {
      \UniSharp\LaravelFilemanager\Lfm::routes();
  });

   // Post/Rubrik
   Route::group(['prefix' => 'post'], function () {
      Route::get('/', 'PostController@index')->name('post');
      Route::get('/create', 'PostController@create')->name('post.create');
      Route::post('/store', 'PostController@store')->name('post.store');
      Route::get('/edit/{id}', 'PostController@edit')->name('post.edit');
      Route::PUT('/update/{id}', "PostController@update")->name('post.update');
      Route::get('/destroy/{id}', "PostController@destroy")->name('post.destroy');
      Route::get('/detail/{id}', "PostController@detail")->name('post.detail');

      // Category
       Route::group(['prefix' => 'category'], function () {
         Route::get('/', "CategoryController@index")->name('category');   
         Route::post('/', "CategoryController@store")->name('category.store');
         Route::get('/edit/{id}', "CategoryController@edit")->name('category.edit');
         Route::get('/update/{id}', "CategoryController@update")->name('category.update');
         Route::get('/destroy/{id}', "CategoryController@destroy")->name('category.destroy');
       });
   });
   // book
   Route::group(['prefix' => 'book'], function () {
       Route::group(['prefix' => 'genres'], function () {
         Route::get('/', 'BookController@indexGenre')->name('admin.genre');
         Route::get('/create', 'BookController@createGenre')->name('admin.genre.create');
         Route::post('/store', 'BookController@storeGenre')->name('admin.genre.store');
         Route::get('/edit/{id}', 'BookController@editGenre')->name('admin.genre.edit');
         Route::post('/update/{id}', 'BookController@updateGenre')->name('admin.genre.update');
         Route::get('/destroy/{id}', "BookController@destroyGenre")->name('admin.genre.destroy');


       });
       Route::get('/', 'BookController@index')->name('admin.book');
       Route::get('/create', 'BookController@createBuku')->name('admin.book.create');
       Route::post('/store', 'BookController@storeBook')->name('admin.book.store');
       Route::get('/edit/{id}', 'BookController@editBuku')->name('admin.book.edit');
       Route::post('/update/{id}', 'BookController@updateBuku')->name('admin.book.update');
      Route::get('/destroy/{id}', "BookController@destroyBook")->name('admin.book.destroy');

   });
   // Galery
   Route::group(['prefix' => 'galery'], function () {
      Route::get('/', 'GaleryController@index')->name('admin.galery');
      Route::post('/', 'GaleryController@store')->name('admin.galery.store');
      Route::get('/destroy/{id}', 'GaleryController@destroy')->name('admin.galery.destroy');
   });


});