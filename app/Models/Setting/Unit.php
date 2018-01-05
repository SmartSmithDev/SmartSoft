<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $unit_code
 * @property string $unit
 * @property Item[] $items
 * @property PurchaseItem[] $purchaseItems
 * @property SalesItem[] $salesItems
 */
class Unit extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'units';

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
    protected $fillable = ['unit_code', 'unit'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items()
    {
        return $this->hasMany('App\Models\Item\Item');
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
    public function salesItems()
    {
        return $this->hasMany('App\Models\Sales\SalesItem');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function creditDebitNoteItems()
    {
        return $this->hasMany('App\Models\CreditDebitNote\CreditDebitNoteItem');
    }
}
