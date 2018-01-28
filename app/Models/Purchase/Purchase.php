<?php

namespace App\Models\Purchase;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $vendor_id
 * @property int $supply_state_id
 * @property int $supplier_state_id
 * @property string $invoice_number
 * @property string $invoice_date
 * @property string $company_gstin
 * @property float $total_taxable_value
 * @property float $total_discount
 * @property float $cgst
 * @property float $sgst
 * @property float $igst
 * @property float $ugst
 * @property float $cess
 * @property float $total_tax_amount
 * @property float $round_off
 * @property float $total_amount
 * @property string $reverse_charge
 * @property string $notes
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property State $state
 * @property State $state
 * @property Vendor $vendor
 * @property PurchaseChallanTextile[] $purchaseChallanTextiles
 * @property PurchaseItem[] $purchaseItems
 */
class Purchase extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'purchases';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var array
     */
    protected $fillable = ['vendor_id', 'supply_state_id', 'supplier_state_id', 'invoice_number', 'invoice_date', 'company_gstin', 'total_taxable_value', 'total_discount', 'cgst', 'sgst', 'igst', 'ugst', 'cess', 'total_tax_amount', 'round_off', 'total_amount', 'reverse_charge', 'notes', 'created_at', 'updated_at', 'deleted_at','payment_status','company_id','company_branch_id','company_account_id'];

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
    public function vendor()
    {
        return $this->belongsTo('App\Models\Vendor\Vendor');
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
        return $this->belongsTo('App\Models\Cendor\CompanyBranch');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function purchaseChallanTextiles()
    {
        return $this->hasMany('App\Models\purchase\PurchaseChallanTextile');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function purchaseItems()
    {
        return $this->hasMany('App\Models\purchase\PurchaseItem');
    }
}
