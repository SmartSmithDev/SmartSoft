<?php

namespace App\Models\Company;

use Illuminate\Database\Eloquent\Model;

class CompanyGstin extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'company_gstin';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var array
     */
    protected $fillable = ['gstin', 'company_id', 'state_id', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo('App\Models\Company\Company');
    }
}
