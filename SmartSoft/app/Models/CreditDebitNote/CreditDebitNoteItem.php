<?php

namespace App\Models\CreditDebitNote;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $note_id
 * @property int $item_id
 * @property string $hsn
 * @property string $item_type
 * @property float $unit_price
 * @property int $quantity
 * @property int $unit_id
 * @property float $discount
 * @property float $taxable_value
 * @property int $gst_id
 * @property float $cgst
 * @property float $sgst
 * @property float $igst
 * @property float $ugst
 * @property float $cess
 * @property float $tax_amount
 * @property float $total_product_amount
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */
class CreditDebitNoteItem extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['note_id', 'item_id', 'hsn', 'item_type', 'unit_price', 'quantity', 'unit_id', 'discount', 'taxable_value', 'gst_id', 'cgst', 'sgst', 'igst', 'ugst', 'cess', 'tax_amount', 'total_product_amount', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function gst()
    {
        return $this->belongsTo('App\Models\Tax\Gst');
    }

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
    public function item()
    {
        return $this->belongsTo('App\Models\Item\Item');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creditDebitNote()
    {
        return $this->belongsTo('App\Models\CreditDebitNote\CreditDebitNote', 'note_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function unit()
    {
        return $this->belongsTo('App\Models\Setting\Unit');
    }
}
