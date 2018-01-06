<?php

namespace App\Models\Tax;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $hsn
 * @property int $gst_id
 * @property int $cess_id
 * @property string $item_type
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Cess $cess
 * @property Gst $gst
 * @property Item[] $items
 * @property PurchaseItem[] $purchaseItems
 * @property SalesItem[] $salesItems
 */
class Hsn extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'hsn';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'hsn';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['gst_id', 'cess_id', 'item_type', 'description', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cess()
    {
        return $this->belongsTo('App\Models\Tax\Cess');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function gst()
    {
        return $this->belongsTo('App\Models\Tax\Gst');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items()
    {
        return $this->hasMany('App\Models\Item\Item', 'hsn', 'hsn');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function purchaseItems()
    {
        return $this->hasMany('App\Models\Purchase\PurchaseItem', 'hsn', 'hsn');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function salesItems()
    {
        return $this->hasMany('App\Models\Sales\SalesItem', 'hsn', 'hsn');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function creditDebitNoteItems()
    {
        return $this->hasMany('App\Models\CreditDebitNote\CreditDebitNoteItem', 'hsn', 'hsn');
    }
}
