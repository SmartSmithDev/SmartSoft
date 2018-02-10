<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Add foreign Keys to items Table
        Schema::table('items', function(Blueprint $table)
        {
            $table->foreign('hsn', 'fk_item_hsn')->references('hsn')->on('hsn')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('unit_id', 'fk_item_unit_id')->references('id')->on('units')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Remove foreign Keys from items Table
        Schema::table('items', function(Blueprint $table)
        {
            $table->dropForeign('fk_item_hsn');
            $table->dropForeign('fk_item_unit_id');
        });
    }
}
