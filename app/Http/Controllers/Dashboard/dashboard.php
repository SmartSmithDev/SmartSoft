<?php 
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use App\Models\Customer\Customer;
use App\Models\Auth\User;
use App\Models\Sale\Sale;
use App\Models\Sale\SalesPayment;


class dashboard extends Controller
{
	public function index() {
		 $total = Customer::count();
		  $totaluser = User::count();
		  $totalsale = Sale::count();
		   $totalpayments = SalesPayment::count();
		return view('dashboard.dashboard.index',compact('total','totaluser','totalsale','totalpayments'));
	}
	
}
?>