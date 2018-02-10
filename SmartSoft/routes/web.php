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

//Route::get('/', function () {
 //   return view('dashboard.dashboard.index');
//});
Route::resource('/','Dashboard\dashboard');

//companies
Route::group(['prefix' => 'companies'], function () {
	Route::resource('companies','Companies\Companies');
});

//taxes
Route::group(['prefix' => 'taxes'], function () {
	Route::resource('gst','Taxes\Gst');
	Route::resource('hsn','Taxes\Hsn');
});

//sales
Route::group(['prefix' => 'sales'], function () {
	Route::resource('sales', 'Sales\Sales');
	Route::get('/autofill','Sales\Sales@autoFill');
	Route::resource('customers','Sales\Customers');
	Route::post('/customerInfo','Sales\Sales@customerInfo');
	Route::post('customerajax','Sales\Customers@store1');
	Route::post('invoice_order_check','Sales\Sales@checkExist');
	Route::resource('sales/payments','Sales\Payments');
	Route::get('/quantity','Sales\Sales@quantity');
});

//purchases
Route::group(['prefix' => 'purchases'], function () {
	Route::resource('vendors','Purchases\Vendors');
	Route::resource('payments','Purchases\Payments');
	Route::resource('purchases','Purchases\Purchases');
	//Route::get('purchases/payments/{id}/edit', 'Payments@edit');
//Route::put('purchases/payments/{id}/update', 'Payments@update');
	
});

//items
Route::group(['prefix' => 'items'], function () {
	Route::post('items/itemCalculate', 'Items\Items@itemCalculate');
	Route::post('/ajaxStore','Items\Items@ajaxStore');
	Route::resource('items', 'Items\Items');
	Route::post('/hsn','Items\Items@hsn');
});


Route::group(['prefix' => 'auth'], function () {
    Route::resource('users', 'Auth\Users');
});


Route::get('download/{id}','Sales\Sales@download');

//reports
Route::group(['prefix' => 'reports'], function () {
	Route::resource('income','Reports\Reports');
	Route::resource('expenses','Reports\expenses');
});

Route::get('test', function () {
    $GstRate = App\Models\Tax\Cess::find(0)->rate;
    echo($GstRate);
});

//file_storage
Route::get('put', function() {
    Storage::cloud()->put('test.txt', 'Hello World');
    return 'File was saved to Google Drive';
});


