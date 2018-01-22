<?php

namespace App\Models\Customer;

use Illuminate\Database\Eloquent\Model;

class CustomerAccounts extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'customer_accounts';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var array
     */
    protected $fillable = ['customer_id', 'beneficiary_name', 'account_number', 'beneficiary_address', 'beneficiary_bank', 'beneficiary_bank_address', 'ifsc_code', 'bank_code', 'branch_code', 'account_type','created_at', 'updated_at', 'deleted_at'];

    public function accounts(){
        return $this->belongsTo('App\Models\Customer\Customer','customer_id');
    }
}
