<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $state_tax_code
 * @property string $iso_code
 * @property string $state_code
 * @property string $st_ut
 * @property Purchase[] $purchases
 * @property Purchase[] $purchases
 * @property Sale[] $sales
 * @property Sale[] $sales
 * @property Vendor[] $vendors
 */
class State extends Model
{
	/**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'states';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['name', 'state_tax_code', 'iso_code', 'state_code', 'st_ut'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function purchaseSupplierState()
    {
        return $this->hasMany('App\Models\Purchase\Purchase', 'supplier_state_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function purchaseSupplyState()
    {
        return $this->hasMany('App\Models\Purchase\Purchase', 'supply_state_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function salesSupplierState()
    {
        return $this->hasMany('App\Models\Sales\Sales', 'supplier_state_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function salesSupplyState()
    {
        return $this->hasMany('App\Models\Sales\Sales', 'supply_state_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cdnSupplierState()
    {
        return $this->hasMany('App\Models\CreditDebitNote\CreditDebitNote', 'supplier_state_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cdnSupplyState()
    {
        return $this->hasMany('App\Models\CreditDebitNote\CreditDebitNoteItems', 'supply_state_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vendors()
    {
        return $this->hasMany('App\Models\Vendor\Vendor');
    }
}
