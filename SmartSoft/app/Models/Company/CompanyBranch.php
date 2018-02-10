<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Model;

class CompanyBranch extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'company_branches';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var array
     */
    protected $fillable = ['company_id', 'gstin_id', 'branch_name', 'phone',  'email_id',  'address',  'city',  'state_id',  'country',  'pin_code', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo('App\Models\Company\Company','company_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
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
