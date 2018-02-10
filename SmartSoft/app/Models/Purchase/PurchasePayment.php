<?php

namespace App\Models\Purchase;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $company_account_id
 * @property int $vendor_account_id
 * @property int $purchase_id
 * @property string $payment_date
 * @property string $payment_mode
 * @property float $paid_amount
 * @property string $payment_terms
 * @property string $payment_type
 * @property string $payment_reference
 * @property string $payment_notes
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property BankAccount $bankAccount
 * @property VendorAccount $vendorAccount
 */
class PurchasePayment extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['purchase_id', 'payment_date', 'payment_mode', 'paid_amount', 'payment_terms', 'payment_type', 'company_account_id', 'vendor_account_id', 'payment_reference', 'payment_notes', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function purchase()
    {
        return $this->belongsTo('App\Models\Purchase\Purchase');
    }


    public function companyAccount()
    {
        return $this->belongsTo('App\Models\Company\CompanyBankAccount', 'company_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vendorAccount()
    {
        return $this->belongsTo('App\Models\Vendor\VendorAccount');
    }
}
