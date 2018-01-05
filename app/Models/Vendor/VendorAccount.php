<?php

namespace App\Models\Vendor;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $vendor_id
 * @property string $beneficiary_name
 * @property string $account_number
 * @property string $beneficiary_address
 * @property string $beneficiary_bank
 * @property string $beneficiary_bank_address
 * @property string $ifsc_Code
 * @property string $bank_code
 * @property string $branch_code
 * @property string $account_type
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Vendor $vendor
 * @property PurchasePayment[] $purchasePayments
 * @property SalesPayment[] $salesPayments
 */
class VendorAccount extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'vendor_accounts';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var array
     */
    protected $fillable = ['vendor_id', 'beneficiary_name', 'account_number', 'beneficiary_address', 'beneficiary_bank', 'beneficiary_bank_address', 'ifsc_Code', 'bank_code', 'branch_code', 'account_type', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vendor()
    {
        return $this->belongsTo('App\Models\Vendor\Vendor');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function purchasePayments()
    {
        return $this->hasMany('App\Models\Purchase\PurchasePayment');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function salesPayments()
    {
        return $this->hasMany('App\Models\Sales\SalesPayment');
    }
}
