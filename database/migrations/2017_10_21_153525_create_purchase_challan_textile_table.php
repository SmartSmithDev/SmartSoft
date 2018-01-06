<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseChallanTextileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Create purchase_challan_textile Table
        Schema::create('purchase_challan_textile', function(Blueprint $table)
        {
            $table->integer('id' , true);
            $table->integer('purchase_id');
            $table->decimal('metres', 15 , 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Drop purchase_challan_textile Table
        Schema::drop('purchase_challan_textile');
    }
}
