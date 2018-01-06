<?php

namespace App\Models\CreditDebitNote;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $note_number
 * @property string $note_date
 * @property string $note_type
 * @property string $note_reason
 * @property string $invoice_number
 * @property string $invoice_date
 * @property int $vendor_id
 * @property int $supplier_state_id
 * @property int $supply_state_id
 * @property float $total_taxable_value
 * @property float $total_discount
 * @property float $cgst
 * @property float $sgst
 * @property float $igst
 * @property float $ugst
 * @property float $cess
 * @property float $total_tax
 * @property float $round_off
 * @property float $total_amount
 * @property string $reverse_charge
 * @property string $notes
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */
class CreditDebitNote extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['note_number', 'note_date', 'note_type', 'note_reason', 'invoice_number', 'invoice_date', 'vendor_id', 'supplier_state_id', 'supply_state_id', 'total_taxable_value', 'total_discount', 'cgst', 'sgst', 'igst', 'ugst', 'cess', 'total_tax', 'round_off', 'total_amount', 'reverse_charge', 'notes', 'created_at', 'updated_at', 'deleted_at'];

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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function creditDebitNoteItems()
    {
        return $this->hasMany('App\Models\CreditDebitNote\CreditDebitNoteItem', 'note_id');
    }
}
