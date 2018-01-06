<?php

namespace App\Models\Sales;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $sales_id
 * @property float $metres
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property VendorEcommerce $vendorEcommerce
 */
class SalesChallanTextile extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'sales_challan_textile';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var array
     */
    protected $fillable = ['sales_id', 'metres', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vendorEcommerce()
    {
        return $this->belongsTo('App\Vendor\VendorEcommerce', 'sales_id');
    }
}
