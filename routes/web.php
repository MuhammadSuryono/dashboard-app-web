<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
// use Illuminate\Support\Facades\DB;
// use Auth;

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

Auth::routes();


Route::group(['middleware' => ['auth']], function() {
	Route::any('sw.js', function() {
		return redirect()->route('/');
	});
	
	Route::get('/', 'HomeController@index');

	Route::group(['prefix' => 'transaction'], function () {
		Route::get('/', 'TransactionController@index')->name('transaction');
		Route::get('transaction/history', 'TransactionController@GetHistory')->name('transaction.history');
		Route::get('transaction/settlement-history', 'TransactionController@settlementhistory')->name('transaction.settlement-history');
	});

	Route::group(['prefix' => 'ppob'], function () {
	    Route::get('/product', 'PpobControllers@index')->name('ppob.product');
    });

	Route::group(['prefix' => 'item'], function () {
		Route::get('/', 'ItemController@index')->name('item');
		Route::post('/create', 'ItemController@create')->name('item.create');
	});

	Route::group(['prefix' => 'category'], function () {
		Route::get('/', 'CategoryController@index')->name('category');
		Route::get('/all', 'CategoryController@allcategory')->name('category.all');
		Route::post('store', 'CategoryController@store')->name('category.create');
	});

	Route::group(['prefix' => 'report'], function() {
		Route::get('ringkasan', 'ReportController@viewringkasan')->name('report.ringkasan');
		Route::get('penjualan-today', 'ReportController@report_penjualan')->name('report.penjualan_today');
		Route::get('penjualan', 'ReportController@viewpenjualanitem')->name('report.penjualan');
		Route::get('pembayaran', 'ReportController@viewpembayaran')->name('report.pembayaran');
	});

	Route::group(['prefix' => 'toko'], function () {
		Route::get('outlet', 'OutletController@index')->name('toko.outlet');
		Route::post('outlet', 'OutletController@create')->name('toko.outlet.create');
	});

	Route::group(['prefix' => 'setting'], function () {
		Route::get('account', 'UserController@index')->name('setting.account');
		Route::post('account', 'UserController@store')->name('setting.account.create');
	});
});

Route::any("/connection-db", "ConnectionDb@index");
Route::any('setup-password/{email}', 'SetupPasswordController@index');
Route::any('password/create', 'SetupPasswordController@setup_password')->name('setup_password.create');

Route::match(['get','post'],'{controller?}/{method?}/{params?}', function ($controller = 'transaction', $method = 'index', $params = '') {
	$controller = app()->make("\App\Http\Controllers\\". ucwords($controller).'Controller' );
	$method = Str::camel(str_replace('-', '_', $method));
	$params = explode('/', $params);
	try { 
		return $controller->callAction($method, $params);
	} catch (Exception $e) {
		if (env('APP_ENV') == 'local') {
			dd($e);
		}
		$didntExController = strpos($e->getMessage(), 'App\Http\Controllers') && strpos($e->getMessage(), 'Controller::') && strpos($e->getMessage(), ' does not exist.') && strpos($e->getFile(), '\vendor\laravel\framework\src\Illuminate\Routing\Controller.php');
		$didntExView = strpos($e->getMessage(), '[') && strpos($e->getMessage(), '] not found.') && strpos($e->getFile(), 'laravel\framework\src\Illuminate\View\FileViewFinder.php');
		if ($didntExController || $didntExView) {
			abort(404);
		}
		else {
			abort(500);
		}
	}
})->where('params', '[A-Za-z0-9/]+')->middleware('auth');
