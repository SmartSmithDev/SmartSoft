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

//use App\Tax\Gst;


//Route::get('/', function () {
 //   return view('dashboard.dashboard.index');
//});
Route::resource('/','Dashboard\dashboard');

Route::group(['prefix' => 'companies'], function () {
	Route::resource('companies','Companies\Companies');
});

Route::group(['prefix' => 'taxes'], function () {
	Route::resource('gst','Taxes\Gst');
	Route::resource('hsn','Taxes\Hsn');
});

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


Route::group(['prefix' => 'purchases'], function () {
	Route::resource('vendors','Purchases\Vendors');
	Route::resource('payments','Purchases\Payments');
	Route::resource('purchases','Purchases\Purchases');
	//Route::get('purchases/payments/{id}/edit', 'Payments@edit');
//Route::put('purchases/payments/{id}/update', 'Payments@update');
	
});

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

Route::get('/report',function() {
 	return view('reports.reports.income');
 });
// Route::get('reports','Reports\Reports@index');
Route::get('/expense',function() {
 	return view('reports.reports.expenses');
});
Route::get('Expenses','Reports\expenses@show');
Route::get('Reports','Reports\Reports@show');
 Route::get('test', function () {
    $GstRate = App\Models\Tax\Cess::find(0)->rate;
    echo($GstRate);
});

Route::get('put', function() {
    Storage::cloud()->put('test.txt', 'Hello World');
    return 'File was saved to Google Drive';
});


