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
// app()->setLocale('en');
Route::get('/clear-cache', function() {
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return "Cache is cleared";
})->name('clear.cache');

//admin
Route::group(['middleware'=>'auth'], function(){
	//admin home
	Route::get('admin', 'back\HomeController@index')->name('admin');
	Route::resource('admin/home', 'back\HomeController');	
	//service_department
	Route::resource('admin/service_department', 'back\ServicedeptController');
	//service
	Route::resource('admin/products', 'back\ServiceController');
	//news
	Route::resource('admin/news', 'back\BlogController');
	//clients
	Route::resource('admin/clients', 'back\ClientopinionController');
	//slider
	Route::resource('admin/slider', 'back\SliderController');
	//page
	Route::resource('admin/page', 'back\PageController');	
	//social
	Route::resource('admin/social', 'back\SocialController');	
	//setting
	Route::resource('admin/setting', 'back\SettingController');	
	//message
	Route::resource('admin/message', 'back\MessageController');
	Route::resource('admin/qoute', 'back\QouteController');
	//maillist
	Route::resource('admin/maillist', 'back\MaillistController');		
});
//end of admin


Auth::routes([
    'register' => false,
    'rest' => false,
    'verify' => false
]);


Route::group([
	'prefix' => '{locale}',
	'where' => ['locale' => '[a-zA-Z]{2}'],
	'middleware' => 'setlocale'
	], function(){
//front
Route::get('/', 'front\HomeController@index')->name('home');
Route::get('/home', 'front\HomeController@index')->name('home');
Route::get('/about', 'front\HomeController@about')->name('about');
Route::get('/qoute', 'front\HomeController@qoute')->name('qoute');
Route::get('/contact', 'front\HomeController@contact')->name('contact');
Route::get('/terms', 'front\HomeController@terms')->name('terms');

Route::get('/brands', 'front\HomeController@brands')->name('brands');
Route::get('/brand_details/{id}', 'front\HomeController@brand_details')->name('brand_details');

Route::get('/news', 'front\HomeController@news')->name('news');
Route::get('/news_details/{id}', 'front\HomeController@news_details')->name('news_details');
Route::get('/product_details/{id}', 'front\HomeController@product_details')->name('product_details');

Route::get('/clients', 'front\HomeController@clients')->name('clients');
Route::get('/client_details/{id}', 'front\HomeController@client_details')->name('client_details');

Route::post('/home/contact_withus', 'front\HomeController@contact_withus')->name('contact_withus');
Route::post('/home/qoute_withus', 'front\HomeController@qoute_withus')->name('qoute_withus');
Route::post('/home/maillist', 'front\HomeController@maillist')->name('maillist');
//end of front

});

Route::get('/',function(){
	return redirect(app()->getLocale());
});


