<?php

namespace App\Models\Purchase;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $purchase_id
 * @property float $metres
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Purchase $purchase
 */
class PurchaseChallanTextile extends Model
{
     /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'purchase_challan_textile';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var array
     */
    protected $fillable = ['purchase_id', 'metres', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function purchase()
    {
        return $this->belongsTo('App\Models\Purchase\Purchase');
    }
}
