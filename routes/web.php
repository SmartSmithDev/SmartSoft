<?php
//
use App\Bank_Accounts;
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
<<<<<<< HEAD
use App\Models\Sales\SalesItem;
=======


>>>>>>> 584330e6ac067f87a67e7f3544037033f28f5bf4
Route::get('/', function () {
    return view('dashboard.dashboard.index');
});

<<<<<<< HEAD
Route::get('/demo','Demo@index');

=======
>>>>>>> 584330e6ac067f87a67e7f3544037033f28f5bf4
Route::resource('sales', 'Sales\Sales');
Route::resource('vendors','Purchases\Vendors');
Route::resource('payments','Purchases\Payments');
Route::resource('company','Companies\Companies');
Route::resource('sales/customers','Sales\Customers');
Route::post('/hsn','Items\Items@hsn');
Route::get('/autofill','Sales\Sales@autoFill');
Route::post('/vendorInfo','Sales\Sales@vendorInfo');
Route::post('vendorajax','Purchases\Vendors@store1');
Route::post('invoice_order_check','Sales\Sales@checkExist');
Route::get('Payments','Purchases\Payments@show');
Route::post('items/itemCalculate', 'Items\Items@itemCalculate');
Route::post('items/ajaxStore','Items\Items@ajaxStore');
Route::resource('items', 'Items\Items');

Route::get('test', function () {
    $GstRate = App\Models\Tax\Cess::find(0)->rate;
    echo($GstRate);
});

<<<<<<< HEAD





//invoces (income)
Route::get('invoice', function (){
 $monthlyinvoice=DB::table('sales')
     ->select(DB::raw('sum(total_amount) as total'),DB::raw('month(invoice_date) as month'),DB::raw('year(invoice_date) as year'))
     ->groupBy('month','year')
     ->orderBy('month','desc')
    ->get();
return $monthlyinvoice;
});
 
//deposit(income)
Route::get('deposit', function (){
 $monthlydeposit=DB::table('sales_payments')
     ->select(DB::raw('sum(paid_amount) as total'),DB::raw('month(payment_date) as month'),DB::raw('year(payment_date) as year'))
     ->groupBy('month','year')
     ->orderBy('month','desc')
    ->get();
return $monthlydeposit;
});
//sales(income)
Route::get('sales', function (){
 $monthlysales=DB::table('sales_items')
     ->select(DB::raw('sum(total_product_amount) as total'),DB::raw('month(created_at) as month'),DB::raw('year(created_at) as year'))
     ->groupBy('month','year')
     ->orderBy('month','desc')
    ->get();
return $monthlysales;
});


Route::get('income', function (){
 $monthlyincome=DB::table('sales_items as sales')
      ->join('sales_payments as deposit','sales.sales_id','=','deposit.sales_id')
      ->join('sales as invoice','sales.sales_id','=','invoice.id')
      ->select(DB::raw('sum(sales.total_product_amount) as total'),DB::raw('month(sales.created_at) as month'),DB::raw('year(sales.created_at) as year'),DB::raw('sum(deposit.paid_amount) as total'),DB::raw('month(deposit.payment_date) as month'),DB::raw('sum(invoice.total_amount) as total'))
     ->groupBy('month','year')
     ->orderBy('month','desc')
    ->get();
return $monthlyincome;
});








//(expense)
Route::get('tssss', function (){
 $monthlypurchase=DB::table('purchase_payments')
     ->select(DB::raw('sum(paid_amount) as total'),DB::raw('month(payment_date) as month'))
     ->groupBy('month')
     ->orderBy('month','desc')
    ->get();
return $monthlypurchase;
});



Route::get('tps', function (){
	$sp=DB::table('sales_payments as s')->join('purchase_payments as p','s.id','=','p.id')
	->select(DB::raw('sum(p.paid_amount) as totalp'),DB::raw('month(p.payment_date) as month'),DB::raw('sum(s.paid_amount) as totals'))
     ->groupBy('month')
     ->orderBy('month','asec')
    ->get();
return $sp;
});



Route::get('depo', function (){
 $monthlypurchase=DB::table('purchase_payments')
     ->select(DB::raw('sum(paid_amount) as total'),DB::raw('month(payment_date) as month'))
     ->groupBy('month')
     ->orderBy('month','desc')
    ->get();
return $monthlypurchase;
});


use App\Http\Controllers\Sales;
Route::get('/co/{id}','Sales@show');

//trial 
// Route::get('sales_s',function(){
// $currentMonth = date('m');
// $data = DB::table("sales")
//             ->whereRaw('MONTH(created_at) = ?',[$currentMonth])
//             ->get();
//  print_r($data);


// });
// Route::get('s',function(){
// $a = DB::table('sales')
//             ->select(DB::raw('SUM(total_amount) as total_a, MONTH(created_at) as month, YEAR(created_at) as year'))
//             ->groupBy(DB::raw('YEAR(2017) ASC, MONTH(12) ASC'))->get();

//         return $a;
// });

// Route::get('sales_s',function(){
//  $items = DB::table('sales')
//                  ->select('product_id', DB::raw('count(*) as total'), 'category_id', 'prod_name')
//                  ->groupBy('id')
//                  ->where('created_at', 'LIKE', '%'.$date.'%')
//                  ->get();
// });

// Route::get('t', function (){
// $data = DB::table('sales_payments')
//   ->select(DB::raw('MONTH(payment_date) as m, YEAR(payment_date) as y, SUM(	paid_amount) as t'))
//   ->whereRaw('payment_date> DATE_SUB(now(), INTERVAL 6 MONTH)')
//   ->groupBy(DB::raw('YEAR(payment_date), MONTH(	payment_date)'))
//   ->get();
// return $data;
// });

// Route::get('tss', function (){
//  $datas= DB::table('sales_payments')
//            ->select('paid_amount','payment_date')
//             ->get()
//             ->groupBy(function($val) {
//             return Carbon::parse($val->payment_date)->format('m');
//      });
//         });

// Route::get('tsss', function (){
//  $monthlysales=DB::table('sales_payments')
//      ->select(DB::raw('sum(paid_amount) as total'),DB::raw('date(payment_date) as dates'))
//      ->groupBy('dates')
//      ->orderBy('dates','desc')
//     ->get();
// return $monthlysales;
// });

=======
Route::get('put', function() {
    Storage::cloud()->put('test.txt', 'Hello World');
    return 'File was saved to Google Drive';
});
>>>>>>> 584330e6ac067f87a67e7f3544037033f28f5bf4


?>