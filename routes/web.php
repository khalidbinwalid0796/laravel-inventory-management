<?php

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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

// User Routes
Route::group(['prefix' => 'user'], function(){
  	Route::get('/', 'Backend\UserController@index')->name('user.view');
	Route::get('/create', 'Backend\UserController@create')->name('user.create');
	Route::get('/edit/{id}', 'Backend\UserController@edit')->name('user.edit');
	Route::post('/store', 'Backend\UserController@store')->name('user.store');
	Route::post('/update/{id}', 'Backend\UserController@update')->name('user.update');
	Route::post('/delete/{id}', 'Backend\UserController@delete')->name('user.delete');
});

// Profile Routes
Route::group(['prefix' => 'profile'], function(){
	Route::get('/', 'Backend\ProfilesController@index')->name('profile.view');
	Route::get('/edit', 'Backend\ProfilesController@edit')->name('profile.edit');
	Route::post('/update', 'Backend\ProfilesController@update')->name('profile.update');
	Route::get('/password/edit', 'Backend\ProfilesController@passwordEdit')->name('password.edit');
	Route::post('/password/update','Backend\ProfilesController@passwordUpdate')->name('password.update');
});

// Supplier Routes
Route::group(['prefix' => 'supplier'], function(){
	Route::get('/', 'Backend\SuppliersController@index')->name('supplier.view');
	Route::get('/create', 'Backend\SuppliersController@create')->name('supplier.create');
	Route::get('/edit/{id}', 'Backend\SuppliersController@edit')->name('supplier.edit');
	Route::post('/store', 'Backend\SuppliersController@store')->name('supplier.store');
	Route::post('/update/{id}', 'Backend\SuppliersController@update')->name('supplier.update');
	Route::post('/delete/{id}', 'Backend\SuppliersController@delete')->name('supplier.delete');
});

// Customer Routes
Route::group(['prefix' => 'customer'], function(){
	Route::get('/', 'Backend\CustomersController@index')->name('customer.view');
	Route::get('/create', 'Backend\CustomersController@create')->name('customer.create');
	Route::get('/edit/{id}', 'Backend\CustomersController@edit')->name('customer.edit');
	Route::post('/store', 'Backend\CustomersController@store')->name('customer.store');
	Route::post('/update/{id}', 'Backend\CustomersController@update')->name('customer.update');
	Route::post('/delete/{id}', 'Backend\CustomersController@delete')->name('customer.delete');
	Route::get('/credit', 'Backend\CustomersController@Credit')->name('customer.credit');
	Route::get('/credit/pdf', 'Backend\CustomersController@creditPdf')->name('customer.credit.pdf');
	Route::get('/invoice/edit/{invoice_id}', 'Backend\CustomersController@editInvoice')->name('customer.edit.invoice');
	Route::post('/invoice/update/{invoice_id}', 'Backend\CustomersController@updateInvoice')->name('customer.update.invoice');
	Route::get('/invoice/details/pdf/{invoice_id}', 'Backend\CustomersController@invoiceDetailsPdf')->name('invoice.details.pdf');
	Route::get('/paid', 'Backend\CustomersController@paidCustomer')->name('customer.paid');	
	Route::post('/paid/pdf', 'Backend\CustomersController@paidCustomerPdf')->name('customer.paid.pdf');
	Route::get('/wise/report', 'Backend\CustomersController@customerWiseReport')->name('customer.wise.report');
	Route::get('/wise/credit/report', 'Backend\CustomersController@customerWiseCredit')->name('customer.wise.credit.report');
	Route::get('/wise/paid/report', 'Backend\CustomersController@customerWisePaid')->name('customer.wise.paid.report');	
});

// Unit Routes
Route::group(['prefix' => 'unit'], function(){
	Route::get('/', 'Backend\UnitsController@index')->name('unit.view');
	Route::get('/create', 'Backend\UnitsController@create')->name('unit.create');
	Route::get('/edit/{id}', 'Backend\UnitsController@edit')->name('unit.edit');
	Route::post('/store', 'Backend\UnitsController@store')->name('unit.store');
	Route::post('/update/{id}', 'Backend\UnitsController@update')->name('unit.update');
	Route::post('/delete/{id}', 'Backend\UnitsController@delete')->name('unit.delete');
});

// Category Routes
Route::group(['prefix' => 'category'], function(){
	Route::get('/', 'Backend\CategoriesController@index')->name('category.view');
	Route::get('/create', 'Backend\CategoriesController@create')->name('category.create');
	Route::get('/edit/{id}', 'Backend\CategoriesController@edit')->name('category.edit');
	Route::post('/store', 'Backend\CategoriesController@store')->name('category.store');
	Route::post('/update/{id}', 'Backend\CategoriesController@update')->name('category.update');
	Route::post('/delete/{id}', 'Backend\CategoriesController@delete')->name('category.delete');
});

// Product Routes
Route::group(['prefix' => 'product'], function(){
	Route::get('/', 'Backend\ProductsController@index')->name('product.view');
	Route::get('/create', 'Backend\ProductsController@create')->name('product.create');
	Route::get('/edit/{id}', 'Backend\ProductsController@edit')->name('product.edit');
	Route::post('/store', 'Backend\ProductsController@store')->name('product.store');
	Route::post('/update/{id}', 'Backend\ProductsController@update')->name('product.update');
	Route::post('/delete/{id}', 'Backend\ProductsController@delete')->name('product.delete');
});

// Purchase Routes
Route::group(['prefix' => 'purchase'], function(){
	Route::get('/', 'Backend\PurchasesController@index')->name('purchase.view');
	Route::get('/create', 'Backend\PurchasesController@create')->name('purchase.create');
	Route::post('/store', 'Backend\PurchasesController@store')->name('purchase.store');
	Route::get('/pending', 'Backend\PurchasesController@pending')->name('purchase.pending');
	Route::post('/approve/{id}', 'Backend\PurchasesController@approve')->name('purchase.approve');
	Route::post('/delete/{id}', 'Backend\PurchasesController@delete')->name('purchase.delete');
	Route::get('/report', 'Backend\PurchasesController@Report')->name('purchase.report');
	Route::get('/report/pdf', 'Backend\PurchasesController@reportPdf')->name('purchase.report.pdf');
});

Route::get('/get-category', 'Backend\DefaultController@getCategory')->name('get-category');
Route::get('/get-product', 'Backend\DefaultController@getProduct')->name('get-product');
Route::get('/check-product-stock', 'Backend\DefaultController@getStock')->name('check-product-stock');

// Invoice Routes
Route::group(['prefix' => 'invoice'], function(){
	Route::get('/', 'Backend\InvoicesController@index')->name('invoice.view');
	Route::get('/create', 'Backend\InvoicesController@create')->name('invoice.create');
	Route::post('/store', 'Backend\InvoicesController@store')->name('invoice.store');
	Route::get('/pending', 'Backend\InvoicesController@pending')->name('invoice.pending');
	Route::get('/approve/{id}', 'Backend\InvoicesController@approve')->name('invoice.approve');
	Route::post('/delete/{id}', 'Backend\InvoicesController@delete')->name('invoice.delete');
	Route::post('/approve/store/{id}', 'Backend\InvoicesController@approveStore')
		 ->name('approve.store');
	Route::get('/print/list', 'Backend\InvoicesController@printInvoiceList')
		->name('invoice.print.list');
	Route::get('/print/{id}', 'Backend\InvoicesController@printInvoice')
		->name('invoice.print');
	Route::get('/daily/report', 'Backend\InvoicesController@dailyReport')
		->name('invoice.daily.report');
	Route::get('/daily/report/pdf', 'Backend\InvoicesController@dailyReportPdf')
		->name('invoice.daily.report.pdf');	
});

// Stock Routes
Route::group(['prefix' => 'stock'], function(){
	Route::get('/report', 'Backend\StocksController@stockReport')->name('stock.report');
	Route::get('/report/pdf', 'Backend\StocksController@stockReportPdf')->name('stock.report.pdf');
	Route::get('/report/supplier/product/wise', 'Backend\StocksController@supplierProductWise')->name('stock.report.supplier.product.wise');
	Route::get('/report/supplier/wise/pdf', 'Backend\StocksController@supplierWisePdf')->name('stock.report.supplier.wise.pdf');
	Route::get('/report/product/wise/pdf', 'Backend\StocksController@productWisePdf')->name('stock.report.product.wise.pdf');
});

