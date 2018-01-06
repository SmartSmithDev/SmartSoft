<?php

namespace App\Models\Tax;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property float $rate
 * @property string $description
 * @property Hsn[] $hsns
 * @property SalesItem[] $salesItems
 */
class Cess extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'cess';

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
    protected $fillable = ['rate', 'description'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hsn()
    {
        return $this->hasMany('App\Models\Tax\Hsn');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function salesItems()
    {
        return $this->hasMany('App\Models\Sales\SalesItem');
    }

    public function purchaseItems()
    {
        return $this->hasMany('App\Models\Sales\PurchaseItem');
    }

    public function creditDebitNoteItems()
    {
        return $this->hasMany('App\Models\CreditDebitNote\CreditDebitNoteItem');
    }
}
