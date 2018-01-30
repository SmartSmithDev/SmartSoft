<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    //

    protected $table='inventories';

    protected $primaryKey = 'id';


    protected $fillable=['sku','company_id','company_branch_id','state','quantity','created_at','updated_at'];

    // public function sku(){
    // 	$this->belongsTo('App\Models\Item\Item','sku');
    // }


}
