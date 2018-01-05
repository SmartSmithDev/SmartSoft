<?php

namespace App\Models\Purchase;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $purchase_id
 * @property int $item_id
 * @property string $hsn
 * @property int $unit_id
 * @property int $gst_id
 * @property int $cess_id
 * @property string $item_type
 * @property float $unit_price
 * @property float $quantity
 * @property float $discount
 * @property float $taxable_value
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
 * @property Cess $cess
 * @property Gst $gst
 * @property Hsn $hsn
 * @property Item $item
 * @property Purchase $purchase
 * @property Unit $unit
 */
class PurchaseItem extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['purchase_id', 'item_id', 'hsn', 'unit_id', 'gst_id', 'cess_id', 'item_type', 'unit_price', 'quantity', 'discount', 'taxable_value', 'cgst', 'sgst', 'igst', 'ugst', 'cess', 'tax_amount', 'total_product_amount', 'created_at', 'updated_at', 'deleted_at'];

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
    public function purchase()
    {
        return $this->belongsTo('App\Models\Purchase\Purchase');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function unit()
    {
        return $this->belongsTo('App\Models\Setting\Unit');
    }
}
