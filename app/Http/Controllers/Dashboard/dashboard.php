<?php 
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use App\Models\Customer\Customer;


class dashboard extends Controller
{
	public function index() {
		 $total = DB::table('customers')->count();
		//console.log($total);
		//$s = 23;
		return view('dashboard.dashboard.index',compact('total'));
	}
}







?>