<?php

namespace App\Models\Item;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $hsn
 * @property int $unit_id
 * @property string $sku
 * @property string $item_name
 * @property string $item_type
 * @property string $details
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Hsn $hsn
 * @property Unit $unit
 * @property PurchaseItem[] $purchaseItems
 */
class Item extends Model
{
	/**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'items';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var array
     */
    protected $fillable = ['hsn', 'unit_id', 'sku', 'name', 'type', 'details', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hsn()
    {
        return $this->belongsTo('App\Models\Tax\Hsn', 'hsn', 'hsn');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function unit()
    {
        return $this->belongsTo('App\Models\Setting\Unit');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function purchaseItems()
    {
        return $this->hasMany('App\Models\Purchase\PurchaseItem');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function creditDebitNoteItems()
    {
        return $this->hasMany('App\Models\CreditDebitNote\CreditDebitNoteItem');
    }
    
}
