<?php

namespace App\Models\Sales;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $sales_id
 * @property int $company_account_id
 * @property int $vendor_account_id
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
 * @property Sale $sale
 * @property VendorAccount $vendorAccount
 */
class SalesPayment extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'sales_payments';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var array
     */
    protected $fillable = ['sales_id', 'company_account_id', 'vendor_account_id', 'payment_date', 'payment_mode', 'paid_amount', 'payment_terms', 'payment_type', 'payment_reference', 'payment_notes', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bankAccount()
    {
        return $this->belongsTo('App\Models\Company\BankAccount', 'company_account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sales()
    {
        return $this->belongsTo('App\Model\Sales\Sales', 'sales_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vendorAccount()
    {
        return $this->belongsTo('App\Models\Vendor\VendorAccount');
    }
}
