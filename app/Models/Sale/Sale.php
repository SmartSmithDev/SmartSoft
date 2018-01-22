<?php

namespace App\Models\Sale;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $vendor_id
 * @property int $ecommerce_vendor_id
 * @property int $supplier_state_id
 * @property int $supply_state_id
 * @property string $order_id
 * @property string $invoice_number
 * @property string $invoice_date
 * @property string $invoice_type
 * @property string $order_date
 * @property string $sales_type
 * @property float $total_taxable_value
 * @property float $total_discount
 * @property float $cgst
 * @property float $sgst
 * @property float $igst
 * @property float $ugst
 * @property float $cess
 * @property float $total_tax_amount
 * @property float $shipping_cost
 * @property float $round_off
 * @property float $total_amount
 * @property string $reverse_charge
 * @property string $notes
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property VendorEcommerce $vendorEcommerce
 * @property State $state
 * @property State $state
 * @property Vendor $vendor
 * @property SalesItem[] $salesItems
 * @property SalesPayment[] $salesPayments
 */
class Sale extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'sales';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var array
     */
    protected $fillable = ['company_branch_id','company_id','company_account_id','customer_id','ecommerce_vendor_id', 'supplier_state_id', 'supply_state_id', 'order_id', 'invoice_number', 'invoice_date', 'invoice_type', 'order_date', 'sales_type', 'total_taxable_value', 'total_discount', 'cgst', 'sgst', 'igst', 'ugst', 'cess', 'total_tax_amount', 'shipping_cost', 'round_off', 'total_amount', 'reverse_charge', 'notes', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vendorEcommerce()
    {
        return $this->belongsTo('App\Models\Vendor\VendorEcommerce', 'ecommerce_vendor_id');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function supplierState()
    {
        return $this->belongsTo('App\Models\Setting\State', 'supplier_state_id');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function supplyState()
    {
        return $this->belongsTo('App\Models\Setting\State', 'supply_state_id');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer\Customer','customer_id');
    }

    public function company()
    {
        return $this->belongsTo('App\Models\Company\Company');
    }

    public function companyBankAccount()
    {
        return $this->belongsTo('App\Models\Company\CompanyBankAccount');
    }

    public function companyBranch()
    {
        return $this->belongsTo('App\Models\Company\CompanyBranch');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function salesItems()
    {
        return $this->hasMany('App\Models\Sales\SalesItem', 'sales_id');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function salesPayments()
    {
        return $this->hasMany('App\Models\Sales\SalesPayment', 'sales_id');
    }
}
