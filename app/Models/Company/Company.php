<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'companies';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var array
     */
    protected $fillable = ['name', 'pan', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function companyBankAccount()
    {
        return $this->hasMany('App\Models\Company\CompanyBankAccount');
    }

    public function companyGstin()
    {
        return $this->hasMany('App\Models\Company\CompanyGstin','company_id');
    }

    public function companyBranch(){
        return $this->hasMany('App\Models\Company\CompanyBranch','company_id');
    }

    public function sale()
    {
        return $this->hasMany('App\Models\Sale\Sale');
    }

    public function purchase()
    {
        return $this->hasMany('App\Models\Purchase\Purchase');
    }

    public function creditDebitNote()
    {
        return $this->hasMany('App\Models\CreditDebitNote\CreditDebitNote');
    }
}
