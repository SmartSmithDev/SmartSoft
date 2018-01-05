<?php

namespace App\Models\Vendor;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $gstin
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Sale[] $sales
 * @property SalesChallanTextile[] $salesChallanTextiles
 * @property SalesItem[] $salesItems
 */
class VendorEcommerce extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'vendor_ecommerce';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['gstin', 'name', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sales()
    {
        return $this->hasMany('App\Models\Sales\Sales', 'ecommerce_vendor_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function salesChallanTextiles()
    {
        return $this->hasMany('App\Models\Sales\SalesChallanTextile', 'sales_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function salesItems()
    {
        return $this->hasMany('App\Models\Sales\SalesItem', 'sales_id');
    }
}
