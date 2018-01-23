<?php

namespace App\Http\Controllers\Companies;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting\State;
use App\Models\Company\Company;
use App\Models\Company\CompanyBankAccount;
use App\Models\Company\CompanyBranch;
use App\Models\Company\CompanyGstin;
use Illuminate\Support\Facades\DB;

class Companies extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $company=Company::all();
    
        return view('company.company.index',['companies'=>$company]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $states = State::all()->pluck('name' ,'id');
        $city=["0"=>"Mumbai"];
        $country=DB::table('countries')->get()->pluck('name','id');
        return view('company.company.create',compact('states','city','country'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $accounts=$request->input('accounts');
        $branches=$request->input('branch');
        $status= $request->input('type');
        $cname=$request->input('name');
        $pan=$request->input('pan');
        //dd($pan);
         return $this->insert($cname,$pan,$branches,$accounts);
            
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $req,$id)
    {
         $states = State::all()->pluck('name' ,'id');
        $city=["0"=>"Mumbai"];
        $country=["0"=>"India"];
        $company=Company::find($id);
        $company_accounts=Company::find($id)->companyBankAccount()->get();
        $company_branches=Company::find($id)->companyBranch()->get();
        foreach($company_branches as $branch){
        $gstin=CompanyGstin::find($branch->gstin_id);
        $branch->gstin=$gstin->gstin;
        $branch->state=State::find($branch->state_id)->name;
        //dd($branch->state);
        $branch->city_id=0;
        $branch->country_id=0;
        }
        return view("company.company.edit",compact("company","company_accounts","company_branches","states","city","country")); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        
         Company::find($id)->companyBankAccount()->delete();
        Company::find($id)->companyBranch()->delete();
        Company::find($id)->CompanyGstin()->delete();
         Company::find($id)->delete();
         $accounts=$request->input('accounts');
        $branches=$request->input('branch');
        $status= $request->input('type');
        $cname=$request->input('name');
        $pan=$request->input('pan');
       return  $this->insert($cname,$pan,$branches,$accounts);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
         $company->companyBankAccount()->delete();
        $company->companyBranch()->delete();
        $company->CompanyGstin()->delete();
         $company->delete();
        $message = trans('messages.success.deleted', ['type' => trans_choice('general.company', 1)]);

            flash($message)->success();
        return redirect('companies/companies');
    }

    public function insert($cname,$pan,$branches,$accounts){
         $company=Company::create(["name"=>$cname,"pan"=>$pan]);
        $cid=$company->id;
        foreach($branches as $branch){
         $gstin=CompanyGstin::create(["gstin"=>$branch['gstin'],"company_id"=>$cid,"state_id"=>$branch['state_id']]);
         $gstin_id=$gstin->id;
         $branch_row=CompanyBranch::create(["company_id"=>$cid,"gstin_id"=>$gstin_id,"branch_name"=>$branch['branch_name'],"phone"=>$branch['phone'],"email_id"=>$branch['email_id'],"address"=>$branch['address'],"city"=>$branch['city'],"state_id"=>$branch['state_id'],"country"=>$branch['country'],"pin_code"=>$branch['pin_code']]);
        }

        foreach($accounts as $account){
            $account_row=CompanyBankAccount::create(["company_id"=>$cid,"account_identifier"=>$account["account_identifier"],"entity_name"=>$account["entity_name"],"holder_name"=>$account["holder_name"],"bank_name"=>$account["bank_name"],"account_number"=>$account["account_number"],"ifsc_code"=>$account["ifsc_code"],"notes"=>$account["notes"]]);
        }
        return redirect("/companies/companies");
    }
}
