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

Route::get('/', function () {
    return view('dashboard.dashboard.index');
});


Route::resource('sales', 'Sales\Sales');
Route::resource('items', 'Items\Items');
Route::post('items/itemCalculate', 'Items\Items@itemCalculate');
Route::post('/hsn','Items\Items@hsn');
Route::get('/autofill','Sales\Sales@autoFill');
Route::post('/vendorInfo','Sales\Sales@vendorInfo');
//Route::post('sales/vendor', ['as' => 'sales/vendor', 'uses' => 'Sales\Sales@save_data']);


Route::get('test', function () {
    $GstRate = App\Models\Tax\Cess::find(0)->rate;
    echo($GstRate);
})


?>