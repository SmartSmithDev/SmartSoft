<?php

namespace App\Models\Customer;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $Customer ID
 * @property string $Customer Name
 * @property string $Phone Number
 * @property string $Email ID
 * @property string $Address
 * @property string $City
 * @property int $State ID
 * @property string $Country
 * @property string $Pin Code
 * @property string $Alternate Phone No
 * @property string $Source
 * @property string $Remarks
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 */
class Customer extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'customers';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var array
     */
    protected $fillable = ['name', 'phone_number', 'email_id', 'address', 'city', 'state_id', 'country', 'pin_code', 'alternate_phone', 'source', 'remarks', 'created_at', 'updated_at', 'deleted_at'];
}
