<?php

namespace App\Models\Tax;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property float $rate
 * @property float $cgst
 * @property float $sgst
 * @property float $ugst
 * @property float $igst
 * @property string $description
 * @property Hsn[] $hsns
 * @property PurchaseItem[] $purchaseItems
 * @property SalesItem[] $salesItems
 */
class Gst extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'gst';

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
    protected $fillable = ['rate', 'cgst', 'sgst', 'ugst', 'igst', 'description'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hsns()
    {
        return $this->hasMany('App\Models\Tax\Hsn');
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

    public function creditDebitNoteItems()
    {
        return $this->hasMany('App\Models\CreditDebitNote\CreditDebitNoteItem');
    }
}

?>
