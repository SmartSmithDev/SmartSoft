<?php

namespace App\Models\Vendor;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $state_id
 * @property string $name
 * @property string $vendor_type
 * @property string $gstin
 * @property string $pan
 * @property string $phone
 * @property string $email_id
 * @property string $address
 * @property string $city
 * @property string $country
 * @property string $pin_code
 * @property string $website
 * @property string $business_type
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property State $state
 * @property Purchase[] $purchases
 * @property Sale[] $sales
 * @property VendorAccount[] $vendorAccounts
 */
class Vendor extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'vendors';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id';

    
    /**
     * @var array
     */
    protected $fillable = ['state_id', 'name', 'vendor_type', 'gstin', 'pan', 'phone', 'email_id', 'address', 'city', 'country', 'pin_code', 'website', 'business_type', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function state()
    {
        return $this->belongsTo('App\Models\Setting\State');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function purchase()
    {
        return $this->hasMany('App\Models\Purchase\Purchase');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sales()
    {
        return $this->hasMany('App\Models\Sales\Sales');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function creditDebitNote()
    {
        return $this->hasMany('App\Models\CreditDebitNote\CreditDebitNote');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vendorAccounts()
    {
        return $this->hasMany('App\Models\Vendor\VendorAccount');
    }
}
