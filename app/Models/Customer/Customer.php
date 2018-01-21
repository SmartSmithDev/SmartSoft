<?php

namespace App\Models\Customer;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $Customer ID
 * @property string $Customer Name
 * @property string $Phone Number
 * @property string $Email ID
 * @property string $Address
 * @property string $City
 * @property int $State ID
 * @property string $Country
 * @property string $Pin Code
 * @property string $Alternate Phone No
 * @property string $Source
 * @property string $Remarks
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */
class Customer extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'customers';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var array
     */
    protected $fillable = ['state_id', 'name', 'customer_type', 'gstin', 'pan', 'phone', 'email_id', 'address', 'city', 'country', 'pin_code', 'website', 'business_type', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sale()
    {
        return $this->hasMany('App\Models\Sale\Sale');
    }

    public function accounts(){
        return $this->hasMany('App\Models\Customer\CustomerAccounts','customer_id');
    }
}
